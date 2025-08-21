<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{


    // Proses logout mahasiswa
    public function logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Halaman dashboard mahasiswa 
    public function dashboard()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }
}
