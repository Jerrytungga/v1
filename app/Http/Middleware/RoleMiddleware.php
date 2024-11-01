<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah role yang disimpan dalam session sama dengan role yang diminta
        if (Session::get('role') !== $role) {
            // Jika tidak sama, redirect ke halaman lain, misalnya halaman home
            return redirect()->back()->withErrors('You do not have access to that page.');
        }
        // Jika role sesuai, lanjutkan request
        return $next($request);
    }
}