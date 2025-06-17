<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->utype === "ADM") {
                return $next($request);
            } else {
                Session::flush(); // Cierra sesión del usuario no admin
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login'); // Usuario no autenticado
        }
    }
}
