<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 0;
        }

        header, footer {
            background-color: #004d40;
            color: white;
            padding: 15px;
            text-align: center;
        }

        main {
            padding: 20px;
            text-align: center;
        }

        .logout-btn {
            background-color: #c0392b;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        .logout-btn:hover {
            background-color: #e74c3c;
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
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 30px;
            border: 1px solid #888;
            width: 300px;
            text-align: center;
            border-radius: 10px;
        }

        .modal button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-yes {
            background-color: #27ae60;
            color: white;
        }

        .btn-no {
            background-color: #7f8c8d;
            color: white;
        }

        .btn-yes:hover {
            background-color: #2ecc71;
        }

        .btn-no:hover {
            background-color: #95a5a6;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>Selamat Datang, Dosen</h1>
    </header>

    <!-- Main Content -->
    <main>
        <p>Ini adalah halaman dashboard Dosen.</p>

        <!-- Tombol Logout -->
        <button class="logout-btn" onclick="showModal()">Logout</button>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Aplikasi JSA - Semua Hak Dilindungi</p>
    </footer>

    <!-- Modal Logout -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <p>Apakah Anda yakin ingin keluar?</p>
            <form id="logoutForm" method="POST" action="{{ route('dosen.logout') }}">
                @csrf
                <button type="submit" class="btn-yes">Ya</button>
                <button type="button" class="btn-no" onclick="hideModal()">Tidak</button>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        function showModal() {
            document.getElementById('logoutModal').style.display = 'block';
        }

        function hideModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }
    </script>
</body>
</html>
