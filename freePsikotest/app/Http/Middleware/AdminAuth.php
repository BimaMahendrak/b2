<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Cek session 'admin'
        if (!session('admin')) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}