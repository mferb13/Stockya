<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // ========================
        // 🔹 ALIAS DE MIDDLEWARES
        // ========================
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,   // 👈 Tu middleware personalizado
            'auth' => \Illuminate\Auth\Middleware\Authenticate::class, // 👈 Necesario para rutas protegidas
        ]);

        // Si quieres aplicar un middleware global, podrías hacerlo así:
        // $middleware->append(\App\Http\Middleware\CheckForMaintenanceMode::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
