{{-- resources/views/mahasiswa/detailjsa.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail JSA</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6,9 12,15 18,9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .form-select:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .form-select:focus {
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Override browser default styling untuk options */
        .form-select option {
            background-color: #667eea !important;
            color: white !important;
            padding: 12px 16px !important;
            border: none !important;
            font-size: 14px !important;
            border-radius: 8px !important;
            margin: 2px 0 !important;
        }

        .form-select option:hover {
            background-color: #764ba2 !important;
            color: white !important;
        }

        .form-select option:checked {
            background-color: #667eea !important;
            color: white !important;
            font-weight: bold !important;
        }

        .form-select option:selected {
            background-color: #667eea !important;
            color: white !important;
            font-weight: bold !important;
        }

        /* Styling untuk dropdown container */
        .form-select:focus {
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.2);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        /* Firefox specific styling */
        .form-select:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 white;
        }

        .form-select:-moz-focusring option {
            background-color: #667eea !important;
            color: white !important;
        }

        /* Webkit specific styling */
        .form-select::-webkit-select-placeholder {
            color: white;
        }

        /* IE/Edge specific styling */
        .form-select::-ms-expand {
            display: none;
        }

        .form-select::-ms-value {
            background-color: #667eea !important;
            color: white !important;
        }

        /* Additional styling untuk memastikan options tidak putih */
        .form-select option[value] {
            background-color: #667eea !important;
            color: white !important;
        }

        .form-select option[value]:hover {
            background-color: #764ba2 !important;
            color: white !important;
        }

        .form-select option[value]:checked {
            background-color: #667eea !important;
            color: white !important;
            font-weight: bold !important;
        }

        /* Custom dropdown arrow for Firefox */
        .form-select::-ms-expand {
            display: none;
        }

        /* Custom scrollbar untuk dropdown */
        .form-select::-webkit-scrollbar {
            width: 8px;
        }

        .form-select::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        .form-select::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 4px;
        }

        .form-select::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #764ba2, #667eea);
        }

        /* Mahasiswa & Dosen Search Section */
        .mahasiswa-search-container,
        .dosen-selection-container {
            margin-bottom: 20px;
        }

        .search-input-group {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .search-input-group .form-input {
            flex: 1;
        }

        .search-results {
            max-height: 300px;
            overflow-y: auto;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            display: none;
        }

        .search-results.show {
            display: block;
        }

        .search-result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-result-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-info {
            flex: 1;
        }

        .search-result-nim {
            font-weight: 600;
            color: white;
            font-size: 0.9rem;
        }

        .search-result-nama {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
        }

        .search-result-action {
            margin-left: 10px;
        }

        .selected-mahasiswa-container,
        .selected-dosen-container {
            margin-top: 20px;
        }

        .selected-title {
            color: white;
            font-size: 1rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .selected-mahasiswa-list,
        .selected-dosen-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .selected-mahasiswa-item,
        .selected-dosen-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .selected-mahasiswa-item:hover,
        .selected-dosen-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .selected-mahasiswa-info {
            flex: 1;
        }

        .selected-mahasiswa-nim {
            font-weight: 600;
            color: white;
            font-size: 0.9rem;
        }

        .selected-mahasiswa-nama {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
        }

        .remove-mahasiswa-btn {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-mahasiswa-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        }

        .selected-mahasiswa-item.owner {
            background: rgba(39, 174, 96, 0.1);
            border-color: rgba(39, 174, 96, 0.3);
        }

        .selected-mahasiswa-item.owner .selected-mahasiswa-nim {
            color: #27ae60;
        }

        .remove-mahasiswa-btn.disabled {
            background: rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.5);
            cursor: not-allowed;
        }

        .remove-mahasiswa-btn.disabled:hover {
            transform: none;
            box-shadow: none;
        }

        .info-text {
            margin-top: 10px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
            border-left: 3px solid #27ae60;
        }

        .jsa-preview-container {
            position: relative;
        }

        .jsa-preview-container .form-input[readonly] {
            background-color: #f8f9fa !important;
            color: #6c757d !important;
            border: 1px solid #dee2e6;
            cursor: not-allowed;
        }

        .jsa-preview-container .form-text {
            margin-top: 5px;
            font-size: 0.85rem;
        }

        /* Dosen selection styles */
        .selected-dosen-container {
            margin-top: 20px;
        }

        .selected-dosen-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .selected-dosen-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .selected-dosen-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .selected-dosen-info {
            flex: 1;
        }

        .selected-dosen-nip {
            font-weight: 600;
            color: white;
            font-size: 0.9rem;
        }

        .selected-dosen-nama {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
        }

        .remove-dosen-btn {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-dosen-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        }

        .no-results {
            padding: 20px;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-style: italic;
        }

        /* PPE Container */
        .ppe-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* PPE Section */
        .ppe-section {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .ppe-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .ppe-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
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
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .work-step-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
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
            font-weight: 500;
            color: white;
        }

        .work-step-actions {
            display: flex;
            gap: 10px;
        }

        .work-step-details {
            display: none;
            gap: 20px;
        }

        .work-step-details.show {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* Inspection Areas Section */
        .inspection-areas-input {
            margin-bottom: 20px;
        }

        .inspection-areas-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .inspection-area-item {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
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
            font-weight: 500;
            color: white;
        }

        .inspection-area-actions {
            display: flex;
            gap: 10px;
        }

        .inspection-area-details {
            display: none;
        }

        .inspection-area-details.show {
            display: block;
        }

        .inspection-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
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
        }

        .inspection-table td {
            color: white;
        }

        .inspection-table input,
        .inspection-table textarea,
        .inspection-table select {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 0.9rem;
        }

        .inspection-table textarea {
            resize: vertical;
            min-height: 60px;
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
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            z-index: 10;
            pointer-events: auto;
        }

        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .btn-danger {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
        }

        .btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
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
            <h1>Detail / Edit JSA</h1>
            <p>Perbarui data Job Safety Analysis Anda</p>
    </div>

        <!-- Form Container -->
        <div class="form-container">
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <h5><i class="fas fa-exclamation-triangle"></i> Terdapat kesalahan dalam form:</h5>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <div class="mt-3">
                        <small class="text-muted">
                            <i class="fas fa-info-circle"></i> 
                            Silakan perbaiki kesalahan di atas, kemudian klik "Update JSA" lagi.
                        </small>
                    </div>
                </div>
            @endif
            
            <form id="jsaForm" method="POST" action="{{ route('mahasiswa.jsa.update', $jsa->id) }}">
                @csrf
                @method('PUT')
                
                <!-- Hidden fields to preserve data -->
                <input type="hidden" name="preserve_data" value="1">
                
                <!-- Basic Information Section -->
                <div class="form-section">
                    <h2 class="section-title">Informasi Dasar</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="semester">Semester</label>
                            <select id="semester" name="semester" class="form-select" required>
                                <option value="">Pilih Semester</option>
                                <option value="1" {{ old('semester', $jsa->prodi) == '1' ? 'selected' : '' }}>Semester Ganjil (1)</option>
                                <option value="2" {{ old('semester', $jsa->prodi) == '2' ? 'selected' : '' }}>Semester Genap (2)</option>
                                <option value="3" {{ old('semester', $jsa->prodi) == '3' ? 'selected' : '' }}>Semester Ganjil (3)</option>
                                <option value="4" {{ old('semester', $jsa->prodi) == '4' ? 'selected' : '' }}>Semester Genap (4)</option>
                                <option value="6" {{ old('semester', $jsa->prodi) == '6' ? 'selected' : '' }}>Semester Genap (6)</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="kelas">Kelas</label>
                            <select id="kelas" name="kelas" class="form-select" required>
                                <option value="">Pilih Kelas</option>
                                @php
                                    $currentSemester = old('semester', $jsa->prodi);
                                    $currentKelas = old('kelas', $jsa->kelas);
                                    
                                    // Debug: tampilkan nilai untuk debugging
                                    // echo "<!-- Debug: Semester=$currentSemester, Kelas=$currentKelas -->";
                                    
                                    // Tampilkan kelas berdasarkan semester yang dipilih
                                    if ($currentSemester == '1' || $currentSemester == '2') {
                                        echo '<option value="1"' . ($currentKelas == '1' ? ' selected' : '') . '>Kelas 1</option>';
                                    } elseif ($currentSemester == '3' || $currentSemester == '4') {
                                        echo '<option value="2"' . ($currentKelas == '2' ? ' selected' : '') . '>Kelas 2</option>';
                                    } elseif ($currentSemester == '6') {
                                        echo '<option value="3"' . ($currentKelas == '3' ? ' selected' : '') . '>Kelas 3</option>';
                                    } else {
                                        // Jika semester belum dipilih, tampilkan semua kelas dengan selected yang sesuai
                                        echo '<option value="1"' . ($currentKelas == '1' ? ' selected' : '') . '>Kelas 1</option>';
                                        echo '<option value="2"' . ($currentKelas == '2' ? ' selected' : '') . '>Kelas 2</option>';
                                        echo '<option value="3"' . ($currentKelas == '3' ? ' selected' : '') . '>Kelas 3</option>';
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="matakuliah">Mata Kuliah</label>
                            <select id="matakuliah" name="matakuliah" class="form-select" required>
                                <option value="">Pilih Mata Kuliah</option>
                                @php
                                    $currentMatakuliah = old('matakuliah', $jsa->matakuliah);
                                    if ($currentMatakuliah) {
                                        echo '<option value="' . htmlspecialchars($currentMatakuliah) . '" selected>' . htmlspecialchars($currentMatakuliah) . '</option>';
                                    }
                                @endphp
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Pekerjaan</label>
                            <input type="text" name="nama_pekerjaan" class="form-input" placeholder="Masukkan nama pekerjaan" value="{{ old('nama_pekerjaan', $jsa->nama_pekerjaan) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi_pekerjaan" class="form-input" placeholder="Masukkan lokasi pekerjaan" value="{{ old('lokasi_pekerjaan', $jsa->lokasi_pekerjaan) }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tanggal Pekerjaan</label>
                            <input type="date" name="tanggal_pelaksanaan" class="form-input" value="{{ old('tanggal_pelaksanaan', optional($jsa->tanggal_pelaksanaan)->format('Y-m-d')) }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group jsa-preview-container">
                            <label class="form-label">Nomor JSA (Preview)</label>
                            <input type="text" class="form-input" value="{{ $jsa->no_jsa }}" readonly style="background-color: #f8f9fa; color: #6c757d;">
                            <small class="form-text" style="color: rgba(255, 255, 255, 0.7);">
                                <i class="fas fa-info-circle"></i> Nomor JSA akan dibuat otomatis setelah semua data terisi
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Supervisor Selection Section -->
                <div class="form-section">
                    <h2 class="section-title">Pemilihan Dosen Pembimbing</h2>
                    <div class="form-group">
                        <label class="form-label">Cari dan Pilih Dosen Pembimbing</label>
                        <div class="dosen-selection-container">
                            <div class="search-input-group">
                                <input type="text" id="dosenSearch" class="form-input" placeholder="Cari dosen (NIP atau nama)...">
                                <button type="button" id="searchDosen" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div id="dosenSearchResults" class="search-results"></div>
                            
                            <div class="selected-dosen-container">
                                <h4 class="selected-title">Dosen Pembimbing yang Dipilih:</h4>
                                <div id="selectedDosens" class="selected-dosen-list">
                                    <!-- Dosen yang dipilih akan muncul di sini -->
                                </div>
                            </div>
                            
                            <!-- Hidden inputs untuk form submission -->
                            <div id="dosenInputs"></div>
                        </div>
                    </div>
                </div>

                <!-- Mahasiswa Selection Section -->
                <div class="form-section">
                    <h2 class="section-title">Pemilihan Mahasiswa</h2>
                    <div class="form-group">
                        <label class="form-label">Cari dan Pilih Mahasiswa yang Terlibat</label>
                        <div class="mahasiswa-search-container">
                            <div class="search-input-group">
                                <input type="text" id="mahasiswaSearch" class="form-input" placeholder="Cari mahasiswa berdasarkan NIM atau nama...">
                                <button type="button" id="searchMahasiswa" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div id="searchResults" class="search-results"></div>
                        </div>
                        <div class="selected-mahasiswa-container">
                            <h4 class="selected-title">Mahasiswa yang Dipilih:</h4>
                            <div id="selectedMahasiswaList" class="selected-mahasiswa-list">
                                <!-- Selected mahasiswa will be displayed here -->
                            </div>
                            <div class="info-text">
                                <small style="color: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-info-circle"></i> 
                                    Anda (mahasiswa yang sedang login) otomatis terpilih dan tidak dapat dihapus
                                </small>
                            </div>
                        </div>
                        
                        <!-- Hidden input untuk mahasiswa yang sedang login -->
                        <input type="hidden" id="currentMahasiswaId" value="{{ $currentMahasiswa->id }}">
                        <input type="hidden" id="currentMahasiswaNim" value="{{ $currentMahasiswa->nim }}">
                        <input type="hidden" id="currentMahasiswaNama" value="{{ $currentMahasiswa->nama }}">
                    </div>
                </div>

                <!-- PPE Completeness Section -->
                <div class="form-section">
                    <h2 class="section-title">Kelengkapan APD per Mahasiswa</h2>
                    
                    <!-- Debug Info -->

                    
                    <div class="ppe-container" id="ppeContainer">
                        @foreach($jsa->mahasiswas as $mahasiswa)
                            @php $apd = $jsa->apds->where('id_mhs', $mahasiswa->id)->first(); @endphp
                            <div class="ppe-section" data-mahasiswa-id="{{ $mahasiswa->id }}">
                                <div class="ppe-header">
                                    <div class="ppe-title">APD untuk {{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</div>
                                    <button type="button" class="btn btn-danger btn-sm btn-remove-ppe">Hapus</button>
                                </div>
                                <div class="ppe-grid">
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_shelmet[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_shelmet == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Safety Helmet
                                        </label>
                                    </div>
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_sgloves[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_sgloves == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Safety Gloves
                                        </label>
                                    </div>
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_shoes[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_shoes == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Safety Shoes
                                        </label>
                                    </div>
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_sglasses[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_sglasses == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Safety Glasses
                                        </label>
                                    </div>
                                </div>
                                <div class="ppe-grid-bottom">
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_svest[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_svest == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Safety Vest
                                        </label>
                                    </div>
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_earplug[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_earplug == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Earplug
                                        </label>
                                    </div>
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_fmask[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_fmask == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Face Mask
                                        </label>
                                    </div>
                                    <div class="ppe-item">
                                        <label class="ppe-checkbox-label">
                                            <input type="checkbox" name="apd_respiratory[]" class="ppe-checkbox" data-mahasiswa-id="{{ $mahasiswa->id }}"
                                                   {{ $apd && $apd->apd_respiratory == 'Ada' ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            Respiratory Protection
                                        </label>
                                    </div>
                                </div>
                                <input type="hidden" name="mahasiswa_ids[]" class="mahasiswa-id-input" value="{{ $mahasiswa->id }}">
                            </div>
                        @endforeach
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
                                    <button type="button" class="btn btn-primary btn-sm btn-toggle-hazards">Tutup Analisis</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-remove-step">Hapus</button>
                                </div>
                            </div>
                            <div class="work-step-details show">
                                <div class="form-group">
                                    <label class="form-label">Potensi Bahaya</label>
                                    <textarea name="potensi_bahaya[]" class="form-input form-textarea" placeholder="Masukkan potensi bahaya">{{ old('potensi_bahaya.' . $index, $workStep->potensi_bahaya) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Upaya Pengendalian</label>
                                    <textarea name="upaya_pengendalian[]" class="form-input form-textarea" placeholder="Masukkan upaya pengendalian">{{ old('upaya_pengendalian.' . $index, $workStep->upaya_pengendalian) }}</textarea>
                                </div>
                            </div>
                            <input type="hidden" name="urutan_pekerjaan[]" class="step-description-input" value="{{ old('urutan_pekerjaan.' . $index, $workStep->step_description) }}">
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
                                    <button type="button" class="btn btn-primary btn-sm btn-toggle-inspection">Tutup Tabel</button>
                                    <button type="button" class="btn btn-danger btn-sm btn-remove-area">Hapus</button>
                                </div>
                            </div>
                            <div class="inspection-area-details show">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai[]" class="form-input" value="{{ old('tanggal_selesai.' . $loop->index, $inspections->first()->tanggal_selesai->format('Y-m-d')) }}">
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
                                            <td><input type="text" name="item_inspeksi[]" placeholder="Item inspeksi" value="{{ old('item_inspeksi.' . $loop->index, $inspection->item_inspeksi) }}"></td>
                                            <td><textarea name="standar_kebersihan[]" placeholder="Standar kebersihan">{{ old('standar_kebersihan.' . $loop->index, $inspection->standar_kebersihan) }}</textarea></td>
                                            <td><textarea name="hasil_pemeriksaan[]" placeholder="Hasil pemeriksaan">{{ old('hasil_pemeriksaan.' . $loop->index, $inspection->hasil_pemeriksaan) }}</textarea></td>
                                            <td><input type="text" name="status[]" placeholder="Status" value="{{ old('status.' . $loop->index, $inspection->status) }}"></td>
                                            <td>
                                                <select name="ok_ng[]">
                                                    <option value="OK" {{ old('ok_ng.' . $loop->index, $inspection->ok_ng) == 'OK' ? 'selected' : '' }}>OK</option>
                                                    <option value="NG" {{ old('ok_ng.' . $loop->index, $inspection->ok_ng) == 'NG' ? 'selected' : '' }}>NG</option>
                                                </select>
                                            </td>
                                            <td><textarea name="tindakan_korektif[]" placeholder="Tindakan korektif">{{ old('tindakan_korektif.' . $loop->index, $inspection->tindakan_korektif) }}</textarea></td>
                                            <td>
                                                <button type="button" class="btn-remove-inspection-row btn btn-sm btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="btn btn-primary btn-sm btn-add-inspection-row">Tambah Baris</button>
                                <input type="hidden" name="area_inspeksi[]" class="area-name-input" value="{{ old('area_inspeksi.' . $loop->index, $areaName) }}">
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

    <!-- Template for APD per Mahasiswa -->
    <template id="ppeTemplate">
        <div class="ppe-section" data-mahasiswa-id="">
            <div class="ppe-header">
                <div class="ppe-title"></div>
                <button type="button" class="btn btn-danger btn-sm btn-remove-ppe">Hapus</button>
            </div>
            <div class="ppe-grid">
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_shelmet[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Safety Helmet
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_sgloves[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Safety Gloves
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_shoes[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Safety Shoes
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_sglasses[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Safety Glasses
                    </label>
                </div>
            </div>
            <div class="ppe-grid-bottom">
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_svest[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Safety Vest
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_earplug[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Earplug
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_fmask[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Face Mask
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_respiratory[]" value="Ada" class="ppe-checkbox">
                        <span class="checkmark"></span>
                        Respiratory Protection
                    </label>
                </div>
            </div>
            <input type="hidden" name="mahasiswa_ids[]" class="mahasiswa-id-input">
        </div>
    </template>

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
                    <textarea name="potensi_bahaya[]" class="form-input form-textarea" placeholder="Masukkan potensi bahaya"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label">Upaya Pengendalian</label>
                    <textarea name="upaya_pengendalian[]" class="form-input form-textarea" placeholder="Masukkan upaya pengendalian"></textarea>
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
                    <input type="date" name="tanggal_selesai[]" class="form-input">
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
                            <td><input type="text" name="item_inspeksi[]" placeholder="Item inspeksi"></td>
                            <td><textarea name="standar_kebersihan[]" placeholder="Standar kebersihan"></textarea></td>
                            <td><textarea name="hasil_pemeriksaan[]" placeholder="Hasil pemeriksaan"></textarea></td>
                            <td><input type="text" name="status[]" placeholder="Status"></td>
                            <td>
                                <select name="ok_ng[]">
                                    <option value="OK">OK</option>
                                    <option value="NG">NG</option>
                                </select>
                            </td>
                            <td><textarea name="tindakan_korektif[]" placeholder="Tindakan korektif"></textarea></td>
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
        // Simple global function for adding work steps (sama seperti tambahjsa.blade.php)
        function addWorkStep() {
            const workStepInput = document.getElementById('workStepInput');
            const workStepsList = document.getElementById('workStepsList');
            const workStepTemplate = document.getElementById('workStepTemplate');
            
            const stepText = workStepInput.value.trim();
            if (!stepText) {
                alert('Masukkan urutan pekerjaan terlebih dahulu!');
                return;
            }

            // Get current counter
            const workSteps = workStepsList.querySelectorAll('.work-step-item');
            const workStepCounter = workSteps.length + 1;
            
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
                const isVisible = detailsDiv.classList.contains('show');
                
                if (isVisible) {
                    detailsDiv.classList.remove('show');
                    toggleBtn.textContent = 'Buka Analisis';
                    toggleBtn.classList.remove('btn-primary');
                    toggleBtn.classList.add('btn-secondary');
                } else {
                    detailsDiv.classList.add('show');
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

        // Global function for reordering step numbers
        function reorderStepNumbers() {
            const workStepsList = document.getElementById('workStepsList');
            if (!workStepsList) return;
            
            const workSteps = workStepsList.querySelectorAll('.work-step-item');
            workSteps.forEach((step, index) => {
                const stepNumber = step.querySelector('.step-number');
                if (stepNumber) {
                    stepNumber.textContent = index + 1;
                    step.setAttribute('data-step-id', index + 1);
                }
            });
        }

        // Function to validate form before submission
        function validateForm() {
            const workStepsList = document.getElementById('workStepsList');
            const workSteps = workStepsList.querySelectorAll('.work-step-item');
            
            console.log('Validating form...');
            console.log('Total work steps found:', workSteps.length);
            
            if (workSteps.length === 0) {
                alert('Minimal harus ada satu urutan pekerjaan!');
                return false;
            }
            
            let hasValidWorkStep = false;
            workSteps.forEach((step, index) => {
                const potensiBahaya = step.querySelector('textarea[name="potensi_bahaya[]"]').value.trim();
                const upayaPengendalian = step.querySelector('textarea[name="upaya_pengendalian[]"]').value.trim();
                const urutanPekerjaan = step.querySelector('input[name="urutan_pekerjaan[]"]').value.trim();
                
                console.log(`Work step ${index + 1}:`, {
                    urutan: urutanPekerjaan,
                    potensi: potensiBahaya,
                    upaya: upayaPengendalian
                });
                
                if (!empty(urutanPekerjaan)) {
                    hasValidWorkStep = true;
                }
            });
            
            if (!hasValidWorkStep) {
                alert('Minimal harus ada satu urutan pekerjaan yang diisi!');
                return false;
            }
            
            console.log('Form validation passed');
            return true;
        }

        // Helper function to check if string is empty
        function empty(str) {
            return !str || str.trim() === '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize counters
            let workStepCounter = document.querySelectorAll('.work-step-item').length;
            let inspectionAreaCounter = document.querySelectorAll('.inspection-area-item').length;

            // Get DOM elements
            const workStepInput = document.getElementById('workStepInput');
            const workStepsList = document.getElementById('workStepsList');
            const workStepTemplate = document.getElementById('workStepTemplate');

            const inspectionAreaInput = document.getElementById('inspectionAreaInput');
            const inspectionAreasList = document.getElementById('inspectionAreasList');
            const inspectionAreaTemplate = document.getElementById('inspectionAreaTemplate');

            // Mahasiswa search elements
            const ppeContainer = document.getElementById('ppeContainer');
            const ppeTemplate = document.getElementById('ppeTemplate');
            const mahasiswaSearch = document.getElementById('mahasiswaSearch');
            const searchMahasiswaBtn = document.getElementById('searchMahasiswa');
            const searchResults = document.getElementById('searchResults');
            const selectedMahasiswaList = document.getElementById('selectedMahasiswaList');

            // Store selected mahasiswa data
            const selectedMahasiswa = new Map();

            // Get current mahasiswa data
            const currentMahasiswaId = document.getElementById('currentMahasiswaId').value;
            const currentMahasiswaNim = document.getElementById('currentMahasiswaNim').value;
            const currentMahasiswaNama = document.getElementById('currentMahasiswaNama').value;

            // Dosen search functionality
            const dosenSearch = document.getElementById('dosenSearch');
            const searchDosenBtn = document.getElementById('searchDosen');
            const dosenSearchResults = document.getElementById('dosenSearchResults');
            const selectedDosens = document.getElementById('selectedDosens');

            // Mata kuliah dropdown elements
            const semesterSelect = document.getElementById('semester');
            const kelasSelect = document.getElementById('kelas');
            const matakuliahSelect = document.getElementById('matakuliah');

            // Initialize selected mahasiswa from existing data
            document.querySelectorAll('.ppe-section').forEach(ppeSection => {
                const mahasiswaId = ppeSection.getAttribute('data-mahasiswa-id');
                const mahasiswaLabel = ppeSection.querySelector('.ppe-title').textContent.replace('APD untuk ', '');
                const [nim, nama] = mahasiswaLabel.split(' - ');
                
                selectedMahasiswa.set(mahasiswaId, {
                    id: mahasiswaId,
                    nim: nim,
                    nama: nama,
                    label: mahasiswaLabel,
                    isOwner: mahasiswaId === currentMahasiswaId
                });
            });

            // Initialize selected dosen Map first
            const selectedDosen = new Map();
            
            // Initialize selected dosen from existing data
            @foreach($jsa->dosens as $dosen)
                selectedDosen.set('{{ $dosen->id }}', {
                    id: '{{ $dosen->id }}',
                    nip: '{{ $dosen->nip }}',
                    nama: '{{ $dosen->nama }}',
                    label: '{{ $dosen->nip }} - {{ $dosen->nama }}'
                });
            @endforeach

            // Initialize mata kuliah dropdown functionality
            function initializeMataKuliahDropdown() {
                if (!semesterSelect || !kelasSelect || !matakuliahSelect) return;

                // Remove existing event listeners to prevent duplicates
                semesterSelect.removeEventListener('change', updateKelasOptions);
                kelasSelect.removeEventListener('change', updateMataKuliahOptions);

                // Event listeners for semester and kelas changes
                semesterSelect.addEventListener('change', updateKelasOptions);
                kelasSelect.addEventListener('change', updateMataKuliahOptions);

                // Load initial data from database
                loadInitialData();
            }

            // Function to load initial data from database
            function loadInitialData() {
                const currentSemester = semesterSelect.value;
                const currentKelas = kelasSelect.value;
                const currentMatakuliah = '{{ old("matakuliah", $jsa->matakuliah) }}';

                // If we have semester and kelas data, load mata kuliah
                if (currentSemester && currentKelas) {
                    // Load mata kuliah from API without updating kelas options
                    // (kelas options are already set by PHP in the template)
                    loadMataKuliahFromAPI(currentSemester, currentKelas, currentMatakuliah);
                }
            }

            // Function to load mata kuliah from API
            function loadMataKuliahFromAPI(semester, kelas, selectedMatakuliah) {
                // Show loading
                matakuliahSelect.innerHTML = '<option value="">Memuat mata kuliah...</option>';

                // Fetch mata kuliah from API
                fetch(`/api/mata-kuliah/${semester}/${kelas}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Update mata kuliah options
                        matakuliahSelect.innerHTML = '<option value="">Pilih Mata Kuliah</option>';
                        
                        if (data.length === 0) {
                            matakuliahSelect.innerHTML = '<option value="">Tidak ada mata kuliah tersedia</option>';
                            return;
                        }

                        data.forEach(mataKuliah => {
                            const option = document.createElement('option');
                            option.value = mataKuliah.nama_matakuliah;
                            option.textContent = mataKuliah.nama_matakuliah;
                            
                            // Set selected if it matches the current mata kuliah
                            if (mataKuliah.nama_matakuliah === selectedMatakuliah) {
                                option.selected = true;
                            }
                            
                            matakuliahSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching mata kuliah:', error);
                        matakuliahSelect.innerHTML = '<option value="">Error: Gagal memuat mata kuliah</option>';
                    });
            }

            // Update kelas options based on selected semester
            function updateKelasOptions() {
                const semester = semesterSelect.value;

                // Reset kelas dropdown to empty when semester changes
                kelasSelect.innerHTML = '<option value="">Pilih Kelas</option>';

                // Reset mata kuliah dropdown immediately when semester changes
                matakuliahSelect.innerHTML = '<option value="">Pilih Mata Kuliah</option>';
                
                if (!semester) {
                    return;
                }

                // Define kelas options based on semester
                let kelasOptions = [];
                
                if (semester === '1' || semester === '2') {
                    // Semester 1 dan 2 hanya untuk Kelas 1
                    kelasOptions = [
                        { value: '1', text: 'Kelas 1' }
                    ];
                } else if (semester === '3' || semester === '4') {
                    // Semester 3 dan 4 hanya untuk Kelas 2
                    kelasOptions = [
                        { value: '2', text: 'Kelas 2' }
                    ];
                } else if (semester === '6') {
                    // Semester 6 hanya untuk Kelas 3
                    kelasOptions = [
                        { value: '3', text: 'Kelas 3' }
                    ];
                }

                // Add kelas options to dropdown (always reset, no validation)
                kelasOptions.forEach(kelas => {
                    const option = document.createElement('option');
                    option.value = kelas.value;
                    option.textContent = kelas.text;
                    kelasSelect.appendChild(option);
                });
            }

            // Update mata kuliah options based on selected semester and kelas
            function updateMataKuliahOptions() {
                const semester = semesterSelect.value;
                const kelas = kelasSelect.value;

                // Reset mata kuliah dropdown
                matakuliahSelect.innerHTML = '<option value="">Pilih Mata Kuliah</option>';

                // Jika semester atau kelas belum dipilih, biarkan mata kuliah kosong
                if (!semester || !kelas) {
                    return;
                }

                // Show loading
                matakuliahSelect.innerHTML = '<option value="">Memuat mata kuliah...</option>';

                // Fetch mata kuliah from API
                fetch(`/api/mata-kuliah/${semester}/${kelas}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Update mata kuliah options
                        matakuliahSelect.innerHTML = '<option value="">Pilih Mata Kuliah</option>';
                        
                        if (data.length === 0) {
                            matakuliahSelect.innerHTML = '<option value="">Tidak ada mata kuliah tersedia</option>';
                            return;
                        }

                        data.forEach(mataKuliah => {
                            const option = document.createElement('option');
                            option.value = mataKuliah.nama_matakuliah;
                            option.textContent = mataKuliah.nama_matakuliah;
                            matakuliahSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching mata kuliah:', error);
                        matakuliahSelect.innerHTML = '<option value="">Error: Gagal memuat mata kuliah</option>';
                    });
            }

            // Initialize mata kuliah dropdown
            initializeMataKuliahDropdown();

            // Add form validation before submission
            const jsaForm = document.getElementById('jsaForm');
            if (jsaForm) {
                jsaForm.addEventListener('submit', function(e) {
                    if (!validateForm()) {
                        e.preventDefault();
                        return false;
                    }
                    
                    // Ensure dosen data is included
                    const dosenInputs = document.getElementById('dosenInputs');
                    if (dosenInputs) {
                        dosenInputs.innerHTML = '';
                        selectedDosen.forEach((dosen, id) => {
                            const hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.name = 'dosens[]';
                            hiddenInput.value = id;
                            dosenInputs.appendChild(hiddenInput);
                        });
                    }
                    
                    // Show loading state
                    const submitBtn = document.getElementById('submitBtn');
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.querySelector('.btn-text').style.display = 'none';
                        submitBtn.querySelector('.loading').style.display = 'inline-flex';
                    }
                    
                    console.log('Form submitted successfully');
                    console.log('Selected dosen:', Array.from(selectedDosen.values()));
                    console.log('Selected mahasiswa:', Array.from(selectedMahasiswa.values()));
                    
                    // Debug work steps data
                    const workSteps = workStepsList.querySelectorAll('.work-step-item');
                    const workStepsData = [];
                    workSteps.forEach((step, index) => {
                        const urutan = step.querySelector('input[name="urutan_pekerjaan[]"]').value;
                        const potensi = step.querySelector('textarea[name="potensi_bahaya[]"]').value;
                        const upaya = step.querySelector('textarea[name="upaya_pengendalian[]"]').value;
                        workStepsData.push({ urutan, potensi, upaya });
                    });
                    console.log('Work steps data:', workStepsData);
                });
            }

            // Mahasiswa search functionality
            if (searchMahasiswaBtn) {
                searchMahasiswaBtn.addEventListener('click', searchMahasiswa);
            }
            


            if (searchDosenBtn) {
                searchDosenBtn.addEventListener('click', searchDosen);
            }

            if (dosenSearch) {
                dosenSearch.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        searchDosen();
                    }
                });

                // Auto search after 500ms of typing
                let dosenSearchTimeout;
                dosenSearch.addEventListener('input', function() {
                    clearTimeout(dosenSearchTimeout);
                    dosenSearchTimeout = setTimeout(() => {
                        if (this.value.trim().length >= 2) {
                            searchDosen();
                        } else {
                            dosenSearchResults.classList.remove('show');
                        }
                    }, 500);
                });
            }

            if (mahasiswaSearch) {
                mahasiswaSearch.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        searchMahasiswa();
                    }
                });

                // Auto search after 500ms of typing
                let searchTimeout;
                mahasiswaSearch.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        if (this.value.trim().length >= 2) {
                            searchMahasiswa();
                        } else {
                            searchResults.classList.remove('show');
                        }
                    }, 500);
                });
            }

            // Function to search mahasiswa
            function searchMahasiswa() {
                const searchTerm = mahasiswaSearch.value.trim();
                if (searchTerm.length < 2) {
                    alert('Masukkan minimal 2 karakter untuk mencari');
                    return;
                }

                // Show loading
                searchResults.innerHTML = '<div class="no-results">Mencari...</div>';
                searchResults.classList.add('show');

                // Make AJAX request to search mahasiswa
                fetch(`/api/search-mahasiswa?q=${encodeURIComponent(searchTerm)}`)
                    .then(response => response.json())
                    .then(data => {
                        displaySearchResults(data);
                    })
                    .catch(error => {
                        console.error('Error searching mahasiswa:', error);
                        searchResults.innerHTML = '<div class="no-results">Terjadi kesalahan saat mencari</div>';
                    });
            }

            // Function to display search results
            function displaySearchResults(mahasiswas) {
                if (mahasiswas.length === 0) {
                    searchResults.innerHTML = '<div class="no-results">Tidak ada mahasiswa ditemukan</div>';
                    return;
                }

                const resultsHtml = mahasiswas.map(mahasiswa => {
                    const isSelected = selectedMahasiswa.has(mahasiswa.id.toString());
                    const isOwner = mahasiswa.id.toString() === currentMahasiswaId;
                    const ownerText = isOwner ? ' (Anda)' : '';
                    
                    return `
                        <div class="search-result-item" data-id="${mahasiswa.id}" data-nim="${mahasiswa.nim}" data-nama="${mahasiswa.nama}">
                            <div class="search-result-info">
                                <div class="search-result-nim">${mahasiswa.nim}${ownerText}</div>
                                <div class="search-result-nama">${mahasiswa.nama}</div>
                            </div>
                            <div class="search-result-action">
                                ${isSelected ? 
                                    '<span style="color: #27ae60;">✓ Sudah dipilih</span>' : 
                                    '<button type="button" class="btn btn-sm btn-primary add-mahasiswa-btn">Pilih</button>'
                                }
                            </div>
                        </div>
                    `;
                }).join('');

                searchResults.innerHTML = resultsHtml;

                // Add event listeners to add buttons
                searchResults.querySelectorAll('.add-mahasiswa-btn').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const item = this.closest('.search-result-item');
                        const mahasiswaId = item.dataset.id;
                        const mahasiswaNim = item.dataset.nim;
                        const mahasiswaNama = item.dataset.nama;
                        
                        addMahasiswa(mahasiswaId, mahasiswaNim, mahasiswaNama);
                    });
                });
            }

            // Function to add mahasiswa
            function addMahasiswa(mahasiswaId, mahasiswaNim, mahasiswaNama) {
                if (selectedMahasiswa.has(mahasiswaId)) {
                    alert('Mahasiswa ini sudah dipilih');
                    return;
                }

                const mahasiswaLabel = `${mahasiswaNim} - ${mahasiswaNama}`;
                selectedMahasiswa.set(mahasiswaId, {
                    id: mahasiswaId,
                    nim: mahasiswaNim,
                    nama: mahasiswaNama,
                    label: mahasiswaLabel,
                    isOwner: false
                });

                addPpeSection(mahasiswaId, mahasiswaLabel);
                updateSelectedMahasiswaList();
                updateSearchResults();
            }

            // Function to remove mahasiswa
            function removeMahasiswa(mahasiswaId) {
                // Prevent removing the owner (current mahasiswa)
                if (mahasiswaId === currentMahasiswaId) {
                    alert('Anda tidak dapat menghapus diri sendiri dari JSA ini');
                    return;
                }
                
                selectedMahasiswa.delete(mahasiswaId);
                removePpeSection(mahasiswaId);
                updateSelectedMahasiswaList();
                updateSearchResults();
            }

            // Function to update selected mahasiswa list
            function updateSelectedMahasiswaList() {
                if (selectedMahasiswa.size === 0) {
                    selectedMahasiswaList.innerHTML = '<div class="no-results">Belum ada mahasiswa yang dipilih</div>';
                    return;
                }

                const selectedHtml = Array.from(selectedMahasiswa.values()).map(mahasiswa => {
                    const isOwner = mahasiswa.isOwner || mahasiswa.id === currentMahasiswaId;
                    const ownerClass = isOwner ? 'owner' : '';
                    const disabledClass = isOwner ? 'disabled' : '';
                    const ownerText = isOwner ? ' (Anda)' : '';
                    
                    return `
                        <div class="selected-mahasiswa-item ${ownerClass}" data-id="${mahasiswa.id}">
                            <div class="selected-mahasiswa-info">
                                <div class="selected-mahasiswa-nim">${mahasiswa.nim}${ownerText}</div>
                                <div class="selected-mahasiswa-nama">${mahasiswa.nama}</div>
                            </div>
                            <button type="button" class="remove-mahasiswa-btn ${disabledClass}" onclick="removeMahasiswa('${mahasiswa.id}')" ${isOwner ? 'disabled' : ''}>
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                }).join('');

                selectedMahasiswaList.innerHTML = selectedHtml;
            }

            // Function to update search results (mark selected items)
            function updateSearchResults() {
                searchResults.querySelectorAll('.search-result-item').forEach(item => {
                    const mahasiswaId = item.dataset.id;
                    const actionDiv = item.querySelector('.search-result-action');
                    const nimDiv = item.querySelector('.search-result-nim');
                    
                    if (selectedMahasiswa.has(mahasiswaId)) {
                        actionDiv.innerHTML = '<span style="color: #27ae60;">✓ Sudah dipilih</span>';
                    } else {
                        actionDiv.innerHTML = '<button type="button" class="btn btn-sm btn-primary add-mahasiswa-btn">Pilih</button>';
                    }
                    
                    // Update owner text
                    if (mahasiswaId === currentMahasiswaId) {
                        const nama = item.dataset.nama;
                        nimDiv.textContent = `${item.dataset.nim} (Anda)`;
                    }
                });
            }

            // Initialize selected mahasiswa list
            updateSelectedMahasiswaList();

            // Function to search dosen
            function searchDosen() {
                const searchTerm = dosenSearch.value.trim();
                console.log('Searching dosen for:', searchTerm);
                
                if (searchTerm.length < 2) {
                    alert('Masukkan minimal 2 karakter untuk mencari');
                    return;
                }

                // Show loading
                dosenSearchResults.innerHTML = '<div class="no-results">Mencari...</div>';
                dosenSearchResults.classList.add('show');

                // Make AJAX request to search dosen
                const url = `/api/search-dosen?q=${encodeURIComponent(searchTerm)}`;
                console.log('Fetching URL:', url);
                
                fetch(url)
                    .then(response => {
                        console.log('Response status:', response.status);
                        return response.json();
                    })
                    .then(data => {
                        console.log('Response data:', data);
                        displayDosenSearchResults(data);
                    })
                    .catch(error => {
                        console.error('Error searching dosen:', error);
                        dosenSearchResults.innerHTML = '<div class="no-results">Terjadi kesalahan saat mencari</div>';
                    });
            }

            // Function to display dosen search results
            function displayDosenSearchResults(dosens) {
                if (dosens.length === 0) {
                    dosenSearchResults.innerHTML = '<div class="no-results">Tidak ada dosen ditemukan</div>';
                    return;
                }

                const resultsHtml = dosens.map(dosen => {
                    const isSelected = selectedDosen.has(dosen.id.toString());
                    
                    return `
                        <div class="search-result-item" data-id="${dosen.id}" data-nip="${dosen.nip}" data-nama="${dosen.nama}">
                            <div class="search-result-info">
                                <div class="search-result-nim">${dosen.nip}</div>
                                <div class="search-result-nama">${dosen.nama}</div>
                            </div>
                            <div class="search-result-action">
                                ${isSelected ? 
                                    '<span style="color: #27ae60;">✓ Sudah dipilih</span>' : 
                                    '<button type="button" class="btn btn-sm btn-primary add-dosen-btn">Pilih</button>'
                                }
                            </div>
                        </div>
                    `;
                }).join('');

                dosenSearchResults.innerHTML = resultsHtml;

                // Add event listeners to add buttons
                dosenSearchResults.querySelectorAll('.add-dosen-btn').forEach(btn => {
                    btn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const item = this.closest('.search-result-item');
                        const dosenId = item.dataset.id;
                        const dosenNip = item.dataset.nip;
                        const dosenNama = item.dataset.nama;
                        
                        addDosen(dosenId, dosenNip, dosenNama);
                    });
                });
            }

            // Function to add dosen
            function addDosen(dosenId, dosenNip, dosenNama) {
                if (selectedDosen.has(dosenId)) {
                    alert('Dosen ini sudah dipilih');
                    return;
                }

                const dosenLabel = `${dosenNip} - ${dosenNama}`;
                selectedDosen.set(dosenId, {
                    id: dosenId,
                    nip: dosenNip,
                    nama: dosenNama,
                    label: dosenLabel
                });

                updateSelectedDosenList();
                updateDosenSearchResults();
            }

            // Function to remove dosen
            function removeDosen(dosenId) {
                selectedDosen.delete(dosenId);
                updateSelectedDosenList();
                updateDosenSearchResults();
            }

            // Global function for removing dosen (for onclick)
            window.removeDosen = function(dosenId) {
                selectedDosen.delete(dosenId);
                updateSelectedDosenList();
                updateDosenSearchResults();
            };

            // Function to update selected dosen list
            function updateSelectedDosenList() {
                if (selectedDosen.size === 0) {
                    selectedDosens.innerHTML = '<div class="no-results">Belum ada dosen yang dipilih</div>';
                    return;
                }

                const selectedHtml = Array.from(selectedDosen.values()).map(dosen => {
                    return `
                        <div class="selected-dosen-item" data-id="${dosen.id}">
                            <div class="selected-dosen-info">
                                <div class="selected-dosen-nip">${dosen.nip}</div>
                                <div class="selected-dosen-nama">${dosen.nama}</div>
                            </div>
                            <button type="button" class="remove-dosen-btn" onclick="removeDosen('${dosen.id}')">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    `;
                }).join('');

                selectedDosens.innerHTML = selectedHtml;
            }

            // Function to update dosen search results (mark selected items)
            function updateDosenSearchResults() {
                dosenSearchResults.querySelectorAll('.search-result-item').forEach(item => {
                    const dosenId = item.dataset.id;
                    const actionDiv = item.querySelector('.search-result-action');
                    
                    if (selectedDosen.has(dosenId)) {
                        actionDiv.innerHTML = '<span style="color: #27ae60;">✓ Sudah dipilih</span>';
                    } else {
                        actionDiv.innerHTML = '<button type="button" class="btn btn-sm btn-primary add-dosen-btn">Pilih</button>';
                    }
                });
            }

            // Initialize selected dosen list
            updateSelectedDosenList();

            // Function to add PPE section for selected mahasiswa
            function addPpeSection(mahasiswaId, mahasiswaLabel) {
                // Clone template
                const ppeItem = ppeTemplate.content.cloneNode(true);
                const ppeDiv = ppeItem.querySelector('.ppe-section');
                
                // Set data attributes and content
                ppeDiv.setAttribute('data-mahasiswa-id', mahasiswaId);
                ppeDiv.querySelector('.ppe-title').textContent = `APD untuk ${mahasiswaLabel}`;
                ppeDiv.querySelector('.mahasiswa-id-input').value = mahasiswaId;
                
                // Add event listener for remove button
                const removeBtn = ppeDiv.querySelector('.btn-remove-ppe');
                removeBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm(`Yakin ingin menghapus APD untuk ${mahasiswaLabel}?`)) {
                        ppeDiv.remove();
                        selectedMahasiswa.delete(mahasiswaId);
                        
                        // Uncheck the corresponding mahasiswa checkbox
                        const checkbox = document.querySelector(`.mahasiswa-checkbox[value="${mahasiswaId}"]`);
                        if (checkbox) {
                            checkbox.checked = false;
                        }
                    }
                });
                
                // Add to container
                ppeContainer.appendChild(ppeDiv);
            }

            // Function to remove PPE section
            function removePpeSection(mahasiswaId) {
                const ppeSection = document.querySelector(`.ppe-section[data-mahasiswa-id="${mahasiswaId}"]`);
                if (ppeSection) {
                    ppeSection.remove();
                }
            }

            // Add Work Step functionality (sama seperti tambahjsa.blade.php)
            const addWorkStepBtn = document.getElementById('addWorkStep');
            if (addWorkStepBtn) {
                addWorkStepBtn.addEventListener('click', addWorkStep);
            }
            if (workStepInput) {
                workStepInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addWorkStep();
                    }
                });
            }

            // Add Inspection Area functionality (sama seperti tambahjsa.blade.php)
            const addInspectionAreaBtn = document.getElementById('addInspectionArea');
            if (addInspectionAreaBtn) {
                addInspectionAreaBtn.addEventListener('click', addInspectionArea);
            }
            if (inspectionAreaInput) {
                inspectionAreaInput.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        e.preventDefault();
                        addInspectionArea();
                    }
                });
            }

            // Global function for adding inspection areas (sama seperti tambahjsa.blade.php)
            function addInspectionArea() {
                const areaText = inspectionAreaInput.value.trim();
                if (!areaText) {
                    alert('Masukkan area inspeksi terlebih dahulu!');
                    return;
                }

                // Get current counter
                const inspectionAreas = inspectionAreasList.querySelectorAll('.inspection-area-item');
                const inspectionAreaCounter = inspectionAreas.length + 1;
                
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
                    const isVisible = detailsDiv.classList.contains('show');
                    
                    if (isVisible) {
                        detailsDiv.classList.remove('show');
                        toggleBtn.textContent = 'Buka Tabel';
                        toggleBtn.classList.remove('btn-primary');
                        toggleBtn.classList.add('btn-secondary');
                    } else {
                        detailsDiv.classList.add('show');
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

            // Global function for adding inspection rows
            function addInspectionRow(areaDiv) {
                const tbody = areaDiv.querySelector('tbody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td><input type="text" name="item_inspeksi[]" placeholder="Item inspeksi"></td>
                    <td><textarea name="standar_kebersihan[]" placeholder="Standar kebersihan"></textarea></td>
                    <td><textarea name="hasil_pemeriksaan[]" placeholder="Hasil pemeriksaan"></textarea></td>
                    <td><input type="text" name="status[]" placeholder="Status"></td>
                    <td>
                        <select name="ok_ng[]">
                            <option value="OK">OK</option>
                            <option value="NG">NG</option>
                        </select>
                    </td>
                    <td><textarea name="tindakan_korektif[]" placeholder="Tindakan korektif"></textarea></td>
                    <td>
                        <button type="button" class="btn-remove-inspection-row btn btn-sm btn-danger">Hapus</button>
                    </td>
                `;
                tbody.appendChild(newRow);
            }

            // Global function for reordering area numbers
            function reorderAreaNumbers() {
                const inspectionAreasList = document.getElementById('inspectionAreasList');
                if (!inspectionAreasList) return;
                
                const inspectionAreas = inspectionAreasList.querySelectorAll('.inspection-area-item');
                inspectionAreas.forEach((area, index) => {
                    const areaNumber = area.querySelector('.area-number');
                    if (areaNumber) {
                        areaNumber.textContent = index + 1;
                        area.setAttribute('data-area-id', index + 1);
                    }
                });
            }

            // Initialize existing PPE sections
            document.querySelectorAll('.ppe-section').forEach(ppeSection => {
                const removeBtn = ppeSection.querySelector('.btn-remove-ppe');
                if (removeBtn) {
                    removeBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        const mahasiswaId = ppeSection.getAttribute('data-mahasiswa-id');
                        const mahasiswaLabel = ppeSection.querySelector('.ppe-title').textContent.replace('APD untuk ', '');
                        
                        if (confirm(`Yakin ingin menghapus APD untuk ${mahasiswaLabel}?`)) {
                            ppeSection.remove();
                            selectedMahasiswa.delete(mahasiswaId);
                            
                            // Uncheck the corresponding mahasiswa checkbox
                            const checkbox = document.querySelector(`.mahasiswa-checkbox[value="${mahasiswaId}"]`);
                            if (checkbox) {
                                checkbox.checked = false;
                            }
                        }
                    });
                }
            });

            // Initialize existing work steps and inspection areas
            document.querySelectorAll('.work-step-item').forEach(workStep => {
                const toggleBtn = workStep.querySelector('.btn-toggle-hazards');
                const removeBtn = workStep.querySelector('.btn-remove-step');
                const detailsDiv = workStep.querySelector('.work-step-details');
                
                if (toggleBtn) {
                    toggleBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        const isVisible = detailsDiv.classList.contains('show');
                        
                        if (isVisible) {
                            detailsDiv.classList.remove('show');
                            toggleBtn.textContent = 'Buka Analisis';
                            toggleBtn.classList.remove('btn-primary');
                            toggleBtn.classList.add('btn-secondary');
                        } else {
                            detailsDiv.classList.add('show');
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
                        const isVisible = detailsDiv.classList.contains('show');
                        
                        if (isVisible) {
                            detailsDiv.classList.remove('show');
                            toggleBtn.textContent = 'Buka Tabel';
                            toggleBtn.classList.remove('btn-primary');
                            toggleBtn.classList.add('btn-secondary');
                        } else {
                            detailsDiv.classList.add('show');
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
                            areaDiv.remove();
                            reorderAreaNumbers();
                        }
                    }
                }
            });

            // Form validation
            const form = document.getElementById('jsaForm');
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Check basic required fields with specific alerts
                const basicFields = [
                    { name: 'semester', label: 'Semester' },
                    { name: 'matakuliah', label: 'Mata Kuliah' },
                    { name: 'kelas', label: 'Kelas' },
                    { name: 'nama_pekerjaan', label: 'Nama Pekerjaan' },
                    { name: 'lokasi_pekerjaan', label: 'Lokasi Pekerjaan' },
                    { name: 'tanggal_pelaksanaan', label: 'Tanggal Pelaksanaan' }
                ];

                // Check mahasiswa selection
                if (selectedMahasiswa.size === 0) {
                    alert('⚠️ Minimal harus memilih satu mahasiswa!');
                    return;
                }

                // Check dosen selection
                if (selectedDosen.size === 0) {
                    alert('⚠️ Minimal harus memilih satu dosen pembimbing!');
                    return;
                }

                for (const field of basicFields) {
                    const input = document.querySelector(`[name="${field.name}"]`);
                    
                    if (!input || !input.value.trim()) {
                        alert(`⚠️ Field "${field.label}" harus diisi!`);
                        if (input) input.focus();
                        return;
                    }
                }

                // Check work steps
                const workSteps = document.querySelectorAll('.work-step-item');
                if (workSteps.length === 0) {
                    alert('⚠️ Minimal harus ada satu urutan pekerjaan!');
                    const workStepInput = document.getElementById('workStepInput');
                    if (workStepInput) workStepInput.focus();
                    return;
                }

                // Check if any work step has empty description
                for (let i = 0; i < workSteps.length; i++) {
                    const step = workSteps[i];
                    const stepDescriptionInput = step.querySelector('.step-description-input');
                    const stepText = step.querySelector('.step-text');
                    const stepDescription = stepDescriptionInput ? stepDescriptionInput.value.trim() : (stepText ? stepText.textContent.trim() : '');
                    
                    if (!stepDescription) {
                        alert(`⚠️ Urutan Pekerjaan nomor ${i + 1} tidak boleh kosong!`);
                        const workStepInput = document.getElementById('workStepInput');
                        if (workStepInput) workStepInput.focus();
                        return;
                    }
                }

                // Check each work step has hazards and controls filled with specific alerts
                for (let i = 0; i < workSteps.length; i++) {
                    const step = workSteps[i];
                    const stepText = step.querySelector('.step-text').textContent;
                    const hazardsTextarea = step.querySelector('textarea[name="potensi_bahaya[]"]');
                    const controlsTextarea = step.querySelector('textarea[name="upaya_pengendalian[]"]');
                    
                    if (!hazardsTextarea || !hazardsTextarea.value.trim()) {
                        alert(`⚠️ Urutan Pekerjaan "${stepText}" - Potensi Bahaya harus diisi!`);
                        if (hazardsTextarea) {
                            const toggleBtn = step.querySelector('.btn-toggle-hazards');
                            if (toggleBtn) toggleBtn.click();
                            hazardsTextarea.focus();
                        }
                        return;
                    }
                    
                    if (!controlsTextarea || !controlsTextarea.value.trim()) {
                        alert(`⚠️ Urutan Pekerjaan "${stepText}" - Upaya Pengendalian harus diisi!`);
                        if (controlsTextarea) {
                            const toggleBtn = step.querySelector('.btn-toggle-hazards');
                            if (toggleBtn) toggleBtn.click();
                            controlsTextarea.focus();
                        }
                        return;
                    }
                }

                // Check inspection areas
                const inspectionAreas = document.querySelectorAll('.inspection-area-item');
                if (inspectionAreas.length === 0) {
                    alert('⚠️ Minimal harus ada satu area inspeksi!');
                    const inspectionAreaInput = document.getElementById('inspectionAreaInput');
                    if (inspectionAreaInput) inspectionAreaInput.focus();
                    return;
                }

                // Check if any inspection area has empty name
                for (let i = 0; i < inspectionAreas.length; i++) {
                    const area = inspectionAreas[i];
                    const areaNameInput = area.querySelector('.area-name-input');
                    const areaText = area.querySelector('.area-text');
                    const areaName = areaNameInput ? areaNameInput.value.trim() : (areaText ? areaText.textContent.trim() : '');
                    
                    if (!areaName) {
                        alert(`⚠️ Area Inspeksi nomor ${i + 1} tidak boleh kosong!`);
                        const inspectionAreaInput = document.getElementById('inspectionAreaInput');
                        if (inspectionAreaInput) inspectionAreaInput.focus();
                        return;
                    }
                }

                // Check each inspection area has items and tanggal selesai with specific alerts
                for (let i = 0; i < inspectionAreas.length; i++) {
                    const area = inspectionAreas[i];
                    const areaText = area.querySelector('.area-text').textContent;
                    const items = area.querySelectorAll('tbody tr');
                    const tanggalSelesai = area.querySelector('input[name="tanggal_selesai[]"]');
                    
                    if (!tanggalSelesai || !tanggalSelesai.value.trim()) {
                        alert(`⚠️ Area Inspeksi "${areaText}" - Tanggal Selesai harus diisi!`);
                        if (tanggalSelesai) {
                            const toggleBtn = area.querySelector('.btn-toggle-inspection');
                            if (toggleBtn) toggleBtn.click();
                            tanggalSelesai.focus();
                        }
                        return;
                    }
                    
                    if (items.length === 0) {
                        alert(`⚠️ Area Inspeksi "${areaText}" - Minimal harus ada satu item inspeksi!`);
                        const toggleBtn = area.querySelector('.btn-toggle-inspection');
                        if (toggleBtn) toggleBtn.click();
                        return;
                    }

                    // Check if all items in this area have required fields filled
                    for (let j = 0; j < items.length; j++) {
                        const item = items[j];
                        const itemInput = item.querySelector('input[name="item_inspeksi[]"]');
                        const standarTextarea = item.querySelector('textarea[name="standar_kebersihan[]"]');
                        const hasilTextarea = item.querySelector('textarea[name="hasil_pemeriksaan[]"]');
                        const statusInput = item.querySelector('input[name="status[]"]');
                        const okNgSelect = item.querySelector('select[name="ok_ng[]"]');
                        const tindakanTextarea = item.querySelector('textarea[name="tindakan_korektif[]"]');

                        if (!itemInput || !itemInput.value.trim()) {
                            alert(`⚠️ Area Inspeksi "${areaText}" - Item Inspeksi baris ${j + 1} harus diisi!`);
                            const toggleBtn = area.querySelector('.btn-toggle-inspection');
                            if (toggleBtn) toggleBtn.click();
                            if (itemInput) itemInput.focus();
                            return;
                        } else {

                                if (!standarTextarea || !standarTextarea.value.trim()) {
                                    alert(`⚠️ Area Inspeksi "${areaText}" - Standar Kebersihan baris ${j + 1} harus diisi!`);
                                    const toggleBtn = area.querySelector('.btn-toggle-inspection');
                                    if (toggleBtn) toggleBtn.click();
                                    if (standarTextarea) standarTextarea.focus();
                                    return;
                                } else {

                                        if (!hasilTextarea || !hasilTextarea.value.trim()) {
                                            alert(`⚠️ Area Inspeksi "${areaText}" - Hasil Pemeriksaan baris ${j + 1} harus diisi!`);
                                            const toggleBtn = area.querySelector('.btn-toggle-inspection');
                                            if (toggleBtn) toggleBtn.click();
                                            if (hasilTextarea) hasilTextarea.focus();
                                            return;
                                        } else {

                                                if (!statusInput || !statusInput.value.trim()) {
                                                    alert(`⚠️ Area Inspeksi "${areaText}" - Status baris ${j + 1} harus diisi!`);
                                                    const toggleBtn = area.querySelector('.btn-toggle-inspection');
                                                    if (toggleBtn) toggleBtn.click();
                                                    if (statusInput) statusInput.focus();
                                                    return;
                                                } else {

                                                        if (!okNgSelect || !okNgSelect.value) {
                                                            alert(`⚠️ Area Inspeksi "${areaText}" - OK/NG baris ${j + 1} harus dipilih!`);
                                                            const toggleBtn = area.querySelector('.btn-toggle-inspection');
                                                            if (toggleBtn) toggleBtn.click();
                                                            if (okNgSelect) okNgSelect.focus();
                                                            return;
                                                        } else {

                                                                if (!tindakanTextarea || !tindakanTextarea.value.trim()) {
                                                                    alert(`⚠️ Area Inspeksi "${areaText}" - Tindakan Korektif baris ${j + 1} harus diisi!`);
                                                                    const toggleBtn = area.querySelector('.btn-toggle-inspection');
                                                                    if (toggleBtn) toggleBtn.click();
                                                                    if (tindakanTextarea) tindakanTextarea.focus();
                                                                    return;
                                                                }
                                                        }
                                                }
                                        }
                                }
                        }
                    }
                }

                // Set values for APD checkboxes before submit
                const apdCheckboxes = form.querySelectorAll('.ppe-checkbox:checked');
                apdCheckboxes.forEach(checkbox => {
                    const mahasiswaId = checkbox.getAttribute('data-mahasiswa-id');
                    if (mahasiswaId) {
                        checkbox.value = mahasiswaId;
                    }
                });

                // Add hidden inputs for selected mahasiswa before submit
                const existingHiddenInputs = form.querySelectorAll('input[name="mahasiswas[]"]');
                existingHiddenInputs.forEach(input => input.remove());

                selectedMahasiswa.forEach((mahasiswa, id) => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'mahasiswas[]';
                    hiddenInput.value = id;
                    form.appendChild(hiddenInput);
                });

                // Add hidden inputs for selected dosen before submit
                const existingDosenHiddenInputs = form.querySelectorAll('input[name="dosens[]"]');
                existingDosenHiddenInputs.forEach(input => input.remove());

                selectedDosen.forEach((dosen, id) => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'dosens[]';
                    hiddenInput.value = id;
                    form.appendChild(hiddenInput);
                });

                // If all validations pass, submit the form
                const btn = document.getElementById('submitBtn');
                if (btn) {
                    const btnText = btn.querySelector('.btn-text');
                    const loading = btn.querySelector('.loading');
                    
                    if (btnText) btnText.style.display = 'none';
                    if (loading) loading.style.display = 'block';
                    btn.disabled = true;
                }

                // Submit the form
                form.submit();
            });
    });
</script>

</body>
</html>
