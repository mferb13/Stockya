<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            // Redirige a tu ruta de login personalizada
            return redirect()->route('iniciarSesion');
        }

        return $next($request);
    }
}
