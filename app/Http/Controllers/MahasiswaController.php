<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    // Halaman dashboard mahasiswa 
    public function dashboard()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }

    /**
     * Tampilkan profil mahasiswa
     */
    public function profile()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        return view('mahasiswa.profile', compact('mahasiswa'));
    }

    /**
     * Tampilkan form edit profil mahasiswa
     */
    public function editProfile()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        return view('mahasiswa.edit-profile', compact('mahasiswa'));
    }

    /**
     * Update profil mahasiswa
     */
    public function updateProfile(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        
        $request->validate([
            'nama' => 'required|string|max:255',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);
        
        $data = [
            'nama' => $request->nama,
        ];
        
        // Update password jika diisi
        if ($request->filled('new_password')) {
            $data['password'] = Hash::make($request->new_password);
        }
        
        $mahasiswa->update($data);
        
        return redirect()->route('mahasiswa.profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // Proses logout mahasiswa
    public function logout(Request $request)
    {
        Auth::guard('mahasiswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
