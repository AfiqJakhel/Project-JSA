<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Aplikasi JSA</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            overflow-x: hidden;
            position: relative;
        }

        /* Animated Background */
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
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
            animation: float 3s ease-in-out infinite;
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
            animation-delay: 1s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 80%;
            left: 20%;
            animation-delay: 2s;
        }

        .shape:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 10%;
            right: 30%;
            animation-delay: 0.5s;
        }

        .shape:nth-child(5) {
            width: 40px;
            height: 40px;
            top: 40%;
            left: 60%;
            animation-delay: 1.5s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
                opacity: 1;
            }
        }

        header {
            background: rgba(30, 30, 47, 0.9);
            backdrop-filter: blur(10px);
            color: #fff;
            padding: 20px 0;
            position: relative;
            z-index: 10;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .marquee {
            white-space: nowrap;
            overflow: hidden;
            font-size: 24px;
            font-weight: 600;
            text-align: center;
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

        main {
            display: flex;
            min-height: calc(100vh - 80px);
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
        }

        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            gap: 40px;
            align-items: center;
        }

        .intro {
            flex: 1;
            color: white;
            z-index: 2;
        }

        .intro h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .intro p {
            font-size: 1.2rem;
            line-height: 1.8;
            opacity: 0.9;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            border-radius: 20px;
            padding: 40px 35px;
            width: 100%;
            max-width: 380px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .login-card:hover::before {
            left: 100%;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.3);
        }

        .login-card h2 {
            text-align: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 20px;
            margin-top: 2px;
            font-weight: 700;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
            background: linear-gradient(135deg, #fff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 0.9rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .input-container {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .input-container:focus-within {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15), 0 0 0 4px rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .input-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .input-container:focus-within::before {
            left: 100%;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 16px 20px;
            background: transparent;
            border: none;
            color: white;
            font-size: 15px;
            outline: none;
            position: relative;
            z-index: 1;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            color: #fff;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.6);
            font-weight: 400;
            transition: all 0.3s ease;
        }

        input:focus::placeholder {
            color: rgba(255, 255, 255, 0.4);
            transform: translateX(5px);
        }

        .btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #5a6fd8, #6a4190, #e085e8);
        }

        .btn:active {
            transform: translateY(-2px) scale(0.98);
        }

        .btn:active {
            transform: translateY(0);
        }

        .loading {
            display: none;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .alert {
            background: rgba(220, 53, 69, 0.2);
            color: #ff6b6b;
            border: 1px solid rgba(220, 53, 69, 0.3);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 14px;
            backdrop-filter: blur(10px);
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        .info-text {
            text-align: center;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.85rem;
            line-height: 1.6;
            background: rgba(255, 255, 255, 0.1);
            padding: 18px;
            border-radius: 12px;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .info-text p {
            margin: 8px 0;
        }

        .info-text strong {
            color: #fff;
            font-weight: 600;
        }

        .register-links {
            text-align: center;
            margin-top: 20px;
            padding: 0;
            background: transparent;
            border-radius: 0;
            backdrop-filter: none;
            border: none;
            box-shadow: none;
        }

        .register-text {
            margin-bottom: 15px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
        }

        .register-btn {
            background: linear-gradient(135deg, #28a745, #20c997, #17a2b8) !important;
            margin-bottom: -10px;
            margin-top: -10px;
            display: inline-block;
            text-decoration: none;
            width: 100%;
            padding: 12px 24px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 15px;
        }

        .register-btn:hover {
            background: linear-gradient(135deg, #218838, #1ea085, #138496) !important;
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.5);
        }

        .register-note {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.8rem;
            display: block;
            margin-top: 12px;
            font-weight: 500;
        }

        /* Modern floating animation for shapes */
        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg) scale(1);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-30px) rotate(180deg) scale(1.1);
                opacity: 1;
            }
        }

        /* Enhanced loading animation */
        .spinner {
            width: 24px;
            height: 24px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-top: 3px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        footer {
            background: rgba(30, 30, 47, 0.9);
            backdrop-filter: blur(10px);
            color: #ccc;
            text-align: center;
            padding: 20px 0;
            position: relative;
            z-index: 10;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                gap: 30px;
            }

            .intro h1 {
                font-size: 2.5rem;
            }

            .intro p {
                font-size: 1rem;
            }

            .login-card {
                padding: 30px 20px;
            }

            main {
                padding: 20px 10px;
            }
        }

        /* Loading Animation */
        .loading {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
        <div class="marquee">
            Aplikasi JSA & CC
        </div>
    </header>

    <main>
        <div class="container">
            <div class="intro">
                <h1>Selamat Datang di Aplikasi JSA</h1>
                <p>
                    Aplikasi JSA (Job Safety Analysis) adalah sistem berbasis web yang dirancang untuk mempermudah mahasiswa dalam menyusun dan mengelola analisis keselamatan kerja sebelum melaksanakan praktik lapangan.
                </p>
                <p>
                    Mahasiswa dapat memilih template JSA, melakukan checklist kelengkapan, serta mengunggah dokumen yang dibutuhkan. Dosen bertugas melakukan verifikasi dan pengelolaan sistem.
                </p>
            </div>

            <div class="login-container">
                <div class="login-card">
                    <h2>LOGIN</h2>
                    
                    @if(session('error'))
                        <div class="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    @if($errors->any())
                        <div class="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.unified') }}" method="POST" id="loginForm">
                        @csrf
                        
                        <div class="form-group">
                            <label for="identifier">Email / NIM</label>
                            <div class="input-container">
                                <input type="text" name="identifier" id="identifier" value="{{ old('identifier') }}" required placeholder="Masukkan email atau NIM ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-container">
                                <input type="password" name="password" id="password" required placeholder="Masukkan password">
                            </div>
                        </div>

                        <button type="submit" class="btn" id="loginBtn">
                            <span class="btn-text">Login</span>
                            <div class="loading">
                                <div class="spinner"></div>
                            </div>
                        </button>
                    </form>
                    
                    <div class="register-links">
                        <a href="{{ route('register.dosen') }}" class="btn register-btn">Register Dosen</a>
                    </div>
                    
                    <div class="info-text">
                        <p><strong>Untuk Mahasiswa:</strong> Login menggunakan NIM</p>
                        <p><strong>Untuk Dosen:</strong> Login menggunakan email</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        &copy;jsa_2025
    </footer>

    <script>
        // Form submission with loading animation
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const identifier = document.getElementById('identifier').value.trim();
            const password = document.getElementById('password').value.trim();
            
            // Basic validation
            if (!identifier || !password) {
                e.preventDefault();
                alert('Mohon isi email/NIM dan password');
                return;
            }
            
            const btn = document.getElementById('loginBtn');
            const btnText = btn.querySelector('.btn-text');
            const loading = btn.querySelector('.loading');
            
            btnText.style.display = 'none';
            loading.style.display = 'flex';
            btn.disabled = true;
        });

        // Add floating animation to shapes
        const shapes = document.querySelectorAll('.shape');
        shapes.forEach((shape, index) => {
            shape.style.animationDelay = `${index * 0.3}s`;
        });

        // Parallax effect on scroll
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const shapes = document.querySelectorAll('.shape');
            
            shapes.forEach((shape, index) => {
                const speed = 0.5 + (index * 0.1);
                shape.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Auto-focus on identifier field
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('identifier').focus();
        });

        // Show/hide password toggle (optional enhancement)
        const passwordField = document.getElementById('password');
        passwordField.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                document.getElementById('loginForm').submit();
            }
        });
    </script>
</body>
</html>
