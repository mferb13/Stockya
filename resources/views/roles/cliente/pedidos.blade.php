@extends('layouts.cliente')

@section('contenido')
<h1 class="titulo-seccion">📦 Mis Pedidos</h1>

@if($pedidos->isEmpty())
    <p class="pedido-vacio">No tienes pedidos aún. <a href="{{ route('cliente.productos') }}" class="boton-naranja">Explorar productos</a></p>
@else
<div class="tabla-pedidos">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
            <tr>
                <td>#{{ $pedido->id }}</td>
                <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                <td>${{ number_format($pedido->total, 0, ',', '.') }}</td>
                <td>
                    <span class="estado estado-{{ strtolower($pedido->estado) }}">
                        {{ ucfirst($pedido->estado) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection
