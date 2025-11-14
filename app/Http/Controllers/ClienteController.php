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
        $usuario  = auth()->user();
        $producto = Producto::findOrFail($id);

        $item = Carrito::firstOrCreate(
            [
                'usuario_id'  => $usuario->id,
                'producto_id' => $producto->id,
            ],
            ['cantidad' => 0]
        );

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

    /**
     * Pedidos del cliente:
     * - GET  -> muestra los pedidos
     * - POST -> finaliza compra (crea pedidos a partir del carrito)
     */
    public function pedidos(Request $request)
    {
        $usuario = auth()->user();

        // Si viene por POST, asumimos que es "Finalizar compra"
        if ($request->isMethod('post')) {

            // Traer carrito del usuario con productos
            $carrito = $usuario->carrito()->with('producto')->get();

            if ($carrito->isEmpty()) {
                return redirect()->back()->with('error', 'Tu carrito está vacío.');
            }

            foreach ($carrito as $item) {
                // Crear un pedido por cada producto en el carrito
                Pedido::create([
                    'usuario_id'  => $usuario->id,
                    'producto_id' => $item->producto_id,
                    'cantidad'    => $item->cantidad,
                    'total'       => $item->cantidad * $item->producto->precio,
                    // agrega más campos si tu tabla pedidos los tiene
                ]);
            }

            // Vaciar carrito del usuario
            Carrito::where('usuario_id', $usuario->id)->delete();

            return redirect()
                ->route('cliente.pedidos')
                ->with('success', 'Compra realizada correctamente.');
        }

        // Si viene por GET, solo mostramos los pedidos
        $pedidos = $usuario->pedidos()->with('producto')->get();

        return view('roles.cliente.pedidos', compact('pedidos'));
    }
}
