<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InactivityLogout
{
    public function handle($request, Closure $next)
    {
        // Waktu tidak aktif maksimal dalam detik (contoh: 15 menit)
        $maxInactivityTime = 10 * 60;

        // Ambil waktu terakhir pengguna aktif
        $lastActivity = Session::get('last_activity_time');

        if ($lastActivity && (time() - $lastActivity) > $maxInactivityTime) {
            Auth::logout();
            Session::flush(); // Hapus semua session

            if ($request->expectsJson()) {
                return response()->json(['status' => 'logout'], 401);
            }

            return redirect('/'); // Kembali ke halaman landing
        }

        // Perbarui waktu terakhir aktif
        Session::put('last_activity_time', time());

        return $next($request);
    }
}
