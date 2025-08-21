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
});



// Unified login route
Route::post('/login', [Controller::class, 'unifiedLogin'])->name('login.unified');

// Mahasiswa
Route::prefix('mahasiswa')->controller(MahasiswaController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('mahasiswa.dashboard');
    Route::post('/logout', 'logout')->name('mahasiswa.logout');
});

// Endpoint data untuk dashboard (AJAX)
Route::get('/mahasiswa/jsa-data', [JSAController::class, 'getForMahasiswa'])->middleware('auth:mahasiswa');

Route::middleware('auth:mahasiswa')->group(function () {
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
Route::prefix('dosen')->group(function () {
    Route::get('/dashboard', function () {
        return view('dosen.dashboard');
    })->name('dosen.dashboard');
    Route::post('/logout', [DosenController::class, 'logout'])->name('dosen.logout');
});