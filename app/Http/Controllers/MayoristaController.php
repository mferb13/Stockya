<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Pedido;

class MayoristaController extends Controller
{
    // Página principal: catálogo
    public function index()
    {
        $productos = Producto::all();
        return view('roles.mayorista.catalogo', compact('productos'));
    }

    public function pedidos()
    {
        $pedidos = auth()->user()->pedidos()->with('producto')->get();
        return view('roles.mayorista.pedidos', compact('pedidos'));
    }

    // Solicitar un pedido
    public function solicitarPedido($id)
    {
        $producto = Producto::findOrFail($id);

        Pedido::create([
            'usuario_id' => auth()->id(),
            'producto_id' => $producto->id,
            'cantidad' => 1,
            'total' => $producto->precio,
            'estado' => 'En proceso'
        ]);

        return redirect()->back()->with('success', 'Pedido solicitado con éxito.');
    }
}
