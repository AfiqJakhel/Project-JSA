<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen;
use App\Models\Jsa;
use App\Models\MataKuliah;


class DosenController extends Controller
{
    /**
     * Dashboard dosen dengan list JSA
     */
    public function dashboard(Request $request)
    {
        // Ambil semua mata kuliah untuk dropdown sorting
        $mataKuliahList = MataKuliah::orderBy('nama_matakuliah')->get();
        
        // Query JSA dengan sorting berdasarkan mata kuliah
        $query = Jsa::with(['mahasiswas', 'dosens']);
        
        // Filter berdasarkan mata kuliah jika ada
        if ($request->filled('matakuliah')) {
            $query->where('matakuliah', $request->matakuliah);
        }
        
        // Filter berdasarkan status jika ada
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Ambil semua JSA yang belum diapprove atau sudah diapprove
        $jsas = $query->orderBy('created_at', 'desc')->get();
        
        return view('dosen.dashboard', compact('jsas', 'mataKuliahList'));
    }

    /**
     * Detail JSA untuk dosen
     */
    public function detailJsa($id)
    {
        $jsa = Jsa::with(['mahasiswas', 'dosens', 'apds', 'workSteps'])->findOrFail($id);
        return view('dosen.detailjsa', compact('jsa'));
    }

    /**
     * Approve JSA
     */
    public function approveJsa(Request $request, $id)
    {
        $jsa = Jsa::findOrFail($id);
        
        // Update status JSA menjadi disetujui
        $jsa->update([
            'status' => 'disetujui'
        ]);
        
        // Tambahkan catatan dosen jika ada
        if ($request->filled('catatan_dsn')) {
            $dosen = Auth::user();
            $jsa->dosens()->syncWithoutDetaching([
                $dosen->id => ['catatan_dsn' => $request->catatan_dsn]
            ]);
        }
        
        return redirect()->back()->with('success', 'JSA berhasil disetujui!');
    }

    /**
     * Revise JSA
     */
    public function reviseJsa(Request $request, $id)
    {
        $jsa = Jsa::findOrFail($id);
        
        // Update status JSA menjadi revisi
        $jsa->update([
            'status' => 'revisi'
        ]);
        
        // Tambahkan catatan dosen jika ada
        if ($request->filled('catatan_dsn')) {
            $dosen = Auth::user();
            $jsa->dosens()->syncWithoutDetaching([
                $dosen->id => ['catatan_dsn' => $request->catatan_dsn]
            ]);
        }
        
        return redirect()->back()->with('success', 'JSA berhasil dikirim untuk revisi!');
    }

    /**
     * Tampilkan profil dosen
     */
    public function profile()
    {
        $dosen = Auth::user();
        return view('dosen.profile', compact('dosen'));
    }

    /**
     * Tampilkan form edit profil dosen
     */
    public function editProfile()
    {
        $dosen = Auth::user();
        return view('dosen.edit-profile', compact('dosen'));
    }

    /**
     * Update profil dosen
     */
    public function updateProfile(Request $request)
    {
        $dosen = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $dosen->id,
            'nip' => 'nullable|string|max:255',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
        ];
        
        // Update password jika diisi
        if ($request->filled('new_password')) {
            $data['password'] = Hash::make($request->new_password);
        }
        
        $dosen->update($data);
        
        return redirect()->route('dosen.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // Proses logout dosen
    public function logout(Request $request)
    {
        Auth::guard('dosen')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Generate PDF JSA
     */
    public function generatePDF($id)
    {
        $jsa = Jsa::with(['mahasiswas', 'dosens', 'workSteps', 'apds', 'inspections'])->findOrFail($id);
        
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.jsa-template', compact('jsa'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->download('JSA-' . $jsa->no_jsa . '.pdf');
        

    }
}
