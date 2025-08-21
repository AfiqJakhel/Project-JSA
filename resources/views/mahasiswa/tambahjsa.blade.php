<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah JSA</title>
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

        /* Mahasiswa & Dosen Search Section */
        .mahasiswa-search-container,
        .dosen-search-container {
            margin-bottom: 20px;
            position: relative;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            display: none;
            position: absolute;
            z-index: 1000;
            width: 100%;
            margin-top: 5px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: none;
        }

        /* Custom scrollbar untuk dropdown */
        .search-results::-webkit-scrollbar {
            width: 8px;
        }

        .search-results::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        .search-results::-webkit-scrollbar-thumb {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 4px;
        }

        .search-results::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #764ba2, #667eea);
        }

        .search-results.show {
            display: block !important;
        }

        .search-result-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-result-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        .search-result-info {
            flex: 1;
        }

        .search-result-nim {
            font-weight: 700;
            color: white;
            font-size: 0.95rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .search-result-nama {
            color: rgba(255, 255, 255, 0.95);
            font-size: 0.85rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .search-result-action {
            margin-left: 10px;
        }

        .search-result-action .btn {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(39, 174, 96, 0.3);
        }

        .search-result-action .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.4);
            background: linear-gradient(45deg, #2ecc71, #27ae60);
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

        .selected-mahasiswa-nim,
        .selected-dosen-nip {
            font-weight: 600;
            color: white;
            font-size: 0.9rem;
        }

        .selected-mahasiswa-nama,
        .selected-dosen-nama {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8rem;
        }

        .remove-mahasiswa-btn,
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

        .remove-mahasiswa-btn:hover,
        .remove-dosen-btn:hover {
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

        .remove-mahasiswa-btn.disabled,
        .remove-dosen-btn.disabled {
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.3);
            cursor: not-allowed;
            opacity: 0.5;
        }

        .remove-mahasiswa-btn.disabled:hover,
        .remove-dosen-btn.disabled:hover {
            transform: none;
            box-shadow: none;
            background: rgba(255, 255, 255, 0.1);
        }

        /* PPE Section Styles */
        .ppe-section {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .ppe-section.owner-ppe {
            background: rgba(39, 174, 96, 0.1);
            border-color: rgba(39, 174, 96, 0.3);
        }

        .ppe-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .ppe-title {
            font-weight: 600;
            color: white;
            font-size: 1.1rem;
        }

        .ppe-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 15px;
        }

        .ppe-grid-bottom {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .ppe-item {
            display: flex;
            align-items: center;
        }

        .ppe-checkbox-label {
            display: flex;
            align-items: center;
            cursor: pointer;
            color: white;
            font-size: 0.9rem;
            width: 100%;
        }

        .ppe-checkbox {
            display: none;
        }

        .checkmark {
            width: 20px;
            height: 20px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 4px;
            margin-right: 10px;
            position: relative;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .ppe-checkbox:checked  .checkmark {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            border-color: #27ae60;
        }

        .ppe-checkbox:checked  .checkmark::after {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
            font-size: 12px;
        }

        .ppe-checkbox-label:hover .checkmark {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
        }

        /* Tooltip styles */
        [title] {
            position: relative;
        }

        [title]:hover::after {
            content: attr(title);
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            white-space: nowrap;
            z-index: 10000;
            margin-bottom: 5px;
        }

        [title]:hover::before {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid transparent;
            border-top-color: rgba(0, 0, 0, 0.8);
            z-index: 10000;
            margin-bottom: -5px;
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

        .no-results {
            padding: 20px;
            text-align: center;
            color: rgba(255, 255, 255, 0.9);
            font-style: italic;
            font-size: 0.9rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .no-results.loading {
            color: #f39c12;
            font-weight: 600;
        }

        /* Animasi loading untuk "Mencari..." */
        .no-results.loading::after {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #f39c12;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
            margin-left: 10px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        /* Pesan error yang lebih menarik */
        .no-results.error {
            color: #e74c3c;
            font-weight: 600;
        }

        .no-results.not-found {
            color: #95a5a6;
            font-weight: 500;
        }

        /* PPE Container */
        .ppe-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

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
            padding: 20px;
            background: rgba(255, 255, 255, 0.02);
        }

        .work-step-details.show {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .work-step-details .form-group {
            margin-bottom: 0;
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
            <h1>Tambah JSA Baru</h1>
            <p>Buat Job Safety Analysis baru</p>
    </div>

        <!-- Form Container -->
        <div class="form-container">
            @if ($errors->any())
                <div class="alert alert-danger" style="background: linear-gradient(45deg, #e74c3c, #c0392b); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: none;">
                    <h5><i class="fas fa-exclamation-triangle"></i> Terjadi Kesalahan:</h5>
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" style="background: linear-gradient(45deg, #27ae60, #2ecc71); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: none;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form id="jsaForm" method="POST" action="{{ route('mahasiswa.tambahjsa.store') }}">
        @csrf

                <!-- Basic Information Section -->
                <div class="form-section">
                    <h2 class="section-title">Informasi Dasar</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="semester">Semester</label>
                            <input type="text" id="semester" name="semester" class="form-input" placeholder="Masukkan semester" value="{{ old('semester') }}" required>
        </div>
                        <div class="form-group">
                            <label class="form-label" for="matakuliah">Mata Kuliah</label>
                            <input type="text" id="matakuliah" name="matakuliah" class="form-input" placeholder="Masukkan mata kuliah" value="{{ old('matakuliah') }}" required>
        </div>
        </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="kelas">Kelas</label>
                            <input type="text" id="kelas" name="kelas" class="form-input" placeholder="Masukkan kelas" value="{{ old('kelas') }}" required>
        </div>
                        <div class="form-group">
                            <label class="form-label" for="nama_pekerjaan">Nama Pekerjaan</label>
                            <input type="text" id="nama_pekerjaan" name="nama_pekerjaan" class="form-input" placeholder="Masukkan nama pekerjaan" value="{{ old('nama_pekerjaan') }}" required>
        </div>
        </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="lokasi_pekerjaan">Lokasi</label>
                            <input type="text" id="lokasi_pekerjaan" name="lokasi_pekerjaan" class="form-input" placeholder="Masukkan lokasi pekerjaan" value="{{ old('lokasi_pekerjaan') }}" required>
        </div>
                        <div class="form-group">
                            <label class="form-label" for="tanggal_pelaksanaan">Tanggal Pekerjaan</label>
                            <input type="date" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" class="form-input" value="{{ old('tanggal_pelaksanaan') }}" required>
        </div>
        </div>
                        <div class="form-group">
                            <label class="form-label" for="jsaNumberPreview">Nomor JSA (Preview)</label>
                            <div class="jsa-preview-container">
                                <input type="text" id="jsaNumberPreview" class="form-input" readonly style="background-color: #f8f9fa; color: #6c757d;">
                                <small class="form-text" style="color: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-info-circle"></i> Nomor JSA akan dibuat otomatis setelah semua data terisi
                                </small>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Dosen Pembimbing Selection Section -->
                <div class="form-section">
                    <h2 class="section-title">Pemilihan Dosen Pembimbing</h2>
                    
                    @if ($errors->has('dosens'))
                        <div class="alert alert-danger" style="background: rgba(220, 53, 69, 0.9); color: white; padding: 10px; border-radius: 8px; margin-bottom: 15px; border: none;">
                            <i class="fas fa-exclamation-triangle"></i> {{ $errors->first('dosens') }}
                        </div>
                    @endif
                    
                    <div class="form-group">
                        <label class="form-label" for="dosenSearch">Cari dan Pilih Dosen Pembimbing</label>
                        <div class="dosen-search-container">
                            <div class="search-input-group">
                                <input type="text" id="dosenSearch" class="form-input" placeholder="Cari dosen berdasarkan NIP atau nama...">
                                <button type="button" id="searchDosen" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div id="dosenSearchResults" class="search-results"></div>
                            </div>
                        <div class="selected-dosen-container">
                            <h4 class="selected-title">Dosen Pembimbing yang Dipilih:</h4>
                            <div id="selectedDosenList" class="selected-dosen-list">
                                <!-- Selected dosen will be displayed here -->
                            </div>
                            <div id="dosen-hidden-inputs">
                                <!-- Hidden inputs for selected dosens will be added here -->
                            </div>
                            <div class="info-text">
                                <small style="color: rgba(255, 255, 255, 0.7);">
                                    <i class="fas fa-info-circle"></i> 
                                    Minimal harus ada 1 dosen pembimbing
                                </small>
                            </div>
                        </div>
                        
                            </div>
                            </div>

                <!-- Mahasiswa Selection Section -->
                <div class="form-section">
                    <h2 class="section-title">Pemilihan Mahasiswa</h2>
                    <div class="form-group">
                        <label class="form-label" for="mahasiswaSearch">Cari dan Pilih Mahasiswa yang Terlibat</label>
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
                        <input type="hidden" id="currentMahasiswaId" value="{{ $currentMahasiswa->id ?? '' }}">
                        <input type="hidden" id="currentMahasiswaNim" value="{{ $currentMahasiswa->nim ?? '' }}">
                        <input type="hidden" id="currentMahasiswaNama" value="{{ $currentMahasiswa->nama ?? '' }}">
                        
                        <!-- Hidden inputs untuk mahasiswa dan dosen yang dipilih -->
                        <input type="hidden" name="mahasiswas[]" value="{{ $currentMahasiswa->id ?? '' }}">
                    </div>
                </div>

                <!-- PPE Completeness Section -->
                <div class="form-section">
                    <h2 class="section-title">Kelengkapan APD per Mahasiswa</h2>
                    <div class="ppe-container" id="ppeContainer">
                        <!-- APD sections will be added here dynamically -->
                    </div>
                </div>

                <!-- Work Sequence & Hazards Section -->
                <div class="form-section">
                    <h2 class="section-title">Urutan Pekerjaan & Analisis Bahaya</h2>
                    
                    <!-- Input Urutan Pekerjaan -->
                    <div class="work-sequence-input">
                        <div class="form-group">
                            <label class="form-label" for="workStepInput">Tambah Urutan Pekerjaan</label>
                            <div class="input-group">
                                <input type="text" id="workStepInput" name="urutan_pekerjaan[]" class="form-input" placeholder="Masukkan urutan pekerjaan (contoh: Persiapan alat, Pemeriksaan area, dll)">
                                <button type="button" id="addWorkStep" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Urutan Pekerjaan -->
                    <div class="work-steps-list" id="workStepsList">
                        <!-- Work steps will be added here dynamically -->
                    </div>
                    
                    <!-- Template for Work Step (di dalam form agar terikat) -->
                    <template id="workStepTemplate">
                        <div class="work-step-item" data-step-id="">
                            <div class="work-step-header">
                                <div class="work-step-title">
                                    <span class="step-number"></span>
                                    <span class="step-text"></span>
                                </div>
                                <div class="work-step-actions">
                                    <button type="button" class="btn-toggle-hazards btn btn-secondary">Buka Analisis</button>
                                    <button type="button" class="btn-remove-step btn btn-danger">Hapus</button>
                                </div>
                            </div>
                            <div class="work-step-details">
                                <div class="form-group">
                                    <label class="form-label" for="potensi_bahaya_">Potensi Bahaya</label>
                                    <textarea name="potensi_bahaya[]" id="potensi_bahaya_" class="form-input form-textarea" placeholder="Masukkan potensi bahaya"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="upaya_pengendalian_">Upaya Pengendalian</label>
                                    <textarea name="upaya_pengendalian[]" id="upaya_pengendalian_" class="form-input form-textarea" placeholder="Masukkan upaya pengendalian"></textarea>
                                </div>
                            </div>
                            <!-- Hidden input untuk menyimpan deskripsi urutan pekerjaan -->
                            <input type="hidden" name="urutan_pekerjaan[]" class="step-description-input">
                        </div>
                    </template>
                </div>

                <!-- Inspection Areas Section -->
                <div class="form-section">
                    <h2 class="section-title">Area Inspeksi</h2>
                    
                    <!-- Input Area Inspeksi -->
                    <div class="inspection-areas-input">
                        <div class="form-group">
                            <label class="form-label" for="inspectionAreaInput">Tambah Area Inspeksi</label>
                            <div class="input-group">
                                <input type="text" id="inspectionAreaInput" class="form-input" placeholder="Masukkan area inspeksi (contoh: Area Produksi, Area Penyimpanan, dll)">
                                <button type="button" id="addInspectionArea" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>

                    <!-- Daftar Area Inspeksi -->
                    <div class="inspection-areas-list" id="inspectionAreasList">
                        <!-- Inspection areas will be added here dynamically -->
                    </div>
                </div>

                <!-- Hidden inputs untuk form submission -->
                <div id="dosenInputs"></div>
                <div id="mahasiswaInputs"></div>

                <!-- Debug Panel (akan dihilangkan setelah debugging selesai) -->
                <div id="debugPanel" style="display: none; background: #f8f9fa; border: 1px solid #dee2e6; padding: 15px; margin: 20px 0; border-radius: 8px;">
                    <h4>Debug Info:</h4>
                    <div id="debugContent"></div>
                </div>

                                <!-- Submit Section -->
                <div class="submit-section">
                    <button type="button" id="debugBtn" class="btn btn-secondary" style="margin-right: 10px;">
                        <i class="fas fa-bug"></i> Debug Info
                    </button>
                    <button type="submit" id="submitBtn" class="btn btn-submit">
                        <span class="btn-text">
                            <i class="fas fa-save"></i> Kirim JSA
                        </span>
                        <span class="loading">
                            <i class="fas fa-spinner fa-spin"></i> Menyimpan...
                        </span>
                    </button>
                </div>



    </form>
        </div>
</div>

<!-- Race Condition Monitoring Dashboard (Admin Only) -->
@if(auth('mahasiswa')->user()->role === 'admin')
<div class="monitoring-dashboard" style="margin-top: 30px; padding: 20px; background: rgba(0,0,0,0.1); border-radius: 10px;">
    <h4 style="color: #fff; margin-bottom: 15px;">
        <i class="fas fa-chart-line"></i> Race Condition Monitoring
    </h4>
    <div class="stats-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
        <div class="stat-card" style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;">
            <h5 style="color: #fff; margin: 0 0 10px 0;">Total Retries</h5>
            <div id="totalRetries" style="font-size: 24px; color: #ffd700; font-weight: bold;">-</div>
                </div>
        <div class="stat-card" style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;">
            <h5 style="color: #fff; margin: 0 0 10px 0;">Failed Creations</h5>
            <div id="failedCreations" style="font-size: 24px; color: #ff6b6b; font-weight: bold;">-</div>
                </div>
        <div class="stat-card" style="background: rgba(255,255,255,0.1); padding: 15px; border-radius: 8px;">
            <h5 style="color: #fff; margin: 0 0 10px 0;">Last 24h Retries</h5>
            <div id="last24hRetries" style="font-size: 24px; color: #4ecdc4; font-weight: bold;">-</div>
            </div>
                </div>
    <div style="margin-top: 15px;">
        <button onclick="clearCache()" class="btn btn-warning btn-sm">
            <i class="fas fa-broom"></i> Clear Cache
        </button>
        <button onclick="refreshStats()" class="btn btn-info btn-sm ml-2">
            <i class="fas fa-sync"></i> Refresh Stats
        </button>
                </div>
            </div>

<script>
function refreshStats() {
    fetch('{{ route('api.race.condition.stats') }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('totalRetries').textContent = data.total_retries;
            document.getElementById('failedCreations').textContent = data.failed_creations;
            document.getElementById('last24hRetries').textContent = data.last_24h_retries;
        })
        .catch(error => console.error('Error fetching stats:', error));
}

function clearCache() {
    fetch('{{ route('api.clear.jsa.cache') }}', { method: 'POST' })
        .then(response => response.json())
        .then(data => {
            alert('Cache berhasil dibersihkan');
            refreshStats();
        })
        .catch(error => console.error('Error clearing cache:', error));
}

// Auto-refresh stats every 30 seconds
setInterval(refreshStats, 30000);
refreshStats(); // Initial load
</script>
@endif



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
                        <input type="checkbox" name="apd_shelmet[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Safety Helmet
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_sgloves[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Safety Gloves
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_shoes[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Safety Shoes
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_sglasses[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Safety Glasses
                    </label>
                </div>
            </div>
            <div class="ppe-grid-bottom">
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_svest[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Safety Vest
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_earplug[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Earplug
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_fmask[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Face Mask
                    </label>
                </div>
                <div class="ppe-item">
                    <label class="ppe-checkbox-label">
                        <input type="checkbox" name="apd_respiratory[]" class="ppe-checkbox" data-mahasiswa-id="">
                        <span class="checkmark"></span>
                        Respiratory Protection
                    </label>
                </div>
            </div>
            <input type="hidden" name="mahasiswa_ids[]" class="mahasiswa-id-input">
        </div>
    </template>

    <!-- Template for Inspection Area -->
    <template id="inspectionAreaTemplate">
        <div class="inspection-area-item" data-area-id="">
            <div class="inspection-area-header">
                <div class="inspection-area-title">
                    <span class="area-number"></span>
                    <span class="area-text"></span>
                </div>
                <div class="inspection-area-actions">
                    <button type="button" class="btn-toggle-inspection btn btn-secondary">Buka Tabel</button>
                    <button type="button" class="btn-remove-area btn btn-danger">Hapus</button>
                </div>
            </div>
            <div class="inspection-area-details">
                <div class="form-group">
                    <label class="form-label" for="tanggal_selesai_">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai[]" id="tanggal_selesai_" class="form-input">
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
                <input type="hidden" name="area_inspeksi[]" class="area-name-input">
            </div>
        </div>
    </template>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            try {
                console.log('JSA Form initialization started...');
                
                // Initialize counters
                let workStepCounter = 0;
                let inspectionAreaCounter = 0;

                // Get DOM elements with null checks
                const workStepInput = document.getElementById('workStepInput');
                const addWorkStepBtn = document.getElementById('addWorkStep');
                const workStepsList = document.getElementById('workStepsList');
                const workStepTemplate = document.getElementById('workStepTemplate');

                const inspectionAreaInput = document.getElementById('inspectionAreaInput');
                const addInspectionAreaBtn = document.getElementById('addInspectionArea');
                const inspectionAreasList = document.getElementById('inspectionAreasList');
                const inspectionAreaTemplate = document.getElementById('inspectionAreaTemplate');

                // Mahasiswa search elements
                const ppeContainer = document.getElementById('ppeContainer');
                const ppeTemplate = document.getElementById('ppeTemplate');
                const mahasiswaSearch = document.getElementById('mahasiswaSearch');
                const searchMahasiswaBtn = document.getElementById('searchMahasiswa');
                const searchResults = document.getElementById('searchResults');
                const selectedMahasiswaList = document.getElementById('selectedMahasiswaList');

                // Dosen search elements
                const dosenSearch = document.getElementById('dosenSearch');
                const searchDosenBtn = document.getElementById('searchDosen');
                const dosenSearchResults = document.getElementById('dosenSearchResults');
                const selectedDosenList = document.getElementById('selectedDosenList');

                // Current mahasiswa data
                const currentMahasiswaId = document.getElementById('currentMahasiswaId')?.value?.toString() || '';
                const currentMahasiswaNim = document.getElementById('currentMahasiswaNim')?.value || '';
                const currentMahasiswaNama = document.getElementById('currentMahasiswaNama')?.value || '';

                // Use Map to store selected mahasiswa and dosen (key = id)
                const selectedMahasiswa = new Map();
                const selectedDosen = new Map();
                
                // ------------- HELPER FUNCTIONS -------------

                // Update hidden inputs for mahasiswas
                function updateMahasiswaHiddenInputs() {
                    const container = document.getElementById('mahasiswaInputs') || document.getElementById('mahasiswa-hidden-inputs');
                    if (!container) return;
                    
                    let inputsHtml = '';
                    selectedMahasiswa.forEach(m => {
                        inputsHtml = `<input type="hidden" name="mahasiswas[]" value="${m.id}">`;
                    });
                    container.innerHTML = inputsHtml;
                }

                // Update hidden inputs for dosens
                function updateDosenHiddenInputs() {
                    const container = document.getElementById('dosenInputs') || document.getElementById('dosen-hidden-inputs');
                    if (!container) return;
                    
                    let inputsHtml = '';
                    selectedDosen.forEach(d => {
                        inputsHtml = `<input type="hidden" name="dosens[]" value="${d.id}">`;
                    });
                    container.innerHTML = inputsHtml;
                }

                // Add mahasiswa
                function addMahasiswa(mahasiswaId, mahasiswaNim, mahasiswaNama) {
                    const id = mahasiswaId.toString();
                    if (selectedMahasiswa.has(id)) {
                        alert('Mahasiswa ini sudah dipilih');
                        return;
                    }

                    const mahasiswaLabel = `${mahasiswaNim} - ${mahasiswaNama}`;
                    selectedMahasiswa.set(id, {
                        id,
                        nim: mahasiswaNim,
                        nama: mahasiswaNama,
                        label: mahasiswaLabel,
                        isOwner: false
                    });

                    // Add PPE section for this mahasiswa
                    addPpeSection(id, mahasiswaLabel);
                    updateSelectedMahasiswaList();
                    updateSearchResults();
                    
                    // Show success message
                    showSuccessMessage(`${mahasiswaNama} berhasil ditambahkan`);
                }

                // Update selected mahasiswa list
                function updateSelectedMahasiswaList() {
                    if (!selectedMahasiswaList) return;
                    
                    if (selectedMahasiswa.size === 0) {
                        selectedMahasiswaList.innerHTML = '<div class="no-results not-found">Belum ada mahasiswa yang dipilih</div>';
                        updateMahasiswaHiddenInputs();
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
                                <button type="button" class="remove-mahasiswa-btn ${disabledClass}" data-mahasiswa-id="${mahasiswa.id}" ${isOwner ? 'disabled' : ''}>
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        `;
                    }).join('');

                    selectedMahasiswaList.innerHTML = selectedHtml;
                    updateMahasiswaHiddenInputs();
                    
                    // Add event listeners to remove buttons
                    selectedMahasiswaList.querySelectorAll('.remove-mahasiswa-btn:not(.disabled)').forEach(btn => {
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            const mahasiswaId = this.getAttribute('data-mahasiswa-id');
                            removeMahasiswa(mahasiswaId);
                        });
                    });
                }

                // Remove mahasiswa
                function removeMahasiswa(mahasiswaId) {
                    const id = mahasiswaId.toString();
                    if (id === currentMahasiswaId) {
                        alert('Anda tidak dapat menghapus diri sendiri dari JSA ini');
                        return;
                    }
                    
                    const mahasiswa = selectedMahasiswa.get(id);
                    const mahasiswaNama = mahasiswa ? mahasiswa.nama : 'Mahasiswa';
                    
                    selectedMahasiswa.delete(id);
                    removePpeSection(id);
                    updateSelectedMahasiswaList();
                    updateSearchResults();
                    
                    showSuccessMessage(`${mahasiswaNama} berhasil dihapus`);
                }

                // Update search results (mahasiswa)
                function updateSearchResults() {
                    if (!searchResults) return;
                    
                    searchResults.querySelectorAll('.search-result-item').forEach(item => {
                        const mahasiswaId = item.dataset.id.toString();
                        const actionDiv = item.querySelector('.search-result-action');
                        const nimDiv = item.querySelector('.search-result-nim');
                        
                        if (selectedMahasiswa.has(mahasiswaId)) {
                            actionDiv.innerHTML = '<span style="color: #27ae60;">✓ Sudah dipilih</span>';
                        } else {
                            actionDiv.innerHTML = '<button type="button" class="btn btn-sm btn-primary add-mahasiswa-btn">Pilih</button>';
                        }
                        
                        if (mahasiswaId === currentMahasiswaId) {
                            nimDiv.textContent = `${item.dataset.nim} (Anda)`;
                        }
                    });

                    // Re-add event listeners to new buttons
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

                // Search mahasiswa
                function searchMahasiswa() {
                    if (!mahasiswaSearch) return;
                    
                    const searchTerm = mahasiswaSearch.value.trim();
                    console.log('Searching mahasiswa with term:', searchTerm);
                    if (searchTerm.length < 2) {
                        alert('Masukkan minimal 2 karakter untuk mencari');
                        return;
                    }

                    if (!searchResults) return;
                    
                    // Show loading
                    searchResults.innerHTML = '<div class="no-results loading">Mencari...</div>';
                    searchResults.classList.add('show');

                    fetch(`{{ route('api.search.mahasiswa') }}?search=${encodeURIComponent(searchTerm)}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            displaySearchResults(data);
                        })
                        .catch(error => {
                            console.error('Error searching mahasiswa:', error);
                            if (searchResults) {
                                searchResults.innerHTML = '<div class="no-results error">Terjadi kesalahan saat mencari</div>';
                            }
                        });
                }

                // Display mahasiswa search results
                function displaySearchResults(mahasiswas) {
                    if (!searchResults) return;
                    
                    if (mahasiswas.length === 0) {
                        searchResults.innerHTML = '<div class="no-results not-found">Tidak ada mahasiswa ditemukan</div>';
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
                                    ${isSelected ? '<span style="color: #27ae60;">✓ Sudah dipilih</span>' : '<button type="button" class="btn btn-sm btn-primary add-mahasiswa-btn">Pilih</button>'}
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

                // Search dosen
                function searchDosen() {
                    if (!dosenSearch) return;
                    
                    const searchTerm = dosenSearch.value.trim();
                    console.log('Searching dosen with term:', searchTerm);
                    
                    if (searchTerm.length < 2) {
                        alert('Masukkan minimal 2 karakter untuk mencari');
                        return;
                    }

                    if (!dosenSearchResults) return;

                    // Show loading
                    dosenSearchResults.innerHTML = '<div class="no-results loading">Mencari...</div>';
                    dosenSearchResults.classList.add('show');

                    const url = `{{ route('api.search.dosen') }}?search=${encodeURIComponent(searchTerm)}`;
                    
                    fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            displayDosenSearchResults(data);
                        })
                        .catch(error => {
                            console.error('Error searching dosen:', error);
                            if (dosenSearchResults) {
                                dosenSearchResults.innerHTML = '<div class="no-results error">Terjadi kesalahan saat mencari</div>';
                            }
                        });
                }

                // Display dosen search results
                function displayDosenSearchResults(dosens) {
                    if (!dosenSearchResults) return;
                    
                    if (dosens.length === 0) {
                        dosenSearchResults.innerHTML = '<div class="no-results not-found">Tidak ada dosen ditemukan</div>';
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
                                    ${isSelected ? '<span style="color: #27ae60;">✓ Sudah dipilih</span>' : '<button type="button" class="btn btn-sm btn-primary add-dosen-btn">Pilih</button>'}
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

                // Add dosen
                function addDosen(dosenId, dosenNip, dosenNama) {
                    console.log('Adding dosen:', { dosenId, dosenNip, dosenNama });
                    
                    const id = dosenId.toString();
                    if (selectedDosen.has(id)) {
                        alert('Dosen ini sudah dipilih');
                        return;
                    }

                    selectedDosen.set(id, { id, nip: dosenNip, nama: dosenNama });

                    console.log('Selected dosen after adding:', Array.from(selectedDosen.values()));
                    console.log('Selected dosen size:', selectedDosen.size);

                    updateSelectedDosenList();
                    updateDosenSearchResults();
                    
                    // Success message
                    const successMessage = document.createElement('div');
                    successMessage.className = 'success-message';
                    successMessage.textContent = `✓ ${dosenNama} berhasil ditambahkan`;
                    successMessage.style.cssText = 'position: fixed; top: 20px; right: 20px; background: linear-gradient(45deg, #27ae60, #2ecc71); color: white; padding: 10px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3); z-index: 9999; font-weight: 600; animation: slideIn 0.3s ease;';
                    
                    document.body.appendChild(successMessage);
                    
                    setTimeout(() => {
                        successMessage.style.animation = 'slideOut 0.3s ease';
                        setTimeout(() => {
                            if (successMessage.parentNode) {
                                successMessage.parentNode.removeChild(successMessage);
                            }
                        }, 300);
                    }, 2000);
                }

                // Update selected dosen list
                function updateSelectedDosenList() {
                    if (!selectedDosenList) return;
                    
                    if (selectedDosen.size === 0) {
                        selectedDosenList.innerHTML = '<div class="no-results not-found">Belum ada dosen yang dipilih</div>';
                        updateDosenHiddenInputs();
                        return;
                    }

                    const selectedHtml = Array.from(selectedDosen.values()).map(dosen => {
                        return `
                            <div class="selected-dosen-item" data-id="${dosen.id}">
                                <div class="selected-dosen-info">
                                    <div class="selected-dosen-nip">${dosen.nip}</div>
                                    <div class="selected-dosen-nama">${dosen.nama}</div>
                                </div>
                                <button type="button" class="remove-dosen-btn" data-dosen-id="${dosen.id}">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        `;
                    }).join('');

                    selectedDosenList.innerHTML = selectedHtml;
                    updateDosenHiddenInputs();
                    
                    // Add event listeners to remove buttons
                    selectedDosenList.querySelectorAll('.remove-dosen-btn').forEach(btn => {
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            const dosenId = this.getAttribute('data-dosen-id');
                            removeDosen(dosenId);
                        });
                    });
                }

                // Remove dosen
                function removeDosen(dosenId) {
                    const id = dosenId.toString();
                    const dosen = selectedDosen.get(id);
                    const dosenNama = dosen ? dosen.nama : 'Dosen';
                    
                    selectedDosen.delete(id);
                    updateSelectedDosenList();
                    updateDosenSearchResults();
                    
                    showSuccessMessage(`${dosenNama} berhasil dihapus`);
                }

                // Update dosen search results selections
                function updateDosenSearchResults() {
                    if (!dosenSearchResults) return;
                    
                    dosenSearchResults.querySelectorAll('.search-result-item').forEach(item => {
                        const id = item.dataset.id.toString();
                        const actionDiv = item.querySelector('.search-result-action');
                        
                        if (selectedDosen.has(id)) {
                            actionDiv.innerHTML = '<span style="color: #27ae60;">✓ Sudah dipilih</span>';
                        } else {
                            actionDiv.innerHTML = '<button type="button" class="btn btn-sm btn-primary add-dosen-btn">Pilih</button>';
                        }
                    });

                    // Re-add event listeners to new buttons
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

                // Function to add PPE section for selected mahasiswa
                function addPpeSection(mahasiswaId, mahasiswaLabel) {
                    try {
                        console.log('Adding PPE section for:', mahasiswaId, mahasiswaLabel);
                        
                        if (!ppeContainer) {
                            console.warn('PPE container not found');
                            return;
                        }
                        
                        if (!ppeTemplate) {
                            console.warn('PPE template not found');
                            return;
                        }
                        
                        // Clone template
                        const ppeItem = ppeTemplate.content.cloneNode(true);
                        const ppeDiv = ppeItem.querySelector('.ppe-section');
                        
                        if (!ppeDiv) {
                            console.error('PPE section div not found in template');
                            return;
                        }
                        
                        // Set data attributes and content
                        ppeDiv.setAttribute('data-mahasiswa-id', mahasiswaId);
                        
                        const ppeTitle = ppeDiv.querySelector('.ppe-title');
                        if (ppeTitle) {
                            ppeTitle.textContent = `APD untuk ${mahasiswaLabel}`;
                        }
                        
                        const mahasiswaIdInput = ppeDiv.querySelector('.mahasiswa-id-input');
                        if (mahasiswaIdInput) {
                            mahasiswaIdInput.value = mahasiswaId;
                        }
                        
                        // Set data-mahasiswa-id for all APD checkboxes
                        const apdCheckboxes = ppeDiv.querySelectorAll('.ppe-checkbox');
                        apdCheckboxes.forEach(checkbox => {
                            checkbox.setAttribute('data-mahasiswa-id', mahasiswaId);
                        });
                        
                        // Check if this is the current mahasiswa (owner)
                        const isOwner = mahasiswaId.toString() === currentMahasiswaId;
                        
                        // Add event listener for remove button (disable for owner)
                        const removeBtn = ppeDiv.querySelector('.btn-remove-ppe');
                        if (removeBtn) {
                            if (isOwner) {
                                removeBtn.style.display = 'none';
                                ppeDiv.classList.add('owner-ppe');
                            } else {
                                removeBtn.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    if (confirm(`Yakin ingin menghapus APD untuk ${mahasiswaLabel}?`)) {
                                        ppeDiv.remove();
                                        selectedMahasiswa.delete(mahasiswaId.toString());
                                        updateSelectedMahasiswaList();
                                        updateSearchResults();
                                    }
                                });
                            }
                        }
                        
                        // Add to container
                        ppeContainer.appendChild(ppeDiv);
                        console.log('PPE section added successfully');
                        
                    } catch (error) {
                        console.error('Error in addPpeSection:', error);
                    }
                }

                // Remove PPE section
                function removePpeSection(mahasiswaId) {
                    const ppeSection = document.querySelector(`.ppe-section[data-mahasiswa-id="${mahasiswaId}"]`);
                    if (ppeSection) {
                        ppeSection.remove();
                    }
                }

                // Success toast message
                function showSuccessMessage(message) {
                    const successMessage = document.createElement('div');
                    successMessage.className = 'success-message';
                    successMessage.textContent = `✓ ${message}`;
                    successMessage.style.cssText = 'position: fixed; top: 20px; right: 20px; background: linear-gradient(45deg, #27ae60, #2ecc71); color: white; padding: 10px 20px; border-radius: 8px; box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3); z-index: 9999; font-weight: 600; animation: slideIn 0.3s ease;';
                    
                    document.body.appendChild(successMessage);
                    
                    setTimeout(() => {
                        successMessage.style.animation = 'slideOut 0.3s ease';
                        setTimeout(() => {
                            if (successMessage.parentNode) {
                                successMessage.parentNode.removeChild(successMessage);
                            }
                        }, 300);
                    }, 2000);
                }

                // Add Work Step functionality
                function addWorkStep() {
                    if (!workStepInput || !workStepsList || !workStepTemplate) return;
                    
                    const stepText = workStepInput.value.trim();
                    if (!stepText) {
                        alert('Masukkan urutan pekerjaan');
                        return;
                    }

                    workStepCounter += 1;
                    const template = workStepTemplate.content.cloneNode(true);
                    const workStepDiv = template.querySelector('.work-step-item');
                    
                    workStepDiv.setAttribute('data-step-id', workStepCounter);
                    workStepDiv.querySelector('.step-number').textContent = workStepCounter;
                    workStepDiv.querySelector('.step-text').textContent = stepText;
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
                        } else {
                            detailsDiv.classList.add('show');
                            toggleBtn.textContent = 'Tutup Analisis';
                        }
                    });
                    
                    removeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        if (confirm('Yakin ingin menghapus urutan pekerjaan ini?')) {
                            workStepDiv.remove();
                            // Reorder step numbers
                            document.querySelectorAll('.work-step-item').forEach((item, index) => {
                                item.querySelector('.step-number').textContent = index + 1;
                            });
                        }
                    });
                    
                    workStepsList.appendChild(workStepDiv);
                    workStepInput.value = '';
                }

                // Add Inspection Area functionality
                function addInspectionArea() {
                    if (!inspectionAreaInput || !inspectionAreasList || !inspectionAreaTemplate) return;
                    
                    const areaText = inspectionAreaInput.value.trim();
                    if (!areaText) {
                        alert('Masukkan area inspeksi');
                        return;
                    }

                    inspectionAreaCounter += 1;
                    const template = inspectionAreaTemplate.content.cloneNode(true);
                    const inspectionAreaDiv = template.querySelector('.inspection-area-item');
                    
                    inspectionAreaDiv.setAttribute('data-area-id', inspectionAreaCounter);
                    inspectionAreaDiv.querySelector('.area-number').textContent = inspectionAreaCounter;
                    inspectionAreaDiv.querySelector('.area-text').textContent = areaText;
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
                        } else {
                            detailsDiv.classList.add('show');
                            toggleBtn.textContent = 'Tutup Tabel';
                        }
                    });
                    
                    removeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        if (confirm('Yakin ingin menghapus area inspeksi ini?')) {
                            inspectionAreaDiv.remove();
                            // Reorder area numbers
                            document.querySelectorAll('.inspection-area-item').forEach((item, index) => {
                                item.querySelector('.area-number').textContent = index + 1;
                            });
                        }
                    });
                    
                    addRowBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        addInspectionRow(inspectionAreaDiv);
                    });
                    
                    inspectionAreasList.appendChild(inspectionAreaDiv);
                    inspectionAreaInput.value = '';
                }

                // Add inspection row
                function addInspectionRow(areaDiv) {
                    const tbody = areaDiv.querySelector('tbody');
                    if (!tbody) return;
                    
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
                    
                    // Add event listener to remove button
                    const removeBtn = newRow.querySelector('.btn-remove-inspection-row');
                    removeBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        if (confirm('Yakin ingin menghapus baris ini?')) {
                            newRow.remove();
                        }
                    });
                }

                // Event listeners
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

                    let dosenSearchTimeout;
                    dosenSearch.addEventListener('input', function() {
                        clearTimeout(dosenSearchTimeout);
                        dosenSearchTimeout = setTimeout(() => {
                            if (this.value.trim().length >= 2) {
                                searchDosen();
                            } else if (dosenSearchResults) {
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

                    let searchTimeout;
                    mahasiswaSearch.addEventListener('input', function() {
                        clearTimeout(searchTimeout);
                        searchTimeout = setTimeout(() => {
                            if (this.value.trim().length >= 2) {
                                searchMahasiswa();
                            } else if (searchResults) {
                                searchResults.classList.remove('show');
                            }
                        }, 500);
                    });
                }

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

                // Close dropdowns when clicking outside
                document.addEventListener('click', function(e) {
                    if (dosenSearchResults && !dosenSearch.contains(e.target) && !dosenSearchResults.contains(e.target)) {
                        dosenSearchResults.classList.remove('show');
                    }
                    if (searchResults && !mahasiswaSearch.contains(e.target) && !searchResults.contains(e.target)) {
                        searchResults.classList.remove('show');
                    }
                });

                // Auto-select owner mahasiswa (cannot be removed)
                if (currentMahasiswaId && !selectedMahasiswa.has(currentMahasiswaId)) {
                    selectedMahasiswa.set(currentMahasiswaId, {
                        id: currentMahasiswaId,
                        nim: currentMahasiswaNim,
                        nama: currentMahasiswaNama,
                        isOwner: true
                    });
                    addPpeSection(currentMahasiswaId, `${currentMahasiswaNim} - ${currentMahasiswaNama}`);
                }

                // Initialize selected lists
                updateSelectedMahasiswaList();
                updateSelectedDosenList();

                // Debug button functionality
                const debugBtn = document.getElementById('debugBtn');
                const form = document.getElementById('jsaForm');
                if (debugBtn) {
                    debugBtn.addEventListener('click', function() {
                        const debugPanel = document.getElementById('debugPanel');
                        const debugContent = document.getElementById('debugContent');
                        if (debugPanel && debugContent) {
                            debugPanel.style.display = debugPanel.style.display === 'none' ? 'block' : 'none';
                            if (debugPanel.style.display === 'block') {
                                debugContent.innerHTML = `
                                    <p><strong>Selected Dosen IDs:</strong> ${Array.from(selectedDosen.keys()).join(', ') || 'None'}</p>
                                    <p><strong>Selected Dosen Names:</strong> ${Array.from(selectedDosen.values()).map(d => d.nama).join(', ') || 'None'}</p>
                                    <p><strong>Selected Mahasiswa IDs:</strong> ${Array.from(selectedMahasiswa.keys()).join(', ') || 'None'}</p>
                                    <p><strong>Work Steps Count:</strong> ${document.querySelectorAll('.work-step-item').length}</p>
                                    <p><strong>Inspection Areas Count:</strong> ${document.querySelectorAll('.inspection-area-item').length}</p>
                                    <p><strong>Form Action:</strong> ${form.action}</p>
                                    <p><strong>Form Method:</strong> ${form.method}</p>
                                    <p><strong>Dosen Inputs in DOM:</strong> ${document.querySelectorAll('input[name="dosens[]"]').length}</p>
                                    <p><strong>Mahasiswa Inputs in DOM:</strong> ${document.querySelectorAll('input[name="mahasiswas[]"]').length}</p>
                                    <p><strong>Dosen Container:</strong> ${document.getElementById('dosenInputs') ? 'Found' : 'Not Found'}</p>
                                    <p><strong>Selected Dosen Size:</strong> ${selectedDosen.size}</p>
                                    <p><strong>Required Fields:</strong></p>
                                    <ul>
                                        <li>Semester: ${document.getElementById('semester')?.value || 'Empty'}</li>
                                        <li>Mata Kuliah: ${document.getElementById('matakuliah')?.value || 'Empty'}</li>
                                        <li>Kelas: ${document.getElementById('kelas')?.value || 'Empty'}</li>
                                        <li>Nama Pekerjaan: ${document.getElementById('nama_pekerjaan')?.value || 'Empty'}</li>
                                        <li>Lokasi: ${document.getElementById('lokasi_pekerjaan')?.value || 'Empty'}</li>
                                        <li>Tanggal: ${document.getElementById('tanggal_pelaksanaan')?.value || 'Empty'}</li>
                                    </ul>
                                `;
                            }
                        }
                    });
                }

                // Form submission
                if (form) {
                    // Ensure form action is correct
                    if (!form.action || form.action === window.location.href) {
                        form.action = '{{ route("mahasiswa.tambahjsa.store") }}';
                    }
                    
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        console.log('Form submission started...');
                        
                        // Sync hidden inputs for selected mahasiswa and dosen
                        const mahasiswaInputs = document.getElementById('mahasiswaInputs');
                        const dosenInputsContainer = document.getElementById('dosenInputs');
                        
                        if (mahasiswaInputs) {
                            mahasiswaInputs.innerHTML = '';
                            console.log('Creating mahasiswa inputs for', selectedMahasiswa.size, 'mahasiswa');
                            selectedMahasiswa.forEach(mahasiswa => {
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = 'mahasiswas[]';
                                input.value = mahasiswa.id;
                                mahasiswaInputs.appendChild(input);
                            });
                        }
                        
                        if (dosenInputsContainer) {
                            dosenInputsContainer.innerHTML = '';
                            console.log('Creating dosen inputs for', selectedDosen.size, 'dosen');
                            selectedDosen.forEach((dosen, key) => {
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = 'dosens[]';
                                input.value = key; // key = dosenId
                                dosenInputsContainer.appendChild(input);
                            });
                        } else {
                            console.error('dosenInputsContainer not found!');
                        }
                        
                        // Additional validation for required fields
                        const semester = document.getElementById('semester')?.value?.trim();
                        const matakuliah = document.getElementById('matakuliah')?.value?.trim();
                        const kelas = document.getElementById('kelas')?.value?.trim();
                        const namaPekerjaan = document.getElementById('nama_pekerjaan')?.value?.trim();
                        const lokasiPekerjaan = document.getElementById('lokasi_pekerjaan')?.value?.trim();
                        const tanggalPelaksanaan = document.getElementById('tanggal_pelaksanaan')?.value?.trim();

                        if (!semester) {
                            alert('⚠️ Semester harus diisi!');
                            document.getElementById('semester')?.focus();
                            return;
                        }

                        if (!matakuliah) {
                            alert('⚠️ Mata kuliah harus diisi!');
                            document.getElementById('matakuliah')?.focus();
                            return;
                        }

                        if (!kelas) {
                            alert('⚠️ Kelas harus diisi!');
                            document.getElementById('kelas')?.focus();
                            return;
                        }

                        if (!namaPekerjaan) {
                            alert('⚠️ Nama pekerjaan harus diisi!');
                            document.getElementById('nama_pekerjaan')?.focus();
                            return;
                        }

                        if (!lokasiPekerjaan) {
                            alert('⚠️ Lokasi pekerjaan harus diisi!');
                            document.getElementById('lokasi_pekerjaan')?.focus();
                            return;
                        }

                        if (!tanggalPelaksanaan) {
                            alert('⚠️ Tanggal pelaksanaan harus diisi!');
                            document.getElementById('tanggal_pelaksanaan')?.focus();
                            return;
                        }

                        // Validate selections
                        if (selectedDosen.size === 0) {
                            alert('⚠️ Minimal harus memilih satu dosen pembimbing!');
                            return;
                        }
                        
                        if (selectedMahasiswa.size === 0) {
                            alert('⚠️ Minimal harus memilih satu mahasiswa!');
                            return;
                        }

                        // Validate work steps
                        const workSteps = document.querySelectorAll('.work-step-item');
                        if (workSteps.length === 0) {
                            alert('⚠️ Minimal harus ada satu urutan pekerjaan!');
                            return;
                        }

                        // Validate inspection areas
                        const inspectionAreas = document.querySelectorAll('.inspection-area-item');
                        if (inspectionAreas.length === 0) {
                            alert('⚠️ Minimal harus ada satu area inspeksi!');
                            return;
                        }
                        
                        // Show loading state
                        const submitBtn = document.getElementById('submitBtn');
                        if (submitBtn) {
                            submitBtn.disabled = true;
                            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                        }
                        
                        // Submit form
                        console.log('Submitting form...');
                        form.submit();
                    });
                }

                console.log('JSA Form initialization completed successfully');
                
            } catch (error) {
                console.error('Error in JSA form initialization:', error);
                // Show user-friendly error message
                const errorDiv = document.createElement('div');
                errorDiv.className = 'alert alert-danger';
                errorDiv.innerHTML = `
                    <i class="fas fa-exclamation-triangle"></i> 
                    Terjadi kesalahan saat memuat halaman. Silakan refresh halaman ini.
                    <br><small>Error: ${error.message}</small>
                `;
                errorDiv.style.cssText = 'position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; max-width: 500px; background: rgba(220, 53, 69, 0.9); color: white; padding: 15px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);';
                document.body.appendChild(errorDiv);
                
                setTimeout(() => {
                    if (errorDiv.parentNode) {
                        errorDiv.remove();
                    }
                }, 10000);
            }
        });
    </script>
</body>
</html>
