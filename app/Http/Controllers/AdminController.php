<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('roles.admin.admin');
    }

    // Método para mostrar la vista de registro de ventas
    public function registroVentas()
    {
        return view('roles.admin.adminRegistroVentas'); // tu nuevo blade
    }
}
