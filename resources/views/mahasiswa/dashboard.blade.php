<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa - Aplikasi JSA</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
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
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.6;
            }
            50% {
                transform: translateY(-15px) rotate(180deg);
                opacity: 0.9;
            }
        }

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
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: center;
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

        main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
            position: relative;
            z-index: 2;
        }

        .dashboard-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 
                0 25px 45px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            margin-bottom: 30px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

        .logout-btn {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(231, 76, 60, 0.4);
        }

        .btn-tambah-jsa {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
        }

        .btn-tambah-jsa:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(39, 174, 96, 0.4);
        }

        .filter-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-input {
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
        }

        .filter-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .filter-input:focus {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        /* Styling untuk dropdown select */
        select.filter-input {
            color: white !important;
            background: rgba(255, 255, 255, 0.1) !important;
        }

        select.filter-input option {
            background: rgba(30, 30, 47, 0.95) !important;
            color: white !important;
            padding: 10px;
        }

        /* Fallback untuk browser yang tidak support styling option */
        select.filter-input:focus {
            color: white;
        }

        /* Memastikan teks terlihat saat dropdown terbuka */
        select.filter-input:not([size]) {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 12px center;
            background-repeat: no-repeat;
            background-size: 16px;
            padding-right: 40px;
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
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .table-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: white;
        }

        th {
            background: rgba(255, 255, 255, 0.1);
            padding: 18px 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-size: 14px;
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-menunggu {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .status-disetujui {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .status-ditolak {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-detail {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-hapus {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-detail:hover, .btn-hapus:hover {
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 16px;
        }

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

        /* Modal Logout */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            margin: 15% auto;
            padding: 40px;
            border-radius: 20px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.2);
        }

        .modal-content p {
            margin-bottom: 25px;
            font-size: 18px;
            font-weight: 500;
        }

        .modal-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn-yes {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-no {
            background: linear-gradient(45deg, #7f8c8d, #95a5a6);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-yes:hover, .btn-no:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                justify-content: center;
                text-align: center;
            }

            .top-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-input, .filter-btn {
                width: 100%;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-detail, .btn-hapus {
                width: 100%;
                text-align: center;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 10px 8px;
            }

            .modal-content {
                margin: 20% auto;
                padding: 30px 20px;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
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
        <div class="header-content">
            <h1 class="header-title">Selamat Datang, {{ $mahasiswa->nama ?? 'Mahasiswa' }}</h1>
        </div>
</header>

<main>
        <div class="dashboard-container">
    <div class="top-bar">
                <button class="btn logout-btn" onclick="showModal()">
                    <span class="btn-text">Logout</span>
                </button>
                <a href="{{ url('mahasiswa/tambahjsa') }}" class="btn btn-tambah-jsa">+ Tambah JSA</a>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
                <input type="text" id="searchInput" class="filter-input" placeholder="Cari nama pekerjaan / lokasi / no JSA...">
                <select id="statusFilter" class="filter-input">
            <option value="">Semua Status</option>
            <option value="Menunggu">Menunggu</option>
            <option value="Disetujui">Disetujui</option>
            <option value="Ditolak">Ditolak</option>
        </select>
                <button type="button" class="filter-btn" onclick="loadJsa()">Filter</button>
                <button type="button" class="filter-btn" onclick="resetFilter()">Reset</button>
    </div>

    <!-- Tabel JSA -->
            <div class="table-container">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pekerjaan</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="jsaTableBody">
                        <tr>
                            <td colspan="6" class="empty-state">
                                <div class="loading"></div>
                                <p>Memuat data...</p>
                            </td>
                        </tr>
        </tbody>
    </table>
            </div>
        </div>
</main>

<footer>
    <p>&copy; {{ date('Y') }} Aplikasi JSA - Semua Hak Dilindungi</p>
</footer>

<!-- Modal Logout -->
<div id="logoutModal" class="modal">
    <div class="modal-content">
        <p>Apakah Anda yakin ingin keluar?</p>
        <form id="logoutForm" method="POST" action="{{ route('mahasiswa.logout') }}">
            @csrf
                <div class="modal-buttons">
            <button type="submit" class="btn-yes">Ya</button>
            <button type="button" class="btn-no" onclick="hideModal()">Tidak</button>
                </div>
        </form>
    </div>
</div>

<script>
        function showModal() { 
            document.getElementById('logoutModal').style.display = 'block'; 
        }
        
        function hideModal() { 
            document.getElementById('logoutModal').style.display = 'none'; 
        }

async function loadJsa() {
    const search = document.getElementById('searchInput').value;
    const status = document.getElementById('statusFilter').value;
            const tbody = document.getElementById('jsaTableBody');

            // Show loading
            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="empty-state">
                        <div class="loading"></div>
                        <p>Memuat data...</p>
                    </td>
                </tr>
            `;

    const url = '/mahasiswa/jsa-data?search=' + encodeURIComponent(search) + '&status=' + encodeURIComponent(status);

    try {
        const res = await fetch(url, { credentials: 'same-origin' });
        if (!res.ok) throw new Error('Network response was not ok');
        const data = await res.json();

        tbody.innerHTML = '';

        if (!data || data.length === 0) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="6" class="empty-state">
                                <p>Tidak ada data JSA</p>
                            </td>
                        </tr>
                    `;
            return;
        }

        data.forEach((item, index) => {
            const tr = document.createElement('tr');
            const tanggal = item.tanggal_pelaksanaan ?? item.created_at;
                    const statusClass = getStatusClass(item.status);

            tr.innerHTML = `
                <td>${index + 1}</td>
                <td>${escapeHtml(item.nama_pekerjaan ?? '')}</td>
                <td>${escapeHtml(item.lokasi_pekerjaan ?? item.lokasi ?? '')}</td>
                <td>${tanggal ? new Date(tanggal).toLocaleDateString('id-ID') : '-'}</td>
                        <td><span class="status-badge ${statusClass}">${escapeHtml(item.status ?? '')}</span></td>
                <td>
                            <div class="action-buttons">
                    <a href="/mahasiswa/detailjsa/${item.id}" class="btn-detail">Detail</a>
                    <button class="btn-hapus" onclick="hapusJsa(${item.id})">Hapus</button>
                            </div>
                </td>
            `;
            tbody.appendChild(tr);
        });
    } catch (err) {
        console.error(err);
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="empty-state">
                            <p>Terjadi kesalahan saat memuat data.</p>
                        </td>
                    </tr>
                `;
            }
        }

        function getStatusClass(status) {
            switch(status?.toLowerCase()) {
                case 'menunggu': return 'status-menunggu';
                case 'disetujui': return 'status-disetujui';
                case 'ditolak': return 'status-ditolak';
                default: return 'status-menunggu';
    }
}

function resetFilter() {
    document.getElementById('searchInput').value = '';
    document.getElementById('statusFilter').value = '';
    loadJsa();
}

async function hapusJsa(id) {
    if (!confirm('Yakin ingin menghapus JSA ini?')) return;

    try {
        const res = await fetch(`/mahasiswa/jsa/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            credentials: 'same-origin'
        });
        if (!res.ok) throw new Error('Gagal menghapus');
        await res.json();
        loadJsa();
    } catch (err) {
        console.error(err);
        alert('Gagal menghapus JSA.');
    }
}

function escapeHtml(str) {
    if (!str) return '';
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/"/g, '&quot;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;');
}

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('logoutModal');
            if (event.target === modal) {
                hideModal();
            }
        }

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
                const speed = 0.3 + (index * 0.1);
                shape.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

document.addEventListener('DOMContentLoaded', loadJsa);
</script>
</body>
</html>
