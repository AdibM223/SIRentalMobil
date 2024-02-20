<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('loginAdmin');
        }

        if (Auth::user()->role == 'Pelanggan') {
            return redirect()->route('dashboardPelanggan');
        }

        if (Auth::user()->role == 'Admin') {
            return $next($request);
        }
    }
}
