<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('iniciarSesion');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','string','min:8'],
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return match($user->role) {
                'admin' => redirect()->route('admin.panel')->with('success','Bienvenido, Administrador.'),
                'mayorista' => redirect()->route('mayorista.panel')->with('success','Bienvenido, Mayorista.'),
                'vendedor' => redirect()->route('vendedor.panel')->with('success','Bienvenido, Vendedor.'),
                'cliente' => redirect()->route('cliente.productos')->with('success','Bienvenido a nuestro catálogo.'),
                default => redirect()->route('principal')->with('info','Rol no reconocido.'),
            };
        }

        return back()->withErrors(['email'=>'Credenciales inválidas.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('principal')->with('success','Sesión cerrada correctamente.');
    }
}
