<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Unified login method untuk menangani login dosen dan mahasiswa
    public function unifiedLogin(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        $identifier = $request->identifier;
        $password = $request->password;

        // Cek apakah identifier adalah NIP (dosen) atau NIM (mahasiswa)
        // Biasanya NIP lebih pendek dan NIM lebih panjang
        // Atau bisa juga berdasarkan format tertentu
        
        // Coba login sebagai dosen terlebih dahulu
        if (Auth::guard('dosen')->attempt(['nip' => $identifier, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('/dosen/dashboard');
        }

        // Jika bukan dosen, coba login sebagai mahasiswa
        if (Auth::guard('mahasiswa')->attempt(['nim' => $identifier, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect('/mahasiswa/dashboard');
        }

        // Jika keduanya gagal, kembali dengan error
        return back()->withErrors([
            'identifier' => 'NIP/NIM atau password salah.',
        ])->withInput($request->only('identifier'));
    }
}
