<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MayoristaController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactoController;

/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/', fn() => view('principal'))->name('principal');

// Registro
Route::get('/registro', [RegisterController::class, 'showForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.submit');

// Login / Logout
Route::get('/iniciar-sesion', [AuthController::class, 'showLoginForm'])->name('iniciarSesion');
Route::post('/iniciar-sesion', [AuthController::class, 'login'])->name('iniciarSesion.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Vistas públicas
Route::view('/servicios', 'servicios')->name('servicios');
Route::view('/contacto', 'contacto')->name('contacto');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.send');

/*
|--------------------------------------------------------------------------
| RUTAS PROTEGIDAS (solo usuarios autenticados)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /* --------------------- ADMIN --------------------- */
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.panel');

    Route::get('/admin/registro-ventas', [AdminController::class, 'registroVentas'])
        ->middleware('role:admin')
        ->name('admin.registroVentas');

    /* -------------------- VENDEDOR -------------------- */
    Route::get('/vendedor', [VendedorController::class, 'index'])
        ->middleware('role:vendedor')
        ->name('vendedor.panel');

    Route::get('/vendedor/registrar-venta', [VendedorController::class, 'registrarVenta'])
        ->middleware('role:vendedor')
        ->name('vendedor.registrarVenta');

    /* -------------------- CLIENTE -------------------- */
    Route::prefix('cliente')->middleware('role:cliente')->name('cliente.')->group(function () {

        Route::get('/productos', [ClienteController::class, 'productos'])->name('productos');

        Route::get('/carrito', [ClienteController::class, 'carrito'])->name('carrito');
        Route::post('/carrito/agregar/{id}', [ClienteController::class, 'agregarAlCarrito'])->name('carrito.agregar');
        Route::post('/carrito/actualizar/{id}', [ClienteController::class, 'actualizarCarrito'])->name('carrito.actualizar');
        Route::delete('/carrito/eliminar/{id}', [ClienteController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');

        // ⚠ FIX: ACEPTAR GET y POST PARA LA RUTA PEDIDOS
        Route::match(['get', 'post'], '/pedidos', [ClienteController::class, 'pedidos'])->name('pedidos');
    });

    /* ------------------- MAYORISTA ------------------- */
    Route::prefix('mayorista')->middleware('role:mayorista')->name('mayorista.')->group(function () {
        Route::get('/', [MayoristaController::class, 'index'])->name('panel');
        Route::post('/solicitar/{id}', [MayoristaController::class, 'solicitarPedido'])->name('solicitar');
        Route::get('/pedidos', [MayoristaController::class, 'pedidos'])->name('pedidos');
    });

    /* -------- Dashboard dinámico según rol -------- */
    Route::get('/dashboard', function () {
        $user = auth()->user();
        return match ($user->role) {
            'admin' => redirect()->route('admin.panel'),
            'mayorista' => redirect()->route('mayorista.panel'),
            'vendedor' => redirect()->route('vendedor.panel'),
            'cliente' => redirect()->route('cliente.productos'),
            default => redirect()->route('principal'),
        };
    })->name('dashboard');

    /* -------- Ruta de perfil (placeholder) -------- */
    Route::get('/perfil', function () {
        return redirect()->back()->with('info', 'Función de perfil no implementada.');
    })->name('profile');
});
