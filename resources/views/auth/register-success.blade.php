<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Berhasil - Sistem JSA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .success-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 600px;
        }
        .success-header {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .success-body {
            padding: 40px 30px;
        }
        .password-box {
            background: #e9ecef;
            border: 2px solid #dee2e6;
            border-radius: 10px;
            padding: 25px;
            margin: 25px 0;
        }
        .login-info {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
        }
        .password {
            background: #fff;
            padding: 8px 15px;
            border: 2px solid #28a745;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-weight: bold;
            font-size: 1.1em;
            color: #28a745;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            color: white;
            display: inline-block;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
        .check-icon {
            font-size: 3em;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-header">
            <div class="check-icon">✅</div>
            <h2>Registrasi Berhasil!</h2>
            <p>Selamat datang di Sistem JSA</p>
        </div>
        
        <div class="success-body">
            <h3>Halo, <strong>{{ $user->name }}</strong>!</h3>
            <p>Akun dosen Anda telah berhasil dibuat di <strong>Sistem JSA</strong>.</p>
            
            <div class="password-box">
                <h4>📋 Detail Login Anda:</h4>
                <div class="login-info">
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Password:</strong> <span class="password">{{ $password }}</span></p>
                </div>
            </div>
            
            <div class="warning">
                <h5>⚠️ <strong>Penting:</strong></h5>
                <ul class="mb-0">
                    <li>Catat password ini dengan baik!</li>
                    <li>Password tidak akan ditampilkan lagi setelah halaman ini ditutup</li>
                    <li>Jangan bagikan password kepada siapapun</li>
                    <li>Ganti password Anda setelah login pertama kali</li>
                </ul>
            </div>
            
            <div class="text-center">
                <p>Silakan login ke sistem menggunakan detail di atas:</p>
                <a href="/" class="btn-login">Login Sekarang</a>
            </div>
            
            <div class="text-center mt-4">
                <small class="text-muted">
                    Jika Anda mengalami masalah, silakan hubungi administrator sistem.
                </small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
