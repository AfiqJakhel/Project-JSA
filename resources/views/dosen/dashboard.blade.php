<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dosen - Kelola JSA</title>
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
            overflow-y: auto;
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
             background: rgba(30, 30, 47, 0.9);
             backdrop-filter: blur(15px);
             color: #fff;
             padding: 20px 0;
             position: relative;
             z-index: 10;
             box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
         }

                 .header-content {
             width: 100%;
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

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar-link {
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .user-avatar-link:hover {
            transform: scale(1.1);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #004d40;
            cursor: pointer;
            transition: box-shadow 0.3s ease;
        }

        .user-avatar:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
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

        .logout-btn {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .logout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(231, 76, 60, 0.4);
        }

        .btn-profile {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
        }

        .btn-profile:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(52, 152, 219, 0.4);
        }

                 /* Main Content */
         main {
             width: 100%;
             margin: 0 auto;
             padding: 20px 15px;
             position: relative;
             z-index: 2;
         }

                 .dashboard-container {
             background: rgba(255, 255, 255, 0.1);
             backdrop-filter: blur(20px);
             border-radius: 20px;
             padding: 20px;
             box-shadow: 
                 0 25px 45px rgba(0, 0, 0, 0.1),
                 0 0 0 1px rgba(255, 255, 255, 0.2);
             margin-bottom: 20px;
             width: 100%;
         }

                 .page-title {
             font-size: 1.8rem;
             font-weight: 700;
             color: white;
             margin-bottom: 1rem;
             text-align: center;
             text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
         }

                 .filter-section {
             background: rgba(255, 255, 255, 0.1);
             backdrop-filter: blur(10px);
             padding: 1rem;
             border-radius: 15px;
             box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
             margin-bottom: 1.5rem;
             border: 1px solid rgba(255, 255, 255, 0.2);
         }

                 .filter-form {
             display: flex;
             gap: 1rem;
             align-items: flex-end;
             flex-wrap: wrap;
         }

                 .form-group {
             display: flex;
             flex-direction: column;
             gap: 0.5rem;
             flex: 1;
         }

        .form-group label {
            font-weight: 600;
            color: white;
            font-size: 0.9rem;
        }

                 .form-group select {
             padding: 12px 16px;
             border: none;
             border-radius: 12px;
             background: rgba(255, 255, 255, 0.1);
             backdrop-filter: blur(10px);
             color: white;
             font-size: 14px;
             outline: none;
             transition: all 0.3s ease;
             border: 1px solid rgba(255, 255, 255, 0.2);
             height: 48px;
             box-sizing: border-box;
         }

        .form-group select:focus {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        .form-group select option {
            background: rgba(30, 30, 47, 0.95);
            color: white;
            padding: 10px;
        }

                 .filter-btn {
             background: linear-gradient(45deg, #667eea, #764ba2);
             color: white;
             border: none;
             padding: 12px 20px;
             border-radius: 12px;
             cursor: pointer;
             font-weight: 600;
             transition: all 0.3s ease;
             height: 48px;
             box-sizing: border-box;
             display: flex;
             align-items: center;
             justify-content: center;
         }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

                 .clear-btn {
             background: linear-gradient(45deg, #95a5a6, #7f8c8d);
             color: white;
             border: none;
             padding: 12px 20px;
             border-radius: 12px;
             cursor: pointer;
             font-weight: 600;
             transition: all 0.3s ease;
             text-decoration: none;
             height: 48px;
             box-sizing: border-box;
             display: flex;
             align-items: center;
             justify-content: center;
         }

        .clear-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(149, 165, 166, 0.3);
        }

                         .jsa-grid {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 1.5rem;
        }



                 .jsa-card {
             background: rgba(255, 255, 255, 0.1);
             backdrop-filter: blur(10px);
             border-radius: 20px;
             padding: 1.5rem;
             box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
             transition: all 0.3s ease;
             border: 1px solid rgba(255, 255, 255, 0.2);
             position: relative;
             overflow: hidden;
             min-height: 250px;
         }

                 .jsa-card:hover {
             transform: translateY(-8px);
             box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
             border-color: rgba(255, 255, 255, 0.4);
         }

                 .jsa-header {
             display: flex;
             justify-content: space-between;
             align-items: flex-start;
             margin-bottom: 1rem;
             padding-bottom: 0.75rem;
             border-bottom: 1px solid rgba(255, 255, 255, 0.1);
         }

                 .jsa-title {
             font-size: 1.2rem;
             font-weight: 700;
             color: white;
             margin-bottom: 0.4rem;
             line-height: 1.3;
         }

        .jsa-no {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
        }

                 .jsa-details {
             display: grid;
             grid-template-columns: repeat(6, 1fr);
             gap: 0.5rem;
             margin-bottom: 1rem;
         }

                 .detail-item {
             display: flex;
             flex-direction: column;
             gap: 0.3rem;
             padding: 0.5rem;
             background: rgba(255, 255, 255, 0.05);
             border-radius: 10px;
             border: 1px solid rgba(255, 255, 255, 0.1);
         }

                 .detail-label {
             font-size: 0.65rem;
             color: rgba(255, 255, 255, 0.6);
             font-weight: 600;
             text-transform: uppercase;
             letter-spacing: 0.3px;
         }

                 .detail-value {
             font-size: 0.85rem;
             color: white;
             font-weight: 600;
             line-height: 1.2;
         }

                 .status-badge {
             display: inline-block;
             padding: 0.5rem 1rem;
             border-radius: 25px;
             font-size: 0.8rem;
             font-weight: 700;
             text-transform: uppercase;
             letter-spacing: 0.5px;
             box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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

                 .jsa-actions {
             display: flex;
             gap: 0.75rem;
             justify-content: flex-end;
             margin-top: 1rem;
             padding-top: 1rem;
             border-top: 1px solid rgba(255, 255, 255, 0.1);
         }

                 .btn {
             padding: 0.6rem 1.2rem;
             border: none;
             border-radius: 12px;
             cursor: pointer;
             font-size: 0.85rem;
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

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .success-message {
            background: rgba(39, 174, 96, 0.2);
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 1px solid rgba(39, 174, 96, 0.3);
            backdrop-filter: blur(10px);
        }

                 /* Footer */
         footer {
             background: rgba(30, 30, 47, 0.9);
             backdrop-filter: blur(15px);
             color: #ccc;
             text-align: center;
             padding: 20px 0;
             position: relative;
             z-index: 10;
             margin-top: 40px;
         }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 100;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            margin: 15% auto;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 300px;
            text-align: center;
            border-radius: 15px;
            color: white;
        }

        .btn-yes {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-no {
            background: linear-gradient(45deg, #95a5a6, #7f8c8d);
            color: white;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-yes:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(39, 174, 96, 0.3);
        }

        .btn-no:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(149, 165, 166, 0.3);
        }

                         @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .filter-form {
                flex-direction: column;
                align-items: stretch;
            }
            
            .jsa-grid {
                gap: 1rem;
                margin-top: 1rem;
            }
            
            .jsa-details {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }
            
            .jsa-header {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .jsa-actions {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .detail-item {
                padding: 0.4rem;
            }
            
            .jsa-card {
                padding: 1rem;
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
            <h1 class="header-title">Selamat Datang, {{ Auth::user()->name ?? 'Dosen' }}</h1>
            <div class="user-info">
                <span>{{ Auth::user()->name }}</span>
                <a href="{{ route('dosen.profile') }}" class="user-avatar-link">
                    <div class="user-avatar">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </a>
            </div>
        </div>
    </header>

    <main>
        <div class="dashboard-container">
            <div class="top-bar">
                <button class="btn logout-btn" onclick="showLogoutModal()">Logout</button>
            </div>
            
            <h1 class="page-title">Kelola JSA</h1>

            @if(session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Filter Section -->
            <div class="filter-section">
                <form method="GET" action="{{ route('dosen.dashboard') }}" class="filter-form">
                    <div class="form-group">
                        <label for="matakuliah">Filter Mata Kuliah:</label>
                        <select name="matakuliah" id="matakuliah">
                            <option value="">Semua Mata Kuliah</option>
                            @foreach($mataKuliahList as $mk)
                                <option value="{{ $mk->nama_matakuliah }}" 
                                    {{ request('matakuliah') == $mk->nama_matakuliah ? 'selected' : '' }}>
                                    {{ $mk->nama_matakuliah }} (Semester {{ $mk->semester }}, Kelas {{ $mk->kelas }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Filter Status:</label>
                        <select name="status" id="status">
                            <option value="">Semua Status</option>
                            <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="revisi" {{ request('status') == 'revisi' ? 'selected' : '' }}>Revisi</option>
                        </select>
                    </div>
                    <button type="submit" class="filter-btn">Filter</button>
                    <a href="{{ route('dosen.dashboard') }}" class="clear-btn">Clear</a>
                </form>
            </div>

            <!-- JSA List -->
            <div class="jsa-grid">
                @if($jsas->count() > 0)
                    @foreach($jsas as $jsa)
                        <div class="jsa-card">
                            <div class="jsa-header">
                                <div>
                                    <div class="jsa-title">{{ $jsa->nama_pekerjaan }}</div>
                                    <div class="jsa-no">No. JSA: {{ $jsa->no_jsa }}</div>
                                </div>
                                <span class="status-badge status-{{ strtolower($jsa->status) }}">
                                    {{ ucfirst($jsa->status) }}
                                </span>
                            </div>

                            <div class="jsa-details">
                                <div class="detail-item">
                                    <span class="detail-label">Mata Kuliah</span>
                                    <span class="detail-value">{{ $jsa->matakuliah }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Kelas</span>
                                    <span class="detail-value">{{ $jsa->kelas }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Semester</span>
                                    <span class="detail-value">{{ $jsa->semester }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Lokasi Pekerjaan</span>
                                    <span class="detail-value">{{ $jsa->lokasi_pekerjaan }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Tanggal Pelaksanaan</span>
                                    <span class="detail-value">{{ $jsa->tanggal_pelaksanaan }}</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Mahasiswa</span>
                                    <span class="detail-value">
                                        @if($jsa->mahasiswas->count() > 0)
                                            {{ $jsa->mahasiswas->pluck('nama')->implode(', ') }}
                                        @else
                                            -
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="jsa-actions">
                                <a href="{{ route('dosen.detailjsa', $jsa->id) }}" class="btn btn-primary">
                                    Lihat Detail
                                </a>
                                
                                @if($jsa->status === 'menunggu' || $jsa->status === 'Menunggu')
                                    <form method="POST" action="{{ route('dosen.approvejsa', $jsa->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui JSA ini?')">
                                            Disetujui
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('dosen.revisejsa', $jsa->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin mengirim JSA ini untuk revisi?')">
                                            Revisi
                                        </button>
                                    </form>
                                @elseif($jsa->status === 'revisi' || $jsa->status === 'Revisi')
                                    <form method="POST" action="{{ route('dosen.approvejsa', $jsa->id) }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin ingin menyetujui JSA ini?')">
                                            Disetujui
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <h3>Tidak ada JSA ditemukan</h3>
                        <p>Belum ada JSA yang dibuat atau tidak ada JSA yang sesuai dengan filter yang dipilih.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Aplikasi JSA - Semua Hak Dilindungi</p>
    </footer>

    <!-- Logout Modal -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <p>Apakah Anda yakin ingin keluar?</p>
            <form id="logoutForm" method="POST" action="{{ route('dosen.logout') }}">
                @csrf
                <button type="submit" class="btn-yes">Ya</button>
                <button type="button" class="btn-no" onclick="hideLogoutModal()">Tidak</button>
            </form>
        </div>
    </div>

    <script>
        function showLogoutModal() {
            document.getElementById('logoutModal').style.display = 'block';
        }

        function hideLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }
    </script>
</body>
</html>
