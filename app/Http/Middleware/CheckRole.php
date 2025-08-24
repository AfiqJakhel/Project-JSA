<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect('/');
        }

        // Cek role yang diizinkan
        if ($role === 'dosen') {
            if (!Auth::check() || Auth::user()->role !== 'dosen') {
                return redirect('/mahasiswa/dashboard')->with('error', 'Akses ditolak. Anda bukan dosen.');
            }
        } elseif ($role === 'mahasiswa') {
            if (!Auth::guard('mahasiswa')->check()) {
                return redirect('/dosen/dashboard')->with('error', 'Akses ditolak. Anda bukan mahasiswa.');
            }
        }

        return $next($request);
    }
}
