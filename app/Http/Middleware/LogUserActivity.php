<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Catat aktivitas user
        if (Auth::check()) {
            $user = Auth::user();
            $userType = Auth::guard('dosen')->check() ? 'Dosen' : 'Mahasiswa';
            $userName = $user->nama ?? 'Unknown';
            $userIdentifier = Auth::guard('dosen')->check() ? $user->nip : $user->nim;
            
            Log::info("User Activity", [
                'user_type' => $userType,
                'user_name' => $userName,
                'user_id' => $userIdentifier,
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()
            ]);
        }

        return $next($request);
    }
}
