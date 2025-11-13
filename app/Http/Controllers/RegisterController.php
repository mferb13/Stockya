<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Mostrar formulario de registro
    public function showForm()
    {
        return view('registro');
    }

    // Registrar usuario
    public function register(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'cedula' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'required|string|in:cliente,mayorista,vendedor,admin',
        ]);

        // Crear usuario
        $user = User::create([
            'name' => $validated['nombre'] . ' ' . $validated['apellido'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['rol'],
        ]);

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Redirigir según rol con alerta
        return match ($user->role) {
            'admin' => redirect()->route('admin.panel')->with('success', 'Bienvenido, Administrador'),
            'mayorista' => redirect()->route('mayorista.panel')->with('success', 'Bienvenido, Mayorista'),
            'cliente' => redirect()->route('cliente.productos')->with('success', 'Bienvenido, Cliente'),
            'vendedor' => redirect()->route('vendedor.panel')->with('success', 'Bienvenido, Vendedor'),
            default => redirect()->route('principal')->with('info', 'Rol no reconocido, redirigido al inicio'),
        };
    }
}
