<?php

namespace App\Http\Controllers;

use App\Models\Jsa;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\JsatoMhs;
use App\Models\JsatoDsn;
use App\Models\Apd;
use App\Models\WorkStep;
use App\Models\Inspection;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class JSAController extends Controller
{
    /**
     * Menampilkan daftar JSA (dengan pencarian opsional)
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $jsa = Jsa::with(['mahasiswas', 'dosens', 'apds'])
            ->when($search, function ($query) use ($search) {
                $query->where('nama_pekerjaan', 'like', "%{$search}%")
                      ->orWhere('no_jsa', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json($jsa);
    }

    /**
     * API untuk mengambil mata kuliah berdasarkan semester dan kelas
     */
    public function getMataKuliah($semester, $kelas)
    {
        $mataKuliah = MataKuliah::bySemesterAndKelas($semester, $kelas)->get();
        return response()->json($mataKuliah);
    }

    /**
     * Menyimpan JSA baru
     */
     // Tampilkan form tambah (kirim daftar mahasiswa & dosen)
    public function create()
    {
        $mahasiswas = Mahasiswa::select('id','nim','nama')->orderBy('nama')->get();
        $dosens     = Dosen::select('id','nip','nama')->orderBy('nama')->get();
        
        // Get current logged in mahasiswa
        $currentMahasiswa = auth('mahasiswa')->user();

        return view('mahasiswa.tambahjsa', compact('mahasiswas','dosens','currentMahasiswa'));
    }

    // Store - expect arrays of ids for mahasiswas and dosens
    public function store(Request $request)
    {
        // Debug: Log semua data yang diterima
        Log::info('JSA Store Request Data:', $request->all());
        
        

        // Custom validation untuk dosen dengan penanganan yang lebih fleksibel
        $dosens = $request->input('dosens', $request->input('dosens[]', []));

        // Jika $dosens bukan array, coba cari dari field lain
        if (!is_array($dosens)) {
            $dosens = $request->input('dosens[]', []);
        }
        

        
        if (empty($dosens) || !is_array($dosens) || count($dosens) === 0) {
            return back()->withInput()->withErrors(['dosens' => 'Minimal harus memilih satu dosen pembimbing']);
        }
        
        $request->validate([
            'semester' => 'required',
            'matakuliah' => 'required',
            'kelas' => 'required',
            'nama_pekerjaan' => 'required',
            'lokasi_pekerjaan' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'mahasiswas' => 'required|array|min:1',
            'mahasiswas.*' => 'exists:mahasiswas,id',
        ]);

        // Validate dosen IDs exist in database
        foreach ($dosens as $dosenId) {
            if (!Dosen::find($dosenId)) {
                return back()->withInput()->withErrors(['dosens' => 'Dosen yang dipilih tidak ditemukan']);
            }
        }
        


        // Custom validation for work steps (more flexible)
        $potensiBahaya = $request->input('potensi_bahaya', []);
        $upayaPengendalian = $request->input('upaya_pengendalian', []);
        $urutanPekerjaan = $request->input('urutan_pekerjaan', []);
        

        
        // Check if there are any work steps (more flexible validation)
        $hasWorkSteps = false;
        $validWorkSteps = 0;
        
        // Check if we have any work step data
        if (!empty($urutanPekerjaan) && is_array($urutanPekerjaan)) {
            foreach ($urutanPekerjaan as $urutan) {
                if (!empty(trim($urutan))) {
                    $hasWorkSteps = true;
                    break;
                }
            }
        }
        
        // Check for valid work steps with both potensi bahaya and upaya pengendalian
        if (!empty($potensiBahaya) && !empty($upayaPengendalian)) {
            foreach ($potensiBahaya as $index => $potensi) {
                if (!empty(trim($potensi)) && !empty(trim($upayaPengendalian[$index] ?? ''))) {
                    $validWorkSteps++;
                }
            }
        }
        
        // If no work steps at all, show error
        if (!$hasWorkSteps) {
            return back()->withInput()->withErrors(['work_steps' => 'Minimal harus ada satu urutan pekerjaan']);
        }
        
        // If there are work steps but no valid ones with both potensi and upaya, show warning but allow
        if ($hasWorkSteps && $validWorkSteps === 0) {
            // Log warning but don't block submission
            Log::warning('JSA store: Work steps exist but no valid potensi bahaya and upaya pengendalian pairs found');
        }

        // Custom validation untuk inspection areas (more flexible)
        $areaInspeksi = $request->input('area_inspeksi', []);
        $itemInspeksi = $request->input('item_inspeksi', []);
        $standarKebersihan = $request->input('standar_kebersihan', []);
        $hasilPemeriksaan = $request->input('hasil_pemeriksaan', []);
        $status = $request->input('status', []);
        $okNg = $request->input('ok_ng', []);
        $tindakanKorektif = $request->input('tindakan_korektif', []);
        $tanggalSelesai = $request->input('tanggal_selesai', []);

        // Only validate if there are inspection items
        if (!empty($itemInspeksi)) {
            // Check if there are items but no areas
            if (empty($areaInspeksi)) {
                return back()->withInput()->withErrors(['area_inspeksi' => 'Area inspeksi harus diisi jika ada item inspeksi']);
            }
        }

        // Retry logic untuk menangani race condition
        $maxRetries = 3;
        $retryCount = 0;

        while ($retryCount < $maxRetries) {
            try {
                DB::transaction(function () use ($request) {
                    // Generate nomor JSA otomatis dengan lock untuk mencegah race condition
                    $totalJsa = DB::table('jsas')->lockForUpdate()->count();
                    $noJsa = 'JSA-' . str_pad($totalJsa + 1, 4, '0', STR_PAD_LEFT);
                    
                    // 1. Simpan JSA (tanpa urutan_pekerjaan, potensi_bahaya, upaya_pengendalian)
                    $jsa = Jsa::create([
                        'kelas' => $request->kelas,
                        'prodi' => $request->semester, // menggunakan semester sebagai prodi
                        'matakuliah' => $request->matakuliah,
                        'no_jsa' => $noJsa,
                        'nama_pekerjaan' => $request->nama_pekerjaan,
                        'lokasi_pekerjaan' => $request->lokasi_pekerjaan,
                        'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
                        'urutan_kerja' => '', // akan diisi dari work steps
                        'status' => 'Menunggu'
                    ]);

                    // 2. Simpan Work Steps - more flexible approach
                    $potensiBahaya = $request->input('potensi_bahaya', []);
                    $upayaPengendalian = $request->input('upaya_pengendalian', []);
                    $urutanPekerjaan = $request->input('urutan_pekerjaan',[]);
                    
                    // Prepare data untuk update tabel JSA
                    $urutanKerjaArray = [];
                    $potensiBahayaArray = [];
                    $upayaPengendalianArray = [];
                    
                    // Save work steps - more flexible approach
                    foreach ($urutanPekerjaan as $index => $urutan) {
                        if (!empty(trim($urutan))) {
                            $potensi = trim($potensiBahaya[$index] ?? '');
                            $upaya = trim($upayaPengendalian[$index] ?? '');
                            
                            WorkStep::create([
                                'jsa_id' => $jsa->id,
                                'step_number' => $index + 1,
                                'step_description' => trim($urutan),
                                'potensi_bahaya' => $potensi ?: 'Belum diisi',
                                'upaya_pengendalian' => $upaya ?: 'Belum diisi'
                            ]);
                            
                            // Collect data untuk update tabel JSA
                            $urutanKerjaArray[] = trim($urutan);
                            $potensiBahayaArray[] = $potensi ?: 'Belum diisi';
                            $upayaPengendalianArray[] = $upaya ?: 'Belum diisi';
                        }
                    }
                    
                    // Update tabel JSA dengan data work steps
                    $jsa->update([
                        'urutan_kerja' => implode(' | ', $urutanKerjaArray),
                    ]);

                    // 3. Simpan Mahasiswa (pivot) - multiple mahasiswa
                    $mahasiswaIds = $request->input('mahasiswas', []);
                    foreach ($mahasiswaIds as $mahasiswaId) {
                        JsatoMhs::create([
                            'id_jsa' => $jsa->id,
                            'id_mhs' => $mahasiswaId
                        ]);
                    }

                    // 4. Simpan Dosen (pivot) - multiple dosen
                    $dosenIds = $request->input('dosens', []);
                    foreach ($dosenIds as $dosenId) {
                        JsatoDsn::create([
                            'id_jsa' => $jsa->id,
                            'id_dsn' => $dosenId,
                            'catatan_dsn' => 'Menunggu Catatan Dosen'
                        ]);
                    }

                    // 5. Simpan APD per mahasiswa
                    $apdMahasiswaIds = $request->input('mahasiswa_ids', []);
                    $apdShelmet = $request->input('apd_shelmet', []);
                    $apdSgloves = $request->input('apd_sgloves', []);
                    $apdShoes = $request->input('apd_shoes', []);
                    $apdSglasses = $request->input('apd_sglasses', []);
                    $apdVest = $request->input('apd_svest', []);
                    $apdEarplug = $request->input('apd_earplug', []);
                    $apdFmask = $request->input('apd_fmask', []);
                    $apdRespiratory = $request->input('apd_respiratory', []);

                    foreach ($apdMahasiswaIds as $index => $mahasiswaId) {
                        // Check if this mahasiswa has any APD items checked
                        $hasShelmet = in_array($mahasiswaId, $apdShelmet);
                        $hasSgloves = in_array($mahasiswaId, $apdSgloves);
                        $hasShoes = in_array($mahasiswaId, $apdShoes);
                        $hasSglasses = in_array($mahasiswaId, $apdSglasses);
                        $hasVest = in_array($mahasiswaId, $apdVest);
                        $hasEarplug = in_array($mahasiswaId, $apdEarplug);
                        $hasFmask = in_array($mahasiswaId, $apdFmask);
                        $hasRespiratory = in_array($mahasiswaId, $apdRespiratory);

                        Apd::create([
                            'id_jsa' => $jsa->id,
                            'id_mhs' => $mahasiswaId,
                            'apd_shelmet' => $hasShelmet ? 'Ada' : 'Tidak',
                            'apd_sgloves' => $hasSgloves ? 'Ada' : 'Tidak',
                            'apd_shoes' => $hasShoes ? 'Ada' : 'Tidak',
                            'apd_sglasses' => $hasSglasses ? 'Ada' : 'Tidak',
                            'apd_svest' => $hasVest ? 'Ada' : 'Tidak',
                            'apd_earplug' => $hasEarplug ? 'Ada' : 'Tidak',
                            'apd_fmask' => $hasFmask ? 'Ada' : 'Tidak',
                            'apd_respiratory' => $hasRespiratory ? 'Ada' : 'Tidak',
                        ]);
                    }

                    // 6. Simpan Inspections (jika ada)
                    $areaInspeksi = $request->input('area_inspeksi', []);
                    $tanggalSelesai = $request->input('tanggal_selesai', []);
                    $itemInspeksi = $request->input('item_inspeksi', []);
                    $standarKebersihan = $request->input('standar_kebersihan', []);
                    $hasilPemeriksaan = $request->input('hasil_pemeriksaan', []);
                    $status = $request->input('status', []);
                    $okNg = $request->input('ok_ng', []);
                    $tindakanKorektif = $request->input('tindakan_korektif', []);

                    // Save inspection areas - more flexible approach
                    if (!empty($itemInspeksi)) {
                        $currentAreaIndex = 0;
                        $itemsPerArea = count($areaInspeksi) > 0 ? floor(count($itemInspeksi) / count($areaInspeksi)) : 0;
                        $itemCountInCurrentArea = 0;
                        
                        foreach ($itemInspeksi as $index => $item) {
                            if (!empty(trim($item))) {
                                // Determine which area this item belongs to
                                if ($itemsPerArea > 0 && $itemCountInCurrentArea >= $itemsPerArea && $currentAreaIndex < count($areaInspeksi) - 1) {
                                    $currentAreaIndex++;
                                    $itemCountInCurrentArea = 0;
                                }
                                
                                Inspection::create([
                                    'jsa_id' => $jsa->id,
                                    'area_inspeksi' => $areaInspeksi[$currentAreaIndex] ?? 'Area Inspeksi',
                                    'item_inspeksi' => trim($item),
                                    'standar_kebersihan' => trim($standarKebersihan[$index] ?? ''),
                                    'hasil_pemeriksaan' => trim($hasilPemeriksaan[$index] ?? ''),
                                    'status' => trim($status[$index] ?? ''),
                                    'ok_ng' => $okNg[$index] ?? 'OK',
                                    'tindakan_korektif' => trim($tindakanKorektif[$index] ?? ''),
                                    'tanggal_selesai' => $tanggalSelesai[$currentAreaIndex] ?? now()
                                ]);
                                
                                $itemCountInCurrentArea++;
                            }
                        }
                    }
                });

                // Invalidate cache setelah JSA berhasil dibuat
                cache()->forget('jsa_count');
                
                return redirect()->route('mahasiswa.dashboard')->with('success','JSA berhasil dibuat');
                
            } catch (\Illuminate\Database\QueryException $e) {
                // Handle duplicate entry error
                if ($e->getCode() == 23000) { // MySQL duplicate entry error code
                    $retryCount++;
                    Log::warning("Race condition detected on JSA creation. Retry attempt: {$retryCount}", [
                        'user_id' => auth('mahasiswa')->id(),
                        'retry_count' => $retryCount,
                        'error' => $e->getMessage()
                    ]);
                    
                    if ($retryCount >= $maxRetries) {
                        Log::error("Failed to create JSA after {$maxRetries} retries", [
                            'user_id' => auth('mahasiswa')->id(),
                            'error' => $e->getMessage()
                        ]);
                        return back()->withInput()->withErrors(['no_jsa' => 'Terjadi konflik nomor JSA setelah beberapa percobaan. Silakan coba lagi.']);
                    }
                    // Continue to next retry
                    continue;
                }
                throw $e;
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['general' => 'Terjadi kesalahan saat membuat JSA: ' . $e->getMessage()]);
            }
        }
        
        // If we reach here, all retries failed
        return back()->withInput()->withErrors(['general' => 'Gagal membuat JSA setelah beberapa percobaan. Silakan coba lagi.']);
    }

    /**
     * Menampilkan detail JSA
     */
    public function show($id)
    {
        $jsa = Jsa::with(['mahasiswas', 'dosens', 'apds'])->findOrFail($id);
        return response()->json($jsa);
    }

    // di dalam class JSAController
public function getForMahasiswa(Request $request)
{
    $mahasiswaId = auth('mahasiswa')->id();
    $search = $request->input('search');
    $status = $request->input('status');

    // Join ke tabel jsatomhs untuk memastikan JSA yang memuat mahasiswa login
    $query = Jsa::join('jsatomhs', 'jsas.id', '=', 'jsatomhs.id_jsa')
        ->where('jsatomhs.id_mhs', $mahasiswaId)
        ->select('jsas.*')
        ->distinct();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('jsas.nama_pekerjaan', 'like', "%{$search}%")
              ->orWhere('jsas.lokasi_pekerjaan', 'like', "%{$search}%")
              ->orWhere('jsas.no_jsa', 'like', "%{$search}%");
        });
    }

    if ($status) {
        $query->where('jsas.status', $status);
    }

    $jsa = $query->with(['workSteps', 'inspections'])->orderBy('jsas.id', 'asc')->get();

    return response()->json($jsa);
}

public function detailView($id)
{
    $jsa = Jsa::with(['mahasiswas', 'dosens', 'apds', 'workSteps', 'inspections'])->findOrFail($id);
    $jsa->setRelation('mahasiswas', $jsa->mahasiswas->unique('id'));

    // untuk dropdown pilihan (jika ingin edit/mengganti mahasiswa/dosen)
    $mahasiswas = Mahasiswa::select('id','nim','nama')->orderBy('nama')->get();
    $dosens     = Dosen::select('id','nip','nama')->orderBy('nama')->get();
    
    // Get current logged in mahasiswa
    $currentMahasiswa = auth('mahasiswa')->user();

    return view('mahasiswa.detailjsa', compact('jsa','mahasiswas','dosens','currentMahasiswa'));
}

    /**
     * Mengupdate JSA
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'semester' => 'required',
            'matakuliah' => 'required',
            'kelas' => 'required',
            'nama_pekerjaan' => 'required',
            'lokasi_pekerjaan' => 'required',
            'tanggal_pelaksanaan' => 'required|date',
            'mahasiswas' => 'required|array|min:1',
            'mahasiswas.*' => 'exists:mahasiswas,id',
            'dosens' => 'required|array|min:1',
            'dosens.*' => 'exists:dosens,id',
            'area_inspeksi' => 'nullable|array',
            'area_inspeksi.*' => 'nullable|string',
            'tanggal_selesai' => 'nullable|array',
            'tanggal_selesai.*' => 'nullable|date',
            'item_inspeksi' => 'nullable|array',
            'item_inspeksi.*' => 'nullable|string',
            'standar_kebersihan' => 'nullable|array',
            'standar_kebersihan.*' => 'nullable|string',
            'hasil_pemeriksaan' => 'nullable|array',
            'hasil_pemeriksaan.*' => 'nullable|string',
            'status' => 'nullable|array',
            'status.*' => 'nullable|string',
            'ok_ng' => 'nullable|array',
            'ok_ng.*' => 'nullable|in:OK,NG',
            'tindakan_korektif' => 'nullable|array',
            'tindakan_korektif.*' => 'nullable|string',
            'potensi_bahaya' => 'nullable|array',
            'potensi_bahaya.*' => 'nullable|string',
            'upaya_pengendalian' => 'nullable|array',
            'upaya_pengendalian.*' => 'nullable|string',
        ]);

        // Custom validation for work steps
        $potensiBahaya = $request->input('potensi_bahaya', []);
        $upayaPengendalian = $request->input('upaya_pengendalian', []);
        $urutanPekerjaan = $request->input('urutan_pekerjaan', []);
        
        // Debug: Log the work steps data
        Log::info('Work steps validation data:', [
            'potensi_bahaya' => $potensiBahaya,
            'upaya_pengendalian' => $upayaPengendalian,
            'urutan_pekerjaan' => $urutanPekerjaan,
            'potensi_count' => count($potensiBahaya),
            'upaya_count' => count($upayaPengendalian),
            'urutan_count' => count($urutanPekerjaan)
        ]);
        
        // Check if there are any work steps (more flexible validation)
        $hasWorkSteps = false;
        $validWorkSteps = 0;
        
        // Check if we have any work step data
        if (!empty($urutanPekerjaan) && is_array($urutanPekerjaan)) {
            foreach ($urutanPekerjaan as $urutan) {
                if (!empty(trim($urutan))) {
                    $hasWorkSteps = true;
                    break;
                }
            }
        }
        
        // Check for valid work steps with both potensi bahaya and upaya pengendalian
        if (!empty($potensiBahaya) && !empty($upayaPengendalian)) {
            foreach ($potensiBahaya as $index => $potensi) {
                if (!empty(trim($potensi)) && !empty(trim($upayaPengendalian[$index] ?? ''))) {
                    $validWorkSteps++;
                }
            }
        }
        
        // If no work steps at all, show error
        if (!$hasWorkSteps) {
            return back()->withInput()->withErrors(['work_steps' => 'Minimal harus ada satu urutan pekerjaan']);
        }
        
        // If there are work steps but no valid ones with both potensi and upaya, show warning but allow
        if ($hasWorkSteps && $validWorkSteps === 0) {
            // Log warning but don't block submission
            Log::warning('JSA update: Work steps exist but no valid potensi bahaya and upaya pengendalian pairs found');
        }

        // Custom validation for inspection areas (more flexible)
        $areaInspeksi = $request->input('area_inspeksi', []);
        $itemInspeksi = $request->input('item_inspeksi', []);
        
        // Debug: Log inspection data
        Log::info('Inspection areas validation data:', [
            'area_inspeksi' => $areaInspeksi,
            'item_inspeksi' => $itemInspeksi,
            'area_count' => count($areaInspeksi),
            'item_count' => count($itemInspeksi)
        ]);
        
        // Only validate if there are inspection items
        if (!empty($itemInspeksi)) {
            // Check if there are items but no areas
            if (empty($areaInspeksi)) {
                return back()->withInput()->withErrors(['inspection_areas' => 'Setiap item inspeksi harus memiliki area inspeksi']);
            }
        }

        try {
            DB::transaction(function () use ($request, $id) {
                // 2. Update JSA (nomor JSA tidak bisa diubah) dengan lock untuk mencegah race condition
                $jsa = Jsa::lockForUpdate()->findOrFail($id);
                $jsa->update([
                    'kelas' => $request->kelas,
                    'prodi' => $request->semester, // menggunakan semester sebagai prodi
                    'matakuliah' => $request->matakuliah,
                    'nama_pekerjaan' => $request->nama_pekerjaan,
                    'lokasi_pekerjaan' => $request->lokasi_pekerjaan,
                    'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
                    'urutan_kerja' => '', // akan diisi dari work steps
                    'status' => 'Menunggu'
                ]);

                // 3. Update Work Steps
                WorkStep::where('jsa_id', $id)->delete();
                
                $potensiBahaya = $request->input('potensi_bahaya', []);
                $upayaPengendalian = $request->input('upaya_pengendalian', []);
                $urutanPekerjaan = $request->input('urutan_pekerjaan', []);

                // Prepare data untuk update tabel JSA
                $urutanKerjaArray = [];
                $potensiBahayaArray = [];
                $upayaPengendalianArray = [];

                // Save work steps - more flexible approach
                foreach ($urutanPekerjaan as $index => $urutan) {
                    if (!empty(trim($urutan))) {
                        $potensi = trim($potensiBahaya[$index] ?? '');
                        $upaya = trim($upayaPengendalian[$index] ?? '');
                        
                        WorkStep::create([
                            'jsa_id' => $id,
                            'step_number' => $index + 1,
                            'step_description' => trim($urutan),
                            'potensi_bahaya' => $potensi ?: 'Belum diisi',
                            'upaya_pengendalian' => $upaya ?: 'Belum diisi'
                        ]);
                        
                        // Collect data untuk update tabel JSA
                        $urutanKerjaArray[] = trim($urutan);
                        $potensiBahayaArray[] = $potensi ?: 'Belum diisi';
                        $upayaPengendalianArray[] = $upaya ?: 'Belum diisi';
                    }
                }
                
                // Update tabel JSA dengan data work steps
                $jsa->update([
                    'urutan_kerja' => implode(' | ', $urutanKerjaArray),
                ]);

                // 4. Update Inspection Areas
                Inspection::where('jsa_id', $id)->delete();
                
                $areaInspeksi = $request->input('area_inspeksi', []);
                $tanggalSelesai = $request->input('tanggal_selesai', []);
                $itemInspeksi = $request->input('item_inspeksi', []);
                $standarKebersihan = $request->input('standar_kebersihan', []);
                $hasilPemeriksaan = $request->input('hasil_pemeriksaan', []);
                $status = $request->input('status', []);
                $okNg = $request->input('ok_ng', []);
                $tindakanKorektif = $request->input('tindakan_korektif', []);

                // Save inspection areas - more flexible approach
                if (!empty($itemInspeksi)) {
                    $currentAreaIndex = 0;
                    $itemsPerArea = count($areaInspeksi) > 0 ? floor(count($itemInspeksi) / count($areaInspeksi)) : 0;
                    $itemCountInCurrentArea = 0;
                    
                    foreach ($itemInspeksi as $index => $item) {
                        if (!empty(trim($item))) {
                            // Determine which area this item belongs to
                            if ($itemsPerArea > 0 && $itemCountInCurrentArea >= $itemsPerArea && $currentAreaIndex < count($areaInspeksi) - 1) {
                                $currentAreaIndex++;
                                $itemCountInCurrentArea = 0;
                            }
                            
                            Inspection::create([
                                'jsa_id' => $id,
                                'area_inspeksi' => $areaInspeksi[$currentAreaIndex] ?? 'Area Inspeksi',
                                'item_inspeksi' => trim($item),
                                'standar_kebersihan' => trim($standarKebersihan[$index] ?? ''),
                                'hasil_pemeriksaan' => trim($hasilPemeriksaan[$index] ?? ''),
                                'status' => trim($status[$index] ?? ''),
                                'ok_ng' => $okNg[$index] ?? 'OK',
                                'tindakan_korektif' => trim($tindakanKorektif[$index] ?? ''),
                                'tanggal_selesai' => $tanggalSelesai[$currentAreaIndex] ?? now()
                            ]);
                            
                            $itemCountInCurrentArea++;
                        }
                    }
                }

                // 4. Update Mahasiswa (pivot)
                JsatoMhs::where('id_jsa', $id)->delete();
                $mahasiswaIds = $request->input('mahasiswas', []);
                foreach ($mahasiswaIds as $mahasiswaId) {
                    JsatoMhs::create([
                        'id_jsa' => $id,
                        'id_mhs' => $mahasiswaId
                    ]);
                }

                // 5. Update APD per mahasiswa
                Apd::where('id_jsa', $id)->delete();
                
                $apdMahasiswaIds = $request->input('mahasiswa_ids', []);
                $apdShelmet = $request->input('apd_shelmet', []);
                $apdSgloves = $request->input('apd_sgloves', []);
                $apdShoes = $request->input('apd_shoes', []);
                $apdSglasses = $request->input('apd_sglasses', []);
                $apdVest = $request->input('apd_svest', []);
                $apdEarplug = $request->input('apd_earplug', []);
                $apdFmask = $request->input('apd_fmask', []);
                $apdRespiratory = $request->input('apd_respiratory', []);

                foreach ($apdMahasiswaIds as $index => $mahasiswaId) {
                    // Check if this mahasiswa has any APD items checked
                    $hasShelmet = in_array($mahasiswaId, $apdShelmet);
                    $hasSgloves = in_array($mahasiswaId, $apdSgloves);
                    $hasShoes = in_array($mahasiswaId, $apdShoes);
                    $hasSglasses = in_array($mahasiswaId, $apdSglasses);
                    $hasVest = in_array($mahasiswaId, $apdVest);
                    $hasEarplug = in_array($mahasiswaId, $apdEarplug);
                    $hasFmask = in_array($mahasiswaId, $apdFmask);
                    $hasRespiratory = in_array($mahasiswaId, $apdRespiratory);

                    Apd::create([
                        'id_jsa' => $id,
                        'id_mhs' => $mahasiswaId,
                        'apd_shelmet' => $hasShelmet ? 'Ada' : 'Tidak',
                        'apd_sgloves' => $hasSgloves ? 'Ada' : 'Tidak',
                        'apd_shoes' => $hasShoes ? 'Ada' : 'Tidak',
                        'apd_sglasses' => $hasSglasses ? 'Ada' : 'Tidak',
                        'apd_svest' => $hasVest ? 'Ada' : 'Tidak',
                        'apd_earplug' => $hasEarplug ? 'Ada' : 'Tidak',
                        'apd_fmask' => $hasFmask ? 'Ada' : 'Tidak',
                        'apd_respiratory' => $hasRespiratory ? 'Ada' : 'Tidak',
                    ]);
                }

                // 6. Update Dosen Pembimbing - multiple dosen
                JsatoDsn::where('id_jsa', $id)->delete();
                $dosenIds = $request->input('dosens', []);
                foreach ($dosenIds as $dosenId) {
                    JsatoDsn::create([
                        'id_jsa' => $id,
                        'id_dsn' => $dosenId,
                        'catatan_dsn' => 'Menunggu Catatan Dosen'
                    ]);
                }
            });

            return redirect()->route('mahasiswa.dashboard')->with('success', 'JSA berhasil diupdate');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['general' => 'Terjadi kesalahan saat mengupdate JSA: ' . $e->getMessage()]);
        }
    }

    /**
     * Search mahasiswa for JSA
     */
    public function searchMahasiswa(Request $request)
    {
        $query = $request->input('search') ?: $request->input('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $mahasiswas = Mahasiswa::where('nim', 'like', "%{$query}%")
            ->orWhere('nama', 'like', "%{$query}%")
            ->select('id', 'nim', 'nama')
            ->orderBy('nama')
            ->limit(20)
            ->get();

        return response()->json($mahasiswas);
    }

    /**
     * Search dosen for JSA
     */
    public function searchDosen(Request $request)
    {
        $query = $request->input('search') ?: $request->input('q');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $dosens = Dosen::where('nip', 'like', "%{$query}%")
            ->orWhere('nama', 'like', "%{$query}%")
            ->select('id', 'nip', 'nama')
            ->orderBy('nama')
            ->limit(20)
            ->get();

        return response()->json($dosens);
    }

    /**
     * Get JSA count for preview
     */
    public function getJsaCount()
    {
        // Menggunakan cache untuk mengurangi beban database
        $count = cache()->remember('jsa_count', 5, function () {
            return Jsa::count();
        });
        
        return response()->json(['count' => $count]);
    }

    /**
     * Menghapus JSA
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            JsatoMhs::where('id_jsa', $id)->delete();
            JsatoDsn::where('id_jsa', $id)->delete();
            Apd::where('id_jsa', $id)->delete();
            Inspection::where('jsa_id', $id)->delete();
            WorkStep::where('jsa_id', $id)->delete();
            Jsa::where('id', $id)->delete();
        });

        return response()->json(['message' => 'JSA berhasil dihapus']);
    }

    /**
     * Get race condition statistics for monitoring
     */
    public function getRaceConditionStats()
    {
        $stats = cache()->remember('race_condition_stats', 60, function () {
            return [
                'total_retries' => Log::where('level', 'warning')
                    ->where('message', 'like', '%Race condition detected%')
                    ->count(),
                'failed_creations' => Log::where('level', 'error')
                    ->where('message', 'like', '%Failed to create JSA%')
                    ->count(),
                'last_24h_retries' => Log::where('level', 'warning')
                    ->where('message', 'like', '%Race condition detected%')
                    ->where('created_at', '>=', now()->subDay())
                    ->count(),
            ];
        });

        return response()->json($stats);
    }

    /**
     * Clear cache for JSA count (admin function)
     */
    public function clearJsaCountCache()
    {
        cache()->forget('jsa_count');
        cache()->forget('race_condition_stats');
        
        return response()->json(['message' => 'Cache berhasil dibersihkan']);
    }
}
