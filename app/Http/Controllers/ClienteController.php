<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\Pedido;

class ClienteController extends Controller
{
    // Vista de productos
    public function productos()
    {
        $productos = Producto::all();
        return view('roles.cliente.productos', compact('productos'));
    }

    // Vista del carrito
    public function carrito()
    {
        $usuario = auth()->user();
        $carrito = $usuario->carrito()->with('producto')->get();
        return view('roles.cliente.carrito', compact('carrito'));
    }

    // Agregar producto al carrito
    public function agregarAlCarrito($id)
    {
        $usuario = auth()->user();
        $producto = Producto::findOrFail($id);

        $item = Carrito::firstOrCreate([
            'usuario_id' => $usuario->id,
            'producto_id' => $producto->id
        ], ['cantidad' => 0]);

        $item->increment('cantidad');

        return redirect()->back()->with('success', "{$producto->nombre} fue agregado al carrito.");
    }

    // Actualizar cantidad del carrito
    public function actualizarCarrito(Request $request, $id)
    {
        $item = Carrito::findOrFail($id);
        $item->cantidad = $request->cantidad;
        $item->save();

        return redirect()->back()->with('success', 'Carrito actualizado.');
    }

    // Eliminar producto del carrito
    public function eliminarDelCarrito($id)
    {
        $item = Carrito::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    // Vista de pedidos del cliente
    public function pedidos()
    {
        $usuario = auth()->user();
        $pedidos = $usuario->pedidos()->with('producto')->get();
        return view('roles.cliente.pedidos', compact('pedidos'));
    }
}
