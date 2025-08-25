<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa - Dashboard Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .header {
            background-color: #004d40;
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .back-btn {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            padding: 0.5rem 1rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .profile-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #004d40;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: bold;
            margin: 0 auto 1.5rem;
        }

        .profile-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 2rem;
        }

        .profile-info {
            display: grid;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            text-align: left;
        }

        .info-label {
            font-size: 0.9rem;
            color: #7f8c8d;
            font-weight: 600;
            text-transform: uppercase;
        }

        .info-value {
            font-size: 1.1rem;
            color: #2c3e50;
            font-weight: 500;
            padding: 0.75rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #004d40;
        }

        .edit-btn {
            background-color: #27ae60;
            color: white;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .edit-btn:hover {
            background-color: #2ecc71;
            transform: translateY(-2px);
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 1px solid #c3e6cb;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .profile-card {
                padding: 1.5rem;
            }
            
            .profile-avatar {
                width: 100px;
                height: 100px;
                font-size: 2.5rem;
            }
            
            .profile-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1>Profil Mahasiswa</h1>
        <a href="{{ route('mahasiswa.dashboard') }}" class="back-btn">
            ← Kembali ke Dashboard
        </a>
    </header>

    <div class="container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="profile-card">
            <div class="profile-avatar">
                {{ substr($mahasiswa->nama, 0, 1) }}
            </div>
            
            <h1 class="profile-title">Profil Saya</h1>
            
            <div class="profile-info">
                <div class="info-item">
                    <span class="info-label">Nama Lengkap</span>
                    <div class="info-value">{{ $mahasiswa->nama }}</div>
                </div>
                
                <div class="info-item">
                    <span class="info-label">NIM</span>
                    <div class="info-value">{{ $mahasiswa->nim }}</div>
                </div>
                
                <div class="info-item">
                    <span class="info-label">Bergabung Sejak</span>
                    <div class="info-value">{{ $mahasiswa->created_at->format('d F Y') }}</div>
                </div>
            </div>
            
            <a href="{{ route('mahasiswa.edit-profile') }}" class="edit-btn">
                Edit Profil
            </a>
        </div>
    </div>
</body>
</html>
