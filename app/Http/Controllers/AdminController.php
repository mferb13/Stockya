<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;

class AdminController extends Controller
{
    public function index()
    {
        return view('roles.admin.admin');
    }

    // Método para mostrar la vista de registro de ventas
    public function registroVentas()
    {
        return view('roles.admin.adminRegistroVentas'); // tu blade de registro de ventas
    }

    // Método para registrar una nueva venta
    public function registrarVenta(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'productos'  => 'required|json',
            'total'      => 'required|numeric',
            'medio_pago' => 'required|string',
        ]);

        // Crear una nueva venta
        $venta = new Venta();
        $venta->productos  = $request->input('productos');
        $venta->total      = $request->input('total');
        $venta->medio_pago = $request->input('medio_pago');
        $venta->save();

        // Retornar una respuesta JSON
        return response()->json(['message' => 'Venta registrada correctamente'], 201);
    }

    // Método para obtener las ventas por fecha
    public function obtenerVentas(Request $request)
    {
        $fecha  = $request->input('fecha');
        $ventas = Venta::whereDate('created_at', $fecha)->get(); // Asegúrate de tener 'created_at' en la tabla

        return response()->json($ventas);
    }
}
