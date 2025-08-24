<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Sistem JSA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 10px 10px;
        }
        .password-box {
            background: #e9ecef;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .login-info {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Sistem JSA</h1>
        <p>Selamat Datang di Sistem Job Safety Analysis</p>
    </div>
    
    <div class="content">
        <h2>Halo, {{ $user->name }}!</h2>
        <p>Selamat datang di <strong>Sistem JSA</strong>. Akun dosen Anda telah berhasil dibuat.</p>
        
        <div class="password-box">
            <h3>📋 Detail Login Anda:</h3>
            <div class="login-info">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Password:</strong> <span style="background: #fff; padding: 5px 10px; border: 1px solid #ddd; border-radius: 3px; font-family: monospace; font-weight: bold;">{{ $password }}</span></p>
            </div>
        </div>
        
        <div class="warning">
            <p><strong>⚠️ Penting:</strong></p>
            <ul>
                <li>Catat password ini dengan baik</li>
                <li>Jangan bagikan password kepada siapapun</li>
                <li>Ganti password Anda setelah login pertama kali</li>
            </ul>
        </div>
        
        <p>Silakan login ke sistem menggunakan detail di atas:</p>
        <a href="http://localhost:8000/" class="btn">Login Sekarang</a>
        
        <p>Jika Anda mengalami masalah, silakan hubungi administrator sistem.</p>
    </div>
    
    <div class="footer">
        <p>© 2025 Sistem JSA - Politeknik Negeri Padang</p>
        <p>Email ini dikirim otomatis, mohon tidak membalas email ini.</p>
    </div>
</body>
</html>
