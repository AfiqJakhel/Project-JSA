<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail JSA - Dashboard Dosen</title>
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
            animation: float 4s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 60px;
            height: 60px;
            top: 15%;
            left: 5%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 80px;
            height: 80px;
            top: 70%;
            right: 5%;
            animation-delay: 1s;
        }

        .shape:nth-child(3) {
            width: 40px;
            height: 40px;
            top: 85%;
            left: 15%;
            animation-delay: 2s;
        }

        .shape:nth-child(4) {
            width: 70px;
            height: 70px;
            top: 8%;
            right: 25%;
            animation-delay: 0.5s;
        }

        .shape:nth-child(5) {
            width: 50px;
            height: 50px;
            top: 45%;
            left: 70%;
            animation-delay: 1.5s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 0;
            position: relative;
            z-index: 10;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            font-size: 1.8rem;
            font-weight: 600;
            background: linear-gradient(45deg, #667eea, #764ba2, #f093fb);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientShift 2s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .back-btn {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .back-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.4);
        }

        /* Main Content */
        main {
            max-width: 1000px;
            margin: 0 auto;
            padding: 30px 20px;
            position: relative;
            z-index: 2;
        }

        .jsa-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
        }

        .jsa-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .jsa-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .jsa-no {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-menunggu {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
        }

        .status-approved {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
        }

        .status-rejected {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .jsa-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .detail-section {
            background: rgba(255, 255, 255, 0.05);
            padding: 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .detail-label {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            font-size: 1rem;
            color: white;
            font-weight: 500;
            padding: 8px 12px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .jsa-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
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
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.4);
        }

        .btn-success {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(39, 174, 96, 0.4);
        }

        .btn-danger {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(231, 76, 60, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            color: white;
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(149, 165, 166, 0.4);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            color: rgba(255, 255, 255, 0.7);
            position: relative;
            z-index: 2;
        }

        @media (max-width: 768px) {
            .jsa-container {
                padding: 20px;
            }
            
            .jsa-header {
                flex-direction: column;
                gap: 1rem;
            }
            
            .jsa-details {
                grid-template-columns: 1fr;
            }
            
            .jsa-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="animated-bg">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>

    <header>
        <div class="header-content">
            <h1 class="header-title">Detail JSA</h1>
            <a href="{{ route('dosen.dashboard') }}" class="back-btn">Kembali ke Dashboard</a>
        </div>
    </header>

    <main>
        <div class="jsa-container">
            <div class="jsa-header">
                <div>
                    <h1 class="jsa-title">{{ $jsa->nama_pekerjaan }}</h1>
                    <div class="jsa-no">No. JSA: {{ $jsa->no_jsa }}</div>
                </div>
                <span class="status-badge status-{{ $jsa->status }}">
                    {{ ucfirst($jsa->status) }}
                </span>
            </div>

            <div class="jsa-details">
                <div class="detail-section">
                    <h2 class="section-title">Informasi Umum</h2>
                    <div class="detail-item">
                        <span class="detail-label">Mata Kuliah</span>
                        <div class="detail-value">{{ $jsa->matakuliah }}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Kelas</span>
                        <div class="detail-value">{{ $jsa->kelas }}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Program Studi</span>
                        <div class="detail-value">{{ $jsa->prodi }}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Semester</span>
                        <div class="detail-value">{{ $jsa->semester }}</div>
                    </div>
                </div>

                <div class="detail-section">
                    <h2 class="section-title">Detail Pekerjaan</h2>
                    <div class="detail-item">
                        <span class="detail-label">Lokasi Pekerjaan</span>
                        <div class="detail-value">{{ $jsa->lokasi_pekerjaan }}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Tanggal Pelaksanaan</span>
                        <div class="detail-value">{{ $jsa->tanggal_pelaksanaan }}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Status</span>
                        <div class="detail-value">{{ ucfirst($jsa->status) }}</div>
                    </div>
                </div>

                <div class="detail-section">
                    <h2 class="section-title">Mahasiswa Terlibat</h2>
                    @if($jsa->mahasiswas->count() > 0)
                        @foreach($jsa->mahasiswas as $mahasiswa)
                            <div class="detail-item">
                                <span class="detail-label">{{ $mahasiswa->nim }}</span>
                                <div class="detail-value">{{ $mahasiswa->nama }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="detail-item">
                            <span class="detail-label">Tidak ada mahasiswa</span>
                            <div class="detail-value">-</div>
                        </div>
                    @endif
                </div>

                <div class="detail-section">
                    <h2 class="section-title">Dosen Pembimbing</h2>
                    @if($jsa->dosens->count() > 0)
                        @foreach($jsa->dosens as $dosen)
                            <div class="detail-item">
                                <span class="detail-label">{{ $dosen->nip ?? 'NIP tidak tersedia' }}</span>
                                <div class="detail-value">{{ $dosen->name }}</div>
                            </div>
                        @endforeach
                    @else
                        <div class="detail-item">
                            <span class="detail-label">Tidak ada dosen</span>
                            <div class="detail-value">-</div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="jsa-actions">
                @if($jsa->status === 'menunggu')
                    <form method="POST" action="{{ route('dosen.approvejsa', $jsa->id) }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin approve JSA ini?')">
                            Approve JSA
                        </button>
                    </form>
                    <form method="POST" action="{{ route('dosen.rejectjsa', $jsa->id) }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin reject JSA ini?')">
                            Reject JSA
                        </button>
                    </form>
                @endif
                <a href="{{ route('dosen.dashboard') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Aplikasi JSA - Semua Hak Dilindungi</p>
    </footer>
</body>
</html>