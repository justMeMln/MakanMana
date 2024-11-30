<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSessionTimeout
{
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            $lastActivity = session('last_activity');
            $now = now()->timestamp;

            // Periksa apakah sesi sudah lebih dari 1 jam
            if ($lastActivity && ($now - $lastActivity > 3600)) {
                Auth::logout(); // Logout pengguna
                session()->invalidate(); // Hapus sesi
                session()->regenerateToken(); // Regenerasi token CSRF

                return redirect()->route('user.login')->with('error', 'Sesi Anda telah berakhir. Silakan login ulang.');
            }

            // Perbarui waktu aktivitas terakhir
            session(['last_activity' => $now]);
        }

        return $next($request);
    }
}
