<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login dan memiliki role Admin
        if (Auth::check() && Auth::user()->role === 'Admin') {
            return $next($request);
        }

        // Jika bukan admin, tendang kembali ke dashboard user
        return redirect()->route('dashboard')->withErrors('Anda tidak memiliki akses ke halaman Admin.');
    }
}