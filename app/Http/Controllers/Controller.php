<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Mail\DosenWelcomeMail;

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

        // Cek apakah identifier adalah email (dosen) atau NIM (mahasiswa)
        // Coba login sebagai dosen terlebih dahulu (menggunakan email)
        $dosen = User::where('email', $identifier)->where('role', 'dosen')->first();
        if ($dosen && Hash::check($password, $dosen->password)) {
            Auth::login($dosen);
            $request->session()->regenerate();
            return redirect('/dosen/dashboard');
        }

        // Jika bukan dosen, coba login sebagai mahasiswa
        $mahasiswa = Mahasiswa::where('nim', $identifier)->first();
        if ($mahasiswa && Hash::check($password, $mahasiswa->password)) {
            Auth::guard('mahasiswa')->login($mahasiswa);
            $request->session()->regenerate();
            return redirect('/mahasiswa/dashboard');
        }

        // Jika keduanya gagal, kembali dengan error
        return back()->withErrors([
            'identifier' => 'Email/NIM atau password salah.',
        ])->withInput($request->only('identifier'));
    }

    // Show register dosen form
    public function showRegisterDosen()
    {
        return view('auth.register-dosen');
    }

    // Register dosen
    public function registerDosen(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|exists:users,email'
        ]);

        // Cek apakah email sudah digunakan untuk akun dosen
        $existingUser = User::where('email', $request->email)->first();

        // Izinkan register jika user adalah dosen TAPI passwordnya NULL
        if ($existingUser && $existingUser->role === 'dosen' && $existingUser->password !== null) {
            return back()->withErrors([
                'email' => 'Email ini sudah terdaftar sebagai dosen dan sudah memiliki password. Silakan login atau gunakan email lain.'
            ])->withInput($request->only('name', 'email'));
        }

        // Generate password acak
        $randomPassword = Str::random(8);

        // Update user yang sudah ada (karena validasi 'exists:users,email' memastikan user selalu ada)
        $existingUser->update([
            'name' => $request->name, // Update name
            'role' => 'dosen', // Pastikan role diatur ke 'dosen'
            'password' => Hash::make($randomPassword),
            'email_verified_at' => now(), // Tandai sebagai verified
        ]);
        $user = $existingUser; // Gunakan user yang sudah diupdate

        // Kirim email dengan password
        try {
            Mail::to($request->email)->send(new DosenWelcomeMail($user, $randomPassword));
            return redirect('/')->with('success', 'Registrasi berhasil! Password telah dikirim ke email Anda.');
        } catch (\Exception $e) {
            // Jika email gagal, tampilkan password langsung
            return view('auth.register-success', [
                'user' => $user,
                'password' => $randomPassword
            ]);
        }
    }
}
