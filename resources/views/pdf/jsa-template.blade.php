<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JOB SAFETY ANALYSIS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 12px;
            line-height: 1.4;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo {
            width: 60px;
            height: 60px;
            background: #27ae60;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 14px;
        }
        
        .logo-text {
            font-size: 14px;
            font-weight: bold;
            color: #27ae60;
        }
        
        .title-section {
            text-align: center;
            flex-grow: 1;
        }
        
        .main-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        
        .subtitle {
            font-size: 12px;
            color: #666;
        }
        
        .document-info {
            border: 1px solid #333;
            padding: 10px;
            min-width: 200px;
        }
        
        .doc-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
        }
        
        .doc-label {
            font-weight: bold;
        }
        
        .doc-value {
            text-align: right;
        }
        
        /* JSA Information Table */
        .jsa-info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .jsa-info-table th,
        .jsa-info-table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        
        .jsa-info-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        /* Team Praktek Table */
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin: 20px 0 10px 0;
            color: #333;
        }
        
        .team-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .team-table th,
        .team-table td {
            border: 1px solid #333;
            padding: 6px;
            text-align: center;
            font-size: 11px;
        }
        
        .team-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .apd-header {
            background-color: #e8f5e8 !important;
            font-weight: bold;
        }
        
        /* Work Steps Table */
        .work-steps-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        
        .work-steps-table th,
        .work-steps-table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        
        .work-steps-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        /* Approval Section */
        .approval-section {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        
        .approval-box {
            width: 48%;
        }
        
        .approval-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .approval-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .approval-table th,
        .approval-table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }
        
        .approval-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        /* Utility Classes */
        .text-center {
            text-align: center;
        }
        
        .text-left {
            text-align: left;
        }
        
        .font-bold {
            font-weight: bold;
        }
        
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
                 <div class="logo-section">
             @php
                 $logoPath = \App\Models\SystemSetting::getValue('k3_logo');
                 $logoUrl = $logoPath ? storage_path('app/public/' . $logoPath) : null;
             @endphp
             
             @if($logoUrl && file_exists($logoUrl))
                 <img src="{{ $logoUrl }}" alt="K3 Logo" style="width: 60px; height: 60px; object-fit: contain;">
             @else
                 <div class="logo">K3</div>
             @endif
             <div class="logo-text">K3 & KESELAMATAN KERJA</div>
         </div>
        
        <div class="title-section">
            <div class="main-title">JOB SAFETY ANALYSIS</div>
            <div class="subtitle">Keselamatan, Kesehatan, Kerja & Kontrol Kontaminan_Prodi Teknik Alat Berat_Politeknik Negeri Padang</div>
        </div>
        
        <div class="document-info">
            <div class="doc-row">
                <span class="doc-label">No Dokumen:</span>
                <span class="doc-value">K3&CC/{{ $jsa->no_jsa }}</span>
            </div>
            <div class="doc-row">
                <span class="doc-label">No. Rev:</span>
                <span class="doc-value">0</span>
            </div>
            <div class="doc-row">
                <span class="doc-label">Tanggal Rilis:</span>
                <span class="doc-value">{{ \Carbon\Carbon::parse($jsa->created_at)->format('d M Y') }}</span>
            </div>
            <div class="doc-row">
                <span class="doc-label">Halaman:</span>
                <span class="doc-value">1 dari 1</span>
            </div>
        </div>
    </div>

    <!-- JSA Information Table -->
    <table class="jsa-info-table">
        <thead>
            <tr>
                <th>No JSA</th>
                <th>Nama Pekerjaan</th>
                <th>Tanggal Dibuat</th>
                <th>Kelas</th>
                <th>Prodi</th>
                <th>Mata Kuliah</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $jsa->no_jsa }}</td>
                <td>{{ $jsa->nama_pekerjaan }}</td>
                <td>{{ \Carbon\Carbon::parse($jsa->created_at)->format('d/m/Y') }}</td>
                <td>{{ $jsa->kelas }}</td>
                <td>Teknik Alat Berat</td>
                <td>{{ $jsa->matakuliah }}</td>
                <td>{{ $jsa->semester }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Team Praktek Section -->
    <div class="section-title">Team Praktek</div>
    <table class="team-table">
        <thead>
                         <tr>
                 <th rowspan="2">No</th>
                 <th rowspan="2">Nama Mahasiswa</th>
                 <th rowspan="2">No. BP</th>
                 <th colspan="8" class="apd-header">APD</th>
                 <th rowspan="2">Paraf</th>
             </tr>
             <tr>
                 <th class="apd-header">Safety Helmet</th>
                 <th class="apd-header">Safety Gloves</th>
                 <th class="apd-header">Safety Shoes</th>
                 <th class="apd-header">Safety Glasses</th>
                 <th class="apd-header">Safety Vest</th>
                 <th class="apd-header">Ear Plug</th>
                 <th class="apd-header">Face Mask</th>
                 <th class="apd-header">Respiratory</th>
             </tr>
        </thead>
        <tbody>
            @forelse($jsa->mahasiswas as $index => $mahasiswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                                         <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_shelmet == 'Ada')
                            ada
                         @endif
                     </td>
                     <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_sgloves == 'Ada')
                            ada
                         @endif
                     </td>
                     <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_shoes == 'Ada')
                            ada
                         @endif
                     </td>
                     <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_sglasses == 'Ada')
                            ada
                         @endif
                     </td>
                     <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_svest == 'Ada')
                            ada
                         @endif
                     </td>
                     <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_earplug == 'Ada')
                            ada
                         @endif
                     </td>
                     <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_fmask == 'Ada')
                            ada
                         @endif
                     </td>
                     <td>
                         @if($jsa->apds->where('id_mhs', $mahasiswa->id)->first() && $jsa->apds->where('id_mhs', $mahasiswa->id)->first()->apd_respiratory == 'Ada')
                            ada
                         @endif
                     </td>
                    <td></td>
                </tr>
            @empty
                                 @for($i = 1; $i <= 8; $i++)
                     <tr>
                         <td>{{ $i }}</td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     </tr>
                 @endfor
            @endforelse
        </tbody>
    </table>

    <!-- Work Steps and Hazard Analysis -->
    <table class="work-steps-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="35%">Urutan Pekerjaan</th>
                <th width="30%">Potensi Bahaya</th>
                <th width="30%">Upaya Pengendalian</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jsa->workSteps as $index => $workStep)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $workStep->step_description }}</td>
                    <td>{{ $workStep->potensi_bahaya }}</td>
                    <td>{{ $workStep->upaya_pengendalian }}</td>
                </tr>
            @empty
                @for($i = 1; $i <= 10; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor
            @endforelse
        </tbody>
         </table>
 
     <!-- Area Inspeksi Section -->
     <div class="section-title">Area Inspeksi</div>
     <table class="work-steps-table">
         <thead>
             <tr>
                 <th width="15%">Area Inspeksi</th>
                 <th width="15%">Tanggal Selesai</th>
                 <th width="20%">Item Inspeksi</th>
                 <th width="20%">Standar Kebersihan</th>
                 <th width="15%">Hasil Pemeriksaan</th>
                 <th width="15%">Status</th>
             </tr>
         </thead>
         <tbody>
             @forelse($jsa->inspections as $index => $inspection)
                 <tr>
                     <td>{{ $inspection->area_inspeksi }}</td>
                     <td>{{ $inspection->tanggal_selesai ? \Carbon\Carbon::parse($inspection->tanggal_selesai)->format('d/m/Y') : '-' }}</td>
                     <td>{{ $inspection->item_inspeksi }}</td>
                     <td>{{ $inspection->standar_kebersihan }}</td>
                     <td>{{ $inspection->hasil_pemeriksaan }}</td>
                     <td>{{ $inspection->status }}</td>
                 </tr>
             @empty
                 @for($i = 1; $i <= 5; $i++)
                     <tr>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                     </tr>
                 @endfor
             @endforelse
         </tbody>
     </table>
 
          <!-- Approval Section -->
     <div class="approval-section">
         <div class="approval-box" style="width: 100%;">
             <div class="approval-title">Dibimbing oleh</div>
             <table class="approval-table">
                 <thead>
                     <tr>
                         <th width="85%">Dosen Pengampu</th>
                         <th width="15%">Paraf</th>
                     </tr>
                 </thead>
                 <tbody>
                     @forelse($jsa->dosens as $index => $dosen)
                         <tr>
                             <td>{{ $dosen->nama }}</td>
                             <td></td>
                         </tr>
                     @empty
                         @for($i = 1; $i <= 6; $i++)
                             <tr>
                                 <td></td>
                                 <td></td>
                             </tr>
                         @endfor
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>
</body>
</html>
