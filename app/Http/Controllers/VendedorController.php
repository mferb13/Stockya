<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index()
    {
        return view('roles.vendedor.vendedor');
    }

    public function registrarVenta()
    {
        return view('roles.vendedor.registrarVenta');
    }
}
