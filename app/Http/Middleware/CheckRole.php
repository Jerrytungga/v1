<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Session::has('role')) {
            return redirect()->route('auth.index')->withErrors('Sesi Anda telah berakhir, silakan login kembali.');
        }

        return $next($request);
        
        // Periksa apakah session role ada dan sesuai
        if (Session::get('role') !== $role) {
            // Jika tidak sesuai, redirect ke halaman login atau halaman lain
            return redirect()->route('auth.index')->withErrors('Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
