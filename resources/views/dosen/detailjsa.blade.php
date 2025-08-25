{{-- resources/views/dosen/detailjsa.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail JSA - Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: white;
            overflow-x: hidden;
        }

        /* Animated Background Shapes */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Container */
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        /* Header */
        .header {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .back-btn {
            position: absolute;
            top: 0;
            left: 0;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateY(-2px);
        }

        /* Content Container */
        .content-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .content-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: white;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Form-like Display Styles */
        .form-display {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            color: white;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-display-value {
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            font-size: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            min-height: 48px;
            display: flex;
            align-items: center;
        }

        /* List Container Styles */
        .list-container {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .list-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .list-item:last-child {
            margin-bottom: 0;
        }

        .list-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .list-title {
            color: white;
            font-weight: 600;
            font-size: 1rem;
        }

        .list-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .list-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 15px;
        }

        .list-detail {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
            padding: 10px;
        }

        .list-detail-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .list-detail-value {
            color: white;
            font-size: 1rem;
            line-height: 2.5;
        }

        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-menunggu {
            background: linear-gradient(45deg, #ff8c00, #ffa500);
            color: white;
        }

        .status-disetujui {
            background: linear-gradient(45deg, #32cd32, #228b22);
            color: white;
        }

        .status-revisi {
            background: linear-gradient(45deg, #ff6b35, #f7931e);
            color: white;
        }

        /* Work Steps Section */
        .work-step-number {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 5px 12px;
            border-radius: 15px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .work-step-description {
            color: white;
            font-weight: 500;
            margin-bottom: 10px;
            line-height: 2;
        }

        /* APD Section */
        .apd-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            min-height: 120px;
            gap: 10px;
        }

        .apd-check-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
        }

        .apd-check-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
        }

        .apd-check-available {
            background: linear-gradient(45deg, #32cd32, #228b22);
            color: white;
        }

        .apd-check-unavailable {
            background: linear-gradient(45deg, #dc143c, #b22222);
            color: white;
        }

        .apd-item-name {
            color: white;
            font-size: 0.9rem;
        }

        /* Inspection Section */
        .inspection-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .inspection-table th,
        .inspection-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .inspection-table th {
            background: rgba(255, 255, 255, 0.1);
            font-weight: 600;
            color: white;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .inspection-table td {
            color: white;
            font-size: 0.85rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .inspection-table tr:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .inspection-table tr:last-child td {
            border-bottom: none;
        }

        .inspection-status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .inspection-status-ok {
            background: linear-gradient(45deg, #32cd32, #228b22);
            color: white;
        }

        .inspection-status-ng {
            background: linear-gradient(45deg, #dc143c, #b22222);
            color: white;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
        }

        .btn-success {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.3);
        }

        .btn-danger {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
        }

        .btn-warning {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(243, 156, 18, 0.3);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(149, 165, 166, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            
            .content-container {
                padding: 20px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .list-details {
                grid-template-columns: 1fr;
            }
            
            .apd-grid {
                grid-template-columns: 1fr;
            }
            
            .inspection-table {
                font-size: 0.8rem;
            }
            
            .inspection-table th,
            .inspection-table td {
                padding: 8px;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .header h1 {
                font-size: 2rem;
            }
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: rgba(255, 255, 255, 0.7);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="animated-bg">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <a href="{{ route('dosen.dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
            </a>
            <h1>Detail JSA</h1>
            <p>Informasi lengkap Job Safety Analysis</p>
        </div>

        <main>
            <div class="content-container">
                <!-- Basic Information Section -->
                <div class="content-section">
                    <h2 class="section-title">
                        <i class="fas fa-info-circle"></i>
                        Informasi Dasar
                    </h2>
                    <div class="form-display">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Nomor JSA</label>
                                <div class="form-display-value">{{ $jsa->no_jsa }}</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <div class="form-display-value">
                                    {{ ucfirst($jsa->status) }}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Nama Pekerjaan</label>
                                <div class="form-display-value">{{ $jsa->nama_pekerjaan }}</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mata Kuliah</label>
                                <div class="form-display-value">{{ $jsa->matakuliah }}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Semester</label>
                                <div class="form-display-value">{{ $jsa->semester }}</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Kelas</label>
                                <div class="form-display-value">{{ $jsa->kelas }}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Lokasi Pekerjaan</label>
                                <div class="form-display-value">{{ $jsa->lokasi_pekerjaan }}</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Tanggal Pelaksanaan</label>
                                <div class="form-display-value">{{ $jsa->tanggal_pelaksanaan }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mahasiswa Section -->
                <div class="content-section">
                    <h2 class="section-title">
                        <i class="fas fa-users"></i>
                        Mahasiswa Terlibat
                    </h2>
                    @if($jsa->mahasiswas->count() > 0)
                        <div class="list-container">
                            @foreach($jsa->mahasiswas as $mahasiswa)
                                <div class="list-item">
                                    <div class="list-header">
                                        <div class="list-title">{{ $mahasiswa->nama }}</div>
                                        <div class="list-subtitle">{{ $mahasiswa->nim }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-users"></i>
                            <h3>Tidak ada mahasiswa</h3>
                            <p>Belum ada mahasiswa yang terlibat dalam JSA ini.</p>
                        </div>
                    @endif
                </div>

                <!-- Dosen Section -->
                <div class="content-section">
                    <h2 class="section-title">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Dosen Pembimbing
                    </h2>
                    @if($jsa->dosens->count() > 0)
                        <div class="list-container">
                            @foreach($jsa->dosens as $dosen)
                                <div class="list-item">
                                    <div class="list-header">
                                        <div class="list-title">{{ $dosen->nama }}</div>
                                        <div class="list-subtitle">{{ $dosen->nip ?? 'NIP tidak tersedia' }}</div>
                                    </div>
                                    @if($dosen->pivot->catatan_dsn && $dosen->pivot->catatan_dsn !== 'Menunggu Catatan Dosen')
                                        <div class="list-details">
                                            <div class="list-detail">
                                                <div class="list-detail-label">Catatan Dosen</div>
                                                <div class="list-detail-value">{{ $dosen->pivot->catatan_dsn }}</div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <h3>Tidak ada dosen</h3>
                            <p>Belum ada dosen pembimbing yang ditugaskan.</p>
                        </div>
                    @endif
                </div>

                <!-- Work Steps Section -->
                <div class="content-section">
                    <h2 class="section-title">
                        <i class="fas fa-tasks"></i>
                        Langkah-langkah Pekerjaan
                    </h2>
                    @if($jsa->workSteps->count() > 0)
                        <div class="list-container">
                            @foreach($jsa->workSteps as $step)
                                <div class="list-item">
                                    <div class="list-header">
                                        <div class="list-title">
                                            <span class="work-step-number">Langkah {{ $step->step_number }}</span>
                                        </div>
                                    </div>
                                    <div class="work-step-description">{{ $step->step_description }}</div>
                                    <div class="list-details">
                                        <div class="list-detail">
                                            <div class="list-detail-label">Potensi Bahaya</div>
                                            <div class="list-detail-value">{{ $step->potensi_bahaya }}</div>
                                        </div>
                                        <div class="list-detail">
                                            <div class="list-detail-label">Upaya Pengendalian</div>
                                            <div class="list-detail-value">{{ $step->upaya_pengendalian }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-tasks"></i>
                            <h3>Tidak ada langkah kerja</h3>
                            <p>Belum ada langkah-langkah pekerjaan yang didefinisikan.</p>
                        </div>
                    @endif
                </div>

                <!-- APD Section -->
                <div class="content-section">
                    <h2 class="section-title">
                        <i class="fas fa-hard-hat"></i>
                        Kelengkapan APD
                    </h2>
                    @if($jsa->apds->count() > 0)
                        <div class="list-container">
                            @foreach($jsa->apds as $apd)
                                @php $mahasiswa = $jsa->mahasiswas->where('id', $apd->id_mhs)->first(); @endphp
                                @if($mahasiswa)
                                    <div class="list-item">
                                        <div class="list-header">
                                            <div class="list-title">{{ $mahasiswa->nama }}</div>
                                            <div class="list-subtitle">{{ $mahasiswa->nim }}</div>
                                        </div>
                                        <div class="apd-grid">
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_shelmet == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_shelmet == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Safety Helmet</span>
                                            </div>
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_sgloves == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_sgloves == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Safety Gloves</span>
                                            </div>
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_shoes == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_shoes == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Safety Shoes</span>
                                            </div>
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_sglasses == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_sglasses == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Safety Glasses</span>
                                            </div>
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_svest == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_svest == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Safety Vest</span>
                                            </div>
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_earplug == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_earplug == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Ear Plug</span>
                                            </div>
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_fmask == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_fmask == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Face Mask</span>
                                            </div>
                                            <div class="apd-check-item">
                                                <div class="apd-check-icon {{ $apd->apd_respiratory == 'Ada' ? 'apd-check-available' : 'apd-check-unavailable' }}">
                                                    <i class="fas {{ $apd->apd_respiratory == 'Ada' ? 'fa-check' : 'fa-times' }}"></i>
                                                </div>
                                                <span class="apd-item-name">Respiratory Protection</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-hard-hat"></i>
                            <h3>Tidak ada data APD</h3>
                            <p>Belum ada data kelengkapan APD yang diisi.</p>
                        </div>
                    @endif
                </div>

                <!-- Inspection Section -->
                <div class="content-section">
                    <h2 class="section-title">
                        <i class="fas fa-clipboard-check"></i>
                        Hasil Inspeksi
                    </h2>
                    @if($jsa->inspections->count() > 0)
                        <div class="list-container">
                            @foreach($jsa->inspections->groupBy('area_inspeksi') as $area => $inspections)
                                <div class="list-item">
                                    <div class="list-header">
                                        <div class="list-title">{{ $area }}</div>
                                        <div class="list-subtitle">
                                            {{ $inspections->first()->tanggal_selesai ? \Carbon\Carbon::parse($inspections->first()->tanggal_selesai)->format('d/m/Y') : 'Tanggal tidak tersedia' }}
                                        </div>
                                    </div>
                                    <table class="inspection-table">
                                        <thead>
                                            <tr>
                                                <th>Item Inspeksi</th>
                                                <th>Standar Kebersihan</th>
                                                <th>Hasil Pemeriksaan</th>
                                                <th>Status</th>
                                                <th>OK/NG</th>
                                                <th>Tindakan Korektif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inspections as $inspection)
                                                <tr>
                                                    <td>{{ $inspection->item_inspeksi }}</td>
                                                    <td>{{ $inspection->standar_kebersihan ?: 'Tidak diisi' }}</td>
                                                    <td>{{ $inspection->hasil_pemeriksaan ?: 'Tidak diisi' }}</td>
                                                    <td>{{ $inspection->status ?: 'Tidak diisi' }}</td>
                                                    <td>
                                                        <span class="inspection-status inspection-status-{{ strtolower($inspection->ok_ng) }}">
                                                            {{ $inspection->ok_ng }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $inspection->tindakan_korektif ?: 'Tidak diisi' }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fas fa-clipboard-check"></i>
                            <h3>Tidak ada hasil inspeksi</h3>
                            <p>Belum ada hasil inspeksi yang diisi.</p>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    @if($jsa->status === 'menunggu' || $jsa->status === 'Menunggu')
                        <form method="POST" action="{{ route('dosen.approvejsa', $jsa->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui JSA ini?')">
                                <i class="fas fa-check"></i> Disetujui
                            </button>
                        </form>
                        <form method="POST" action="{{ route('dosen.revisejsa', $jsa->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin mengirim JSA ini untuk revisi?')">
                                <i class="fas fa-edit"></i> Revisi
                            </button>
                        </form>
                    @elseif($jsa->status === 'revisi' || $jsa->status === 'Revisi')
                        <form method="POST" action="{{ route('dosen.approvejsa', $jsa->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui JSA ini?')">
                                <i class="fas fa-check"></i> Disetujui
                            </button>
                        </form>
                    @elseif($jsa->status === 'disetujui' || $jsa->status === 'Disetujui')
                        <div style="color: rgba(255, 255, 255, 0.9); font-size: 1.5rem; text-align: center; padding: 30px; margin-bottom: 20px;">
                            <i class="fas fa-check-circle" style="color: #27ae60; font-size: 3rem; margin-bottom: 15px;"></i>
                            <br>
                            <strong style="font-size: 1.8rem;">JSA telah disetujui</strong>
                        </div>
                    @else
                        <!-- Fallback for unknown status -->
                        <form method="POST" action="{{ route('dosen.approvejsa', $jsa->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui JSA ini?')">
                                <i class="fas fa-check"></i> Disetujui
                            </button>
                        </form>
                        <form method="POST" action="{{ route('dosen.revisejsa', $jsa->id) }}" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin mengirim JSA ini untuk revisi?')">
                                <i class="fas fa-edit"></i> Revisi
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>