{{-- resources/views/mahasiswa/editjsa.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit JSA</title>
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
            max-width: 1200px;
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

        /* Form Styles */
        .form-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            margin-bottom: 40px;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: white;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
            padding-bottom: 10px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
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

        .form-input {
            width: 100%;
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

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-input:focus {
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        /* Date Input Styles */
        input[type="date"] {
            cursor: pointer;
            position: relative;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }

        input[type="date"]::-webkit-datetime-edit {
            cursor: pointer;
        }

        input[type="date"]::-webkit-datetime-edit-fields-wrapper {
            cursor: pointer;
        }

        input[type="date"]::-webkit-datetime-edit-text {
            cursor: pointer;
        }

        input[type="date"]::-webkit-datetime-edit-month-field,
        input[type="date"]::-webkit-datetime-edit-day-field,
        input[type="date"]::-webkit-datetime-edit-year-field {
            cursor: pointer;
        }

        /* Hover effect untuk date input */
        input[type="date"]:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Active state untuk date input */
        input[type="date"]:active {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(1px);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-select {
            width: 100%;
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

        .form-select option {
            background: rgba(30, 30, 47, 0.95);
            color: white;
            padding: 10px;
        }

        /* PPE Section */
        .ppe-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .ppe-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .ppe-grid-bottom {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 15px;
        }

        .ppe-item {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            background: transparent;
            border-radius: 0;
            height: 50px;
            min-height: 50px;
        }

        /* Custom Checkbox Styles */
        .ppe-checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            color: white;
            font-size: 0.9rem;
            position: relative;
            padding: 12px 16px;
            padding-left: 40px;
            user-select: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin: 4px 0;
            width: 100%;
            box-sizing: border-box;
            pointer-events: all;
            min-height: 50px;
            height: 50px;
        }

        .ppe-checkbox-label:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .ppe-checkbox {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            z-index: 1;
            pointer-events: none;
        }

        .checkmark {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            height: 22px;
            width: 22px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 5px;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .ppe-checkbox-label:hover .checkmark {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .ppe-checkbox:checked ~ .checkmark {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            border-color: #27ae60;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .ppe-checkbox:checked ~ .checkmark:after {
            display: block;
        }

        .ppe-checkbox-label .checkmark:after {
            left: 7px;
            top: 3px;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        /* Active state untuk feedback klik */
        .ppe-checkbox-label:active {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(0px);
        }

        /* Checked state untuk label */
        .ppe-checkbox:checked ~ .ppe-checkbox-label {
            background: rgba(39, 174, 96, 0.1);
            border-color: rgba(39, 174, 96, 0.3);
        }

        input[type="date"]::-webkit-datetime-edit-text {
            cursor: pointer;
        }

        input[type="date"]::-webkit-datetime-edit-month-field,
        input[type="date"]::-webkit-datetime-edit-day-field,
        input[type="date"]::-webkit-datetime-edit-year-field {
            cursor: pointer;
        }

        /* Hover effect untuk date input */
        input[type="date"]:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
        }

        /* Active state untuk date input */
        input[type="date"]:active {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(1px);
        }

        .form-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .form-select {
            width: 100%;
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

        .form-select option {
            background: rgba(30, 30, 47, 0.95);
            color: white;
            padding: 10px;
        }

        /* PPE Section */
        .ppe-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .ppe-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .ppe-grid-bottom {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 15px;
        }

        .ppe-item {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            background: transparent;
            border-radius: 0;
            height: 50px;
            min-height: 50px;
        }

        /* Custom Checkbox Styles */
        .ppe-checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            color: white;
            font-size: 0.9rem;
            position: relative;
            padding: 12px 16px;
            padding-left: 40px;
            user-select: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin: 4px 0;
            width: 100%;
            box-sizing: border-box;
            pointer-events: all;
            min-height: 50px;
            height: 50px;
        }

        .ppe-checkbox-label:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .ppe-checkbox {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            z-index: 1;
            pointer-events: none;
        }

        .checkmark {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            height: 22px;
            width: 22px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 5px;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .ppe-checkbox-label:hover .checkmark {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
        }

        .ppe-checkbox:checked ~ .checkmark {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            border-color: #27ae60;
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .ppe-checkbox:checked ~ .checkmark:after {
            display: block;
        }

        .ppe-checkbox-label .checkmark:after {
            left: 7px;
            top: 3px;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        /* Active state untuk feedback klik */
        .ppe-checkbox-label:active {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(0px);
        }

        /* Checked state untuk label */
        .ppe-checkbox:checked ~ .ppe-checkbox-label {
            background: rgba(39, 174, 96, 0.1);
            border-color: rgba(39, 174, 96, 0.3);
        }

        /* Work Sequence & Hazards Section */
        .work-sequence-input {
            margin-bottom: 30px;
        }

        .input-group {
            display: flex;
            gap: 10px;
        }

        .input-group .form-input {
            flex: 1;
        }

        .work-steps-list {
            margin-top: 20px;
        }

        .work-step-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .work-step-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .work-step-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .step-number {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .step-text {
            font-weight: 600;
            color: white;
        }

        .work-step-actions {
            display: flex;
            gap: 10px;
        }

        .work-step-details {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
            display: none;
        }

        /* Inspection Areas Section */
        .inspection-areas-input {
            margin-bottom: 30px;
        }

        .inspection-areas-list {
            margin-top: 20px;
        }

        .inspection-area-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .inspection-area-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .inspection-area-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .area-number {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 0.9rem;
        }

        .area-text {
            font-weight: 600;
            color: white;
        }

        .inspection-area-actions {
            display: flex;
            gap: 10px;
        }

        .inspection-area-details {
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
            display: none;
        }

        .inspection-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .inspection-table th,
        .inspection-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .inspection-table th {
            background: rgba(255, 255, 255, 0.1);
            font-weight: 600;
            color: white;
        }

        .inspection-table input,
        .inspection-table textarea,
        .inspection-table select {
            width: 100%;
            padding: 6px 8px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 0.8rem;
        }

        .inspection-table select {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .inspection-table select option {
            background: rgba(30, 30, 47, 0.95);
            color: white;
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.4);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.8rem;
        }

        /* Submit Section */
        .submit-section {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-submit {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            padding: 15px 40px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(39, 174, 96, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .btn-submit .loading {
            display: none;
        }

        .btn-submit:disabled .btn-text {
            display: none;
        }

        .btn-submit:disabled .loading {
            display: inline-flex;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .form-container {
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .work-step-details.show {
                grid-template-columns: 1fr;
            }

            .ppe-grid,
            .ppe-grid-bottom {
                grid-template-columns: repeat(2, 1fr);
            }

            .inspection-table {
                font-size: 0.8rem;
            }

            .inspection-table th,
            .inspection-table td {
                padding: 8px;
            }

            .header h1 {
                font-size: 2rem;
            }
        }

        /* Submit Button */
        .submit-section {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-submit {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            color: white;
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 30px;
            box-shadow: 0 5px 20px rgba(39, 174, 96, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .loading {
            display: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .ppe-grid,
            .ppe-grid-bottom {
                grid-template-columns: repeat(2, 1fr);
            }

            .work-step-header,
            .inspection-area-header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start;
            }

            .work-step-actions,
            .inspection-area-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .input-group {
                flex-direction: column;
            }

            .container {
                padding: 10px;
            }

            .form-container {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .ppe-grid,
            .ppe-grid-bottom {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background Shapes -->
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <a href="{{ url('mahasiswa/dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
            <h1>Edit JSA</h1>
            <p>Perbarui data Job Safety Analysis Anda</p>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <form id="jsaForm" method="POST" action="{{ route('mahasiswa.jsa.update', $jsa->id) }}">
                @csrf
                @method('PUT')

                <!-- Basic Information Section -->
                <div class="form-section">
                    <h2 class="section-title">Informasi Dasar</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Semester</label>
                            <input type="text" name="semester" class="form-input" placeholder="Masukkan semester" value="{{ old('semester', $jsa->prodi) }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mata Kuliah</label>
                            <input type="text" name="matakuliah" class="form-input" placeholder="Masukkan mata kuliah" value="{{ old('matakuliah', $jsa->matakuliah) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-input" placeholder="Masukkan kelas" value="{{ old('kelas', $jsa->kelas) }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Pekerjaan</label>
                            <input type="text" name="nama_pekerjaan" class="form-input" placeholder="Masukkan nama pekerjaan" value="{{ old('nama_pekerjaan', $jsa->nama_pekerjaan) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <select name="lokasi_pekerjaan" class="form-select" required>
                                <option value="">Pilih Lokasi</option>
                                <option value="Hangar" {{ old('lokasi_pekerjaan', $jsa->lokasi_pekerjaan) == 'Hangar' ? 'selected' : '' }}>Hangar</option>
                                <option value="Workshop" {{ old('lokasi_pekerjaan', $jsa->lokasi_pekerjaan) == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Pekerjaan</label>
                            <input type="date" name="tanggal_pelaksanaan" class="form-input" value="{{ old('tanggal_pelaksanaan', optional($jsa->tanggal_pelaksanaan)->format('Y-m-d')) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">No JSA</label>
                            <input type="text" name="no_jsa" class="form-input" placeholder="Masukkan nomor JSA" value="{{ old('no_jsa', $jsa->no_jsa) }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Dosen Pembimbing</label>
                            <select name="dosen_pembimbing" class="form-select" required>
                                <option value="">Pilih Dosen Pembimbing</option>
                                @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" {{ old('dosen_pembimbing', $jsa->dosens->first()->id ?? '') == $dosen->id ? 'selected' : '' }}>
                                        {{ $dosen->nip }} - {{ $dosen->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- PPE Completeness Section -->
                <div class="form-section">
                    <h2 class="section-title">Kelengkapan APD</h2>
                    <div class="ppe-section">
                        <div class="ppe-grid">
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_helmet" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_shelmet == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Safety Helmet
                                </label>
                            </div>
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_gloves" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_sgloves == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Safety Gloves
                                </label>
                            </div>
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_shoes" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_shoes == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Safety Shoes
                                </label>
                            </div>
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_glasses" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_sglasses == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Safety Glasses
                                </label>
                            </div>
                        </div>
                        <div class="ppe-grid-bottom">
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_vest" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_svest == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Safety Vest
                                </label>
                            </div>
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_earplug" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_earplug == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Earplug
                                </label>
                            </div>
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_mask" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_fmask == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Face Mask
                                </label>
                            </div>
                            <div class="ppe-item">
                                <label class="ppe-checkbox-label">
                                    <input type="checkbox" name="ppe_respiratory" value="Ada" class="ppe-checkbox" {{ $jsa->apds->first()->apd_respiratory == 'Ada' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                    Respiratory Protection
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Work Sequence & Hazards Section -->
                <div class="form-section">
                    <h2 class="section-title">Urutan Pekerjaan & Analisis Bahaya</h2>
                    
                    <!-- Input Urutan Pekerjaan -->
                    <div class="work-sequence-input">
                        <div class="form-group">
                            <label class="form-label">Tambah Urutan Pekerjaan</label>
                            <div class="input-group">
                                <input type="text" id="workStepInput" class="form-input" placeholder="Masukkan urutan pekerjaan (contoh: Persiapan alat, Pemeriksaan area, dll)">
                                <button type="button" id="addWorkStep" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Urutan Pekerjaan -->
                    <div class="work-steps-list" id="workStepsList">
                        @foreach($jsa->workSteps as $index => $workStep)
                        <div class="work-step-item" data-step-id="{{ $index + 1 }}">
                            <div class="work-step-header">
                                <div class="work-step-title">
                                    <span class="step-number">{{ $index + 1 }}</span>
                                    <span class="step-text">{{ $workStep->step_description }}</span>
                                </div>
                                <div class="work-step-actions">
                                    <button type="button" class="btn btn-secondary btn-sm btn-toggle-hazards">Buka Analisis</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-remove-step">Hapus</button>
                                </div>
                            </div>
                            <div class="work-step-details">
                                <div class="form-group">
                                    <label class="form-label">Potensi Bahaya</label>
                                    <textarea name="potensi_bahaya[]" class="form-input form-textarea" placeholder="Masukkan potensi bahaya" required>{{ $workStep->potensi_bahaya }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Upaya Pengendalian</label>
                                    <textarea name="upaya_pengendalian[]" class="form-input form-textarea" placeholder="Masukkan upaya pengendalian" required>{{ $workStep->upaya_pengendalian }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="urutan_pekerjaan[]" class="step-description-input" value="{{ $workStep->step_description }}">
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Inspection Areas Section -->
                <div class="form-section">
                    <h2 class="section-title">Area Inspeksi</h2>
                    
                    <!-- Input Area Inspeksi -->
                    <div class="inspection-areas-input">
                        <div class="form-group">
                            <label class="form-label">Tambah Area Inspeksi</label>
                            <div class="input-group">
                                <input type="text" id="inspectionAreaInput" class="form-input" placeholder="Masukkan area inspeksi (contoh: Area Produksi, Area Penyimpanan, dll)">
                                <button type="button" id="addInspectionArea" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Area Inspeksi -->
                    <div class="inspection-areas-list" id="inspectionAreasList">
                        @php
                            $inspectionAreas = $jsa->inspections->groupBy('area_inspeksi');
                        @endphp
                        @foreach($inspectionAreas as $areaName => $inspections)
                        <div class="inspection-area-item" data-area-id="{{ $loop->index + 1 }}">
                            <div class="inspection-area-header">
                                <div class="inspection-area-title">
                                    <span class="area-number">{{ $loop->index + 1 }}</span>
                                    <span class="area-text">{{ $areaName }}</span>
                                </div>
                                <div class="inspection-area-actions">
                                    <button type="button" class="btn btn-secondary btn-sm btn-toggle-inspection">Buka Tabel</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-remove-area">Hapus</button>
                                </div>
                            </div>
                            <div class="inspection-area-details">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai[]" class="form-input" value="{{ $inspections->first()->tanggal_selesai->format('Y-m-d') }}" required>
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
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($inspections as $inspection)
                                        <tr>
                                            <td><input type="text" name="item_inspeksi[]" placeholder="Item inspeksi" value="{{ $inspection->item_inspeksi }}" required></td>
                                            <td><textarea name="standar_kebersihan[]" placeholder="Standar kebersihan" required>{{ $inspection->standar_kebersihan }}</textarea></td>
                                            <td><textarea name="hasil_pemeriksaan[]" placeholder="Hasil pemeriksaan" required>{{ $inspection->hasil_pemeriksaan }}</textarea></td>
                                            <td><input type="text" name="status[]" placeholder="Status" value="{{ $inspection->status }}" required></td>
                                            <td>
                                                <select name="ok_ng[]" required>
                                                    <option value="OK" {{ $inspection->ok_ng == 'OK' ? 'selected' : '' }}>OK</option>
                                                    <option value="NG" {{ $inspection->ok_ng == 'NG' ? 'selected' : '' }}>NG</option>
                                                </select>
                                            </td>
                                            <td><textarea name="tindakan_korektif[]" placeholder="Tindakan korektif" required>{{ $inspection->tindakan_korektif }}</textarea></td>
                                            <td>
                                                <button type="button" class="btn-remove-inspection-row btn btn-sm btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary btn-sm btn-add-inspection-row">Tambah Baris</button>
                                <input type="hidden" name="area_inspeksi[]" class="area-name-input" value="{{ $areaName }}">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="submit-section">
                    <button type="submit" id="submitBtn" class="btn btn-submit">
                        <span class="btn-text">
                            <i class="fas fa-save"></i> Update JSA
                        </span>
                        <span class="loading">
                            <i class="fas fa-spinner fa-spin"></i> Menyimpan...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Template for Work Step -->
    <template id="workStepTemplate">
        <div class="work-step-item">
            <div class="work-step-header">
                <div class="work-step-title">
                    <span class="step-number">1</span>
                    <span class="step-text">Urutan Pekerjaan</span>
                </div>
                <div class="work-step-actions">
                    <button type="button" class="btn btn-secondary btn-sm btn-toggle-hazards">Buka Analisis</button>
                    <button type="button" class="btn btn-danger btn-sm btn-remove-step">Hapus</button>
                </div>
            </div>
            <div class="work-step-details">
                <div class="form-group">
                    <label class="form-label">Potensi Bahaya</label>
                    <textarea name="potensi_bahaya[]" class="form-input form-textarea" placeholder="Masukkan potensi bahaya" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Upaya Pengendalian</label>
                    <textarea name="upaya_pengendalian[]" class="form-input form-textarea" placeholder="Masukkan upaya pengendalian" required></textarea>
                </div>
            </div>
            <input type="hidden" name="urutan_pekerjaan[]" class="step-description-input" value="">
        </div>
    </template>

    <!-- Template for Inspection Area -->
    <template id="inspectionAreaTemplate">
        <div class="inspection-area-item">
            <div class="inspection-area-header">
                <div class="inspection-area-title">
                    <span class="area-number">1</span>
                    <span class="area-text">Area Inspeksi</span>
                </div>
                <div class="inspection-area-actions">
                    <button type="button" class="btn btn-secondary btn-sm btn-toggle-inspection">Buka Tabel</button>
                    <button type="button" class="btn btn-danger btn-sm btn-remove-area">Hapus</button>
                </div>
            </div>
            <div class="inspection-area-details">
                <div class="form-group">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai[]" class="form-input" required>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text" name="item_inspeksi[]" placeholder="Item inspeksi" required></td>
                            <td><textarea name="standar_kebersihan[]" placeholder="Standar kebersihan" required></textarea></td>
                            <td><textarea name="hasil_pemeriksaan[]" placeholder="Hasil pemeriksaan" required></textarea></td>
                            <td><input type="text" name="status[]" placeholder="Status" required></td>
                            <td>
                                <select name="ok_ng[]" required>
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                </select>
                            </td>
                            <td><textarea name="tindakan_korektif[]" placeholder="Tindakan korektif" required></textarea></td>
                            <td>
                                <button type="button" class="btn-remove-inspection-row btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary btn-sm btn-add-inspection-row">Tambah Baris</button>
                <input type="hidden" name="area_inspeksi[]" class="area-name-input" value="">
            </div>
        </div>
    </template>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize counters
            let workStepCounter = document.querySelectorAll('.work-step-item').length;
            let inspectionAreaCounter = document.querySelectorAll('.inspection-area-item').length;

            // Get DOM elements
            const workStepInput = document.getElementById('workStepInput');
            const addWorkStepBtn = document.getElementById('addWorkStep');
            const workStepsList = document.getElementById('workStepsList');
            const workStepTemplate = document.getElementById('workStepTemplate');

            const inspectionAreaInput = document.getElementById('inspectionAreaInput');
            const addInspectionAreaBtn = document.getElementById('addInspectionArea');
            const inspectionAreasList = document.getElementById('inspectionAreasList');
            const inspectionAreaTemplate = document.getElementById('inspectionAreaTemplate');

            // Add Work Step functionality
            addWorkStepBtn.addEventListener('click', addWorkStep);
            workStepInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addWorkStep();
                }
            });

            function addWorkStep() {
                const stepText = workStepInput.value.trim();
                if (!stepText) {
                    alert('Masukkan urutan pekerjaan terlebih dahulu!');
                    return;
                }

                workStepCounter++;
                
                // Clone template
                const workStepItem = workStepTemplate.content.cloneNode(true);
                const workStepDiv = workStepItem.querySelector('.work-step-item');
                
                // Set data attributes and content
                workStepDiv.setAttribute('data-step-id', workStepCounter);
                workStepDiv.querySelector('.step-number').textContent = workStepCounter;
                workStepDiv.querySelector('.step-text').textContent = stepText;
                
                // Set hidden input value untuk deskripsi urutan pekerjaan
                workStepDiv.querySelector('.step-description-input').value = stepText;
                
                // Add event listeners
                const toggleBtn = workStepDiv.querySelector('.btn-toggle-hazards');
                const removeBtn = workStepDiv.querySelector('.btn-remove-step');
                const detailsDiv = workStepDiv.querySelector('.work-step-details');
                
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isVisible = detailsDiv.style.display !== 'none';
                    
                    if (isVisible) {
                        detailsDiv.style.display = 'none';
                        toggleBtn.textContent = 'Buka Analisis';
                        toggleBtn.classList.remove('btn-primary');
                        toggleBtn.classList.add('btn-secondary');
                    } else {
                        detailsDiv.style.display = 'grid';
                        toggleBtn.textContent = 'Tutup Analisis';
                        toggleBtn.classList.remove('btn-secondary');
                        toggleBtn.classList.add('btn-primary');
                    }
                });
                
                removeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (confirm('Yakin ingin menghapus urutan pekerjaan ini?')) {
                        workStepDiv.remove();
                        reorderStepNumbers();
                    }
                });
                
                // Add to list
                workStepsList.appendChild(workStepDiv);
                
                // Clear input
                workStepInput.value = '';
                workStepInput.focus();
            }

            // Add Inspection Area functionality
            addInspectionAreaBtn.addEventListener('click', addInspectionArea);
            inspectionAreaInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addInspectionArea();
                }
            });

            function addInspectionArea() {
                const areaText = inspectionAreaInput.value.trim();
                if (!areaText) {
                    alert('Masukkan area inspeksi terlebih dahulu!');
                    return;
                }

                inspectionAreaCounter++;
                
                // Clone template
                const inspectionAreaItem = inspectionAreaTemplate.content.cloneNode(true);
                const inspectionAreaDiv = inspectionAreaItem.querySelector('.inspection-area-item');
                
                // Set data attributes and content
                inspectionAreaDiv.setAttribute('data-area-id', inspectionAreaCounter);
                inspectionAreaDiv.querySelector('.area-number').textContent = inspectionAreaCounter;
                inspectionAreaDiv.querySelector('.area-text').textContent = areaText;
                
                // Set hidden input value untuk nama area inspeksi
                inspectionAreaDiv.querySelector('.area-name-input').value = areaText;
                
                // Add event listeners
                const toggleBtn = inspectionAreaDiv.querySelector('.btn-toggle-inspection');
                const removeBtn = inspectionAreaDiv.querySelector('.btn-remove-area');
                const detailsDiv = inspectionAreaDiv.querySelector('.inspection-area-details');
                const addRowBtn = inspectionAreaDiv.querySelector('.btn-add-inspection-row');
                
                toggleBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isVisible = detailsDiv.style.display !== 'none';
                    
                    if (isVisible) {
                        detailsDiv.style.display = 'none';
                        toggleBtn.textContent = 'Buka Tabel';
                        toggleBtn.classList.remove('btn-primary');
                        toggleBtn.classList.add('btn-secondary');
                    } else {
                        detailsDiv.style.display = 'block';
                        toggleBtn.textContent = 'Tutup Tabel';
                        toggleBtn.classList.remove('btn-secondary');
                        toggleBtn.classList.add('btn-primary');
                    }
                });
                
                removeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    if (confirm('Yakin ingin menghapus area inspeksi ini?')) {
                        inspectionAreaDiv.remove();
                        reorderAreaNumbers();
                    }
                });
                
                addRowBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    addInspectionRow(inspectionAreaDiv);
                });
                
                // Add to list
                inspectionAreasList.appendChild(inspectionAreaDiv);
                
                // Clear input
                inspectionAreaInput.value = '';
                inspectionAreaInput.focus();
            }

            function addInspectionRow(areaDiv) {
                const tbody = areaDiv.querySelector('tbody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td><input type="text" name="item_inspeksi[]" placeholder="Item inspeksi" required></td>
                    <td><textarea name="standar_kebersihan[]" placeholder="Standar kebersihan" required></textarea></td>
                    <td><textarea name="hasil_pemeriksaan[]" placeholder="Hasil pemeriksaan" required></textarea></td>
                    <td><input type="text" name="status[]" placeholder="Status" required></td>
                    <td>
                        <select name="ok_ng[]" required>
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        </select>
                    </td>
                    <td><textarea name="tindakan_korektif[]" placeholder="Tindakan korektif" required></textarea></td>
                    <td>
                        <button type="button" class="btn-remove-inspection-row btn btn-sm btn-danger">Hapus</button>
                    </td>
                `;
                tbody.appendChild(newRow);
            }

            function reorderStepNumbers() {
                const workSteps = workStepsList.querySelectorAll('.work-step-item');
                workSteps.forEach((step, index) => {
                    const stepNumber = step.querySelector('.step-number');
                    stepNumber.textContent = index + 1;
                    step.setAttribute('data-step-id', index + 1);
                });
                workStepCounter = workSteps.length;
            }

            function reorderAreaNumbers() {
                const inspectionAreas = inspectionAreasList.querySelectorAll('.inspection-area-item');
                inspectionAreas.forEach((area, index) => {
                    const areaNumber = area.querySelector('.area-number');
                    areaNumber.textContent = index + 1;
                    area.setAttribute('data-area-id', index + 1);
                });
                inspectionAreaCounter = inspectionAreas.length;
            }

            // Initialize existing work steps and inspection areas
            document.querySelectorAll('.work-step-item').forEach(workStep => {
                const toggleBtn = workStep.querySelector('.btn-toggle-hazards');
                const removeBtn = workStep.querySelector('.btn-remove-step');
                const detailsDiv = workStep.querySelector('.work-step-details');
                
                if (toggleBtn) {
                    toggleBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const isVisible = detailsDiv.style.display !== 'none';
                        
                        if (isVisible) {
                            detailsDiv.style.display = 'none';
                            toggleBtn.textContent = 'Buka Analisis';
                            toggleBtn.classList.remove('btn-primary');
                            toggleBtn.classList.add('btn-secondary');
                        } else {
                            detailsDiv.style.display = 'grid';
                            toggleBtn.textContent = 'Tutup Analisis';
                            toggleBtn.classList.remove('btn-secondary');
                            toggleBtn.classList.add('btn-primary');
                        }
                    });
                }
                
                if (removeBtn) {
                    removeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        if (confirm('Yakin ingin menghapus urutan pekerjaan ini?')) {
                            workStep.remove();
                            reorderStepNumbers();
                        }
                    });
                }
            });

            document.querySelectorAll('.inspection-area-item').forEach(area => {
                const toggleBtn = area.querySelector('.btn-toggle-inspection');
                const removeBtn = area.querySelector('.btn-remove-area');
                const detailsDiv = area.querySelector('.inspection-area-details');
                const addRowBtn = area.querySelector('.btn-add-inspection-row');
                
                if (toggleBtn) {
                    toggleBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const isVisible = detailsDiv.style.display !== 'none';
                        
                        if (isVisible) {
                            detailsDiv.style.display = 'none';
                            toggleBtn.textContent = 'Buka Tabel';
                            toggleBtn.classList.remove('btn-primary');
                            toggleBtn.classList.add('btn-secondary');
                        } else {
                            detailsDiv.style.display = 'block';
                            toggleBtn.textContent = 'Tutup Tabel';
                            toggleBtn.classList.remove('btn-secondary');
                            toggleBtn.classList.add('btn-primary');
                        }
                    });
                }
                
                if (removeBtn) {
                    removeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        if (confirm('Yakin ingin menghapus area inspeksi ini?')) {
                            area.remove();
                            reorderAreaNumbers();
                        }
                    });
                }
                
                if (addRowBtn) {
                    addRowBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        addInspectionRow(area);
                    });
                }
            });

            // Global event delegation for remove inspection row buttons
            document.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btn-remove-inspection-row')) {
                    e.preventDefault();
                    e.stopPropagation();
                    if (confirm('Yakin ingin menghapus item inspeksi ini?')) {
                        const row = e.target.closest('tr');
                        const areaDiv = row.closest('.inspection-area-item');
                        const tbody = areaDiv.querySelector('tbody');
                        
                        // Hapus baris
                        row.remove();
                        
                        // Cek apakah masih ada item inspeksi di area ini
                        const remainingRows = tbody.querySelectorAll('tr');
                        if (remainingRows.length === 0) {
                            // Jika tidak ada item lagi, hapus area inspeksi
                            if (confirm('Semua item inspeksi telah dihapus. Hapus area inspeksi ini juga?')) {
                                areaDiv.remove();
                                reorderAreaNumbers();
                            } else {
                                // Jika user tidak ingin menghapus area, tambahkan kembali satu baris kosong
                                addInspectionRow(areaDiv);
                            }
                        }
                    }
                                 }
             });

             // Form validation
             const form = document.getElementById('jsaForm');
             form.addEventListener('submit', function(e) {
                 e.preventDefault();
                 console.log('Form submission started...');

                 // Check basic required fields
                 const requiredFields = [
                     'semester', 'matakuliah', 'kelas', 'nama_pekerjaan', 
                     'lokasi_pekerjaan', 'tanggal_pelaksanaan', 'no_jsa', 'dosen_pembimbing'
                 ];

                 for (const fieldName of requiredFields) {
                     const input = document.querySelector(`[name="${fieldName}"]`);
                     console.log(`Checking field: ${fieldName} = "${input ? input.value : 'NOT FOUND'}"`);
                     
                     if (!input || !input.value.trim()) {
                         alert(`Field ${fieldName} harus diisi!`);
                         if (input) input.focus();
                         return;
                     }
                 }

                 // Check work steps
                 const workSteps = document.querySelectorAll('.work-step-item');
                 console.log(`Found ${workSteps.length} work steps`);
                 if (workSteps.length === 0) {
                     alert('Minimal harus ada satu urutan pekerjaan!');
                     const workStepInput = document.getElementById('workStepInput');
                     if (workStepInput) workStepInput.focus();
                     return;
                 }

                 // Check each work step has hazards and controls filled
                 let allHazardsFilled = true;
                 let incompleteStep = null;

                 workSteps.forEach((step, index) => {
                     const hazardsTextarea = step.querySelector('textarea[name="potensi_bahaya[]"]');
                     const controlsTextarea = step.querySelector('textarea[name="upaya_pengendalian[]"]');
                     
                     console.log(`Work step ${index + 1}: hazards=${hazardsTextarea ? hazardsTextarea.value.trim() : 'NOT FOUND'}, controls=${controlsTextarea ? controlsTextarea.value.trim() : 'NOT FOUND'}`);
                     
                     if (!hazardsTextarea || !controlsTextarea || !hazardsTextarea.value.trim() || !controlsTextarea.value.trim()) {
                         allHazardsFilled = false;
                         if (!incompleteStep) {
                             incompleteStep = step;
                         }
                     }
                 });

                 if (!allHazardsFilled) {
                     alert('Semua urutan pekerjaan harus memiliki potensi bahaya dan upaya pengendalian yang diisi!');
                     if (incompleteStep) {
                         const toggleBtn = incompleteStep.querySelector('.btn-toggle-hazards');
                         if (toggleBtn) {
                             toggleBtn.click();
                         }
                     }
                     return;
                 }

                 // Check inspection areas
                 const inspectionAreas = document.querySelectorAll('.inspection-area-item');
                 console.log(`Found ${inspectionAreas.length} inspection areas`);
                 if (inspectionAreas.length === 0) {
                     alert('Minimal harus ada satu area inspeksi!');
                     const inspectionAreaInput = document.getElementById('inspectionAreaInput');
                     if (inspectionAreaInput) inspectionAreaInput.focus();
                     return;
                 }

                 // Check each inspection area has items and tanggal selesai
                 let allAreasValid = true;
                 let incompleteArea = null;

                 inspectionAreas.forEach((area, index) => {
                     const items = area.querySelectorAll('tbody tr');
                     const tanggalSelesai = area.querySelector('input[name="tanggal_selesai[]"]');
                     
                     console.log(`Area ${index + 1}: Found ${items.length} items, tanggalSelesai: ${tanggalSelesai ? 'found' : 'not found'}`);
                     
                     const hasItems = items.length > 0;
                     const hasTanggal = tanggalSelesai && tanggalSelesai.value.trim() !== '';
                     
                     console.log(`Area ${index + 1}: hasItems=${hasItems}, hasTanggal=${hasTanggal}`);
                     
                     if (!hasItems || !hasTanggal) {
                         allAreasValid = false;
                         if (!incompleteArea) {
                             incompleteArea = area;
                         }
                     }
                 });

                 if (!allAreasValid) {
                     alert('Semua area inspeksi harus memiliki tanggal selesai dan minimal satu item inspeksi!');
                     if (incompleteArea) {
                         const toggleBtn = incompleteArea.querySelector('.btn-toggle-inspection');
                         if (toggleBtn) {
                             toggleBtn.click();
                         }
                     }
                     return;
                 }

                 console.log('All validations passed! Submitting form...');

                 // If all validations pass, submit the form
                 const btn = document.getElementById('submitBtn');
                 if (btn) {
                     const btnText = btn.querySelector('.btn-text');
                     const loading = btn.querySelector('.loading');
                     
                     if (btnText) btnText.style.display = 'none';
                     if (loading) loading.style.display = 'block';
                     btn.disabled = true;
                 }

                 console.log('Submitting form to server...');
                 // Submit the form
                 form.submit();
             });
         });