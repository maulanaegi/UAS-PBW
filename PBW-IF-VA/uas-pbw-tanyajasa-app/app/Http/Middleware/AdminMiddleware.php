<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna terautentikasi dan memiliki role 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman yang sesuai (misalnya halaman error atau home)
        return redirect('/home'); // atau ke halaman lain sesuai kebutuhan
    }
}
