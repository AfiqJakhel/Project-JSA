<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JSAController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home');
})->middleware('prevent.back');

// Login routes
Route::get('/login', function () {
    return view('home');
})->name('login');

// Unified login route
Route::post('/login', [Controller::class, 'unifiedLogin'])->name('login.unified');

// Register dosen routes
Route::get('/register-dosen', [Controller::class, 'showRegisterDosen'])->name('register.dosen');
Route::post('/register-dosen', [Controller::class, 'registerDosen'])->name('register.dosen.store');

// Mahasiswa
Route::prefix('mahasiswa')->controller(MahasiswaController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('mahasiswa.dashboard')->middleware(['auth:mahasiswa', 'role:mahasiswa', 'log.activity']);
    Route::get('/profile', 'profile')->name('mahasiswa.profile')->middleware(['auth:mahasiswa', 'role:mahasiswa', 'log.activity']);
    Route::get('/profile/edit', 'editProfile')->name('mahasiswa.edit-profile')->middleware(['auth:mahasiswa', 'role:mahasiswa', 'log.activity']);
    Route::post('/profile/update', 'updateProfile')->name('mahasiswa.update-profile')->middleware(['auth:mahasiswa', 'role:mahasiswa', 'log.activity']);
    Route::post('/logout', 'logout')->name('mahasiswa.logout')->middleware('auth:mahasiswa');
});

// Endpoint data untuk dashboard (AJAX)
Route::get('/mahasiswa/jsa-data', [JSAController::class, 'getForMahasiswa'])->middleware(['auth:mahasiswa', 'role:mahasiswa']);

// API untuk mata kuliah berdasarkan semester dan kelas
Route::get('/api/mata-kuliah/{semester}/{kelas}', [JSAController::class, 'getMataKuliah'])->name('api.mata-kuliah');

Route::middleware(['auth:mahasiswa', 'role:mahasiswa', 'log.activity'])->group(function () {
    // Tampilkan form tambah JSA (mengirim data mahasiswa & dosen ke view)
    Route::get('/mahasiswa/tambahjsa', [JSAController::class, 'create'])->name('mahasiswa.tambahjsa');

    // Simpan JSA (aksi form)
    Route::post('/mahasiswa/tambahjsa', [JSAController::class, 'store'])->name('mahasiswa.tambahjsa.store');

    // Tampilkan halaman detail (view)
    Route::get('/mahasiswa/detailjsa/{id}', [JSAController::class, 'detailView'])->name('mahasiswa.detailjsa');

    // Update JSA via form (memanggil method update yang sudah ada di controller)
    Route::put('/mahasiswa/jsa/{id}', [JSAController::class, 'update'])->name('mahasiswa.jsa.update');

    // Optional: hapus sudah ada sebelumnya
    Route::delete('/mahasiswa/jsa/{id}', [JSAController::class, 'destroy'])->name('mahasiswa.jsa.destroy');
    
    Route::get('/api/race-condition-stats', [JSAController::class, 'getRaceConditionStats'])->name('api.race.condition.stats')->middleware('throttle:30,1');
    Route::post('/api/clear-jsa-cache', [JSAController::class, 'clearJsaCountCache'])->name('api.clear.jsa.cache')->middleware('throttle:10,1');
});

// API untuk search mahasiswa dan dosen (tidak perlu auth)
Route::get('/api/search-mahasiswa', [JSAController::class, 'searchMahasiswa'])->name('api.search.mahasiswa')->middleware('throttle:60,1');
Route::get('/api/search-dosen', [JSAController::class, 'searchDosen'])->name('api.search.dosen')->middleware('throttle:60,1');

// API untuk get JSA count (tidak perlu auth karena digunakan untuk preview)
Route::get('/api/get-jsa-count', [JSAController::class, 'getJsaCount'])->name('api.get.jsa.count')->middleware('throttle:120,1');

// Dosen
Route::prefix('dosen')->controller(DosenController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dosen.dashboard')->middleware(['auth', 'role:dosen', 'log.activity']);
    Route::get('/jsa/{id}', 'detailJsa')->name('dosen.detailjsa')->middleware(['auth', 'role:dosen', 'log.activity']);
    Route::post('/jsa/{id}/approve', 'approveJsa')->name('dosen.approvejsa')->middleware(['auth', 'role:dosen', 'log.activity']);
    Route::post('/jsa/{id}/reject', 'rejectJsa')->name('dosen.rejectjsa')->middleware(['auth', 'role:dosen', 'log.activity']);
    Route::get('/profile', 'profile')->name('dosen.profile')->middleware(['auth', 'role:dosen', 'log.activity']);
    Route::get('/profile/edit', 'editProfile')->name('dosen.edit-profile')->middleware(['auth', 'role:dosen', 'log.activity']);
    Route::post('/profile/update', 'updateProfile')->name('dosen.update-profile')->middleware(['auth', 'role:dosen', 'log.activity']);
    Route::post('/logout', 'logout')->name('dosen.logout')->middleware('auth');
});