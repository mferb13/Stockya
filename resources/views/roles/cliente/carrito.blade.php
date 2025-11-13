@extends('layouts.cliente')

@section('contenido')
<h1 class="titulo-seccion">🛒 Mi Carrito</h1>

@if($carrito->isEmpty())
    <p class="carrito-vacio">
        Tu carrito está vacío. 
        <a href="{{ route('cliente.productos') }}" class="boton-naranja">Ver productos</a>
    </p>
@else
<div class="tabla-carrito">
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carrito as $item)
            <tr>
                <td class="col-producto">
                    <img src="{{ asset('assets/imagenes/' . $item->producto->imagen) }}" alt="{{ $item->producto->nombre }}">
                    {{ $item->producto->nombre }}
                </td>
                <td>
                    <form action="{{ route('cliente.carrito.actualizar', $item->id) }}" method="POST">
                        @csrf
                        <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" class="input-cantidad">
                        <button type="submit" class="btn-actualizar">Actualizar</button>
                    </form>
                </td>
                <td>${{ number_format($item->producto->precio, 0, ',', '.') }}</td>
                <td>${{ number_format($item->cantidad * $item->producto->precio, 0, ',', '.') }}</td>
                <td>
                    <form action="{{ route('cliente.carrito.eliminar', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="resumen-carrito">
    <p><strong>Total:</strong> ${{ number_format($carrito->sum(fn($i) => $i->cantidad * $i->producto->precio), 0, ',', '.') }}</p>
    <form action="{{ route('cliente.pedidos') }}" method="POST">
        @csrf
        <button type="submit" class="btn-comprar">Finalizar compra</button>
    </form>
</div>
@endif
@endsection
