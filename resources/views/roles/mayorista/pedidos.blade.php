@extends('layouts.mayorista')

@section('contenido')
<section class="contenedor">
    <h2 class="titulo-seccion">Mis Pedidos</h2>

    @if($pedidos->isEmpty())
        <p>No tienes pedidos realizados aún.</p>
    @else
    <div class="grid-productos">
        @foreach($pedidos as $pedido)
        <div class="producto">
            <h4>Pedido #{{ $pedido->id }}</h4>
            <p>Producto: {{ $pedido->producto->nombre }}</p>
            <p>Cantidad: {{ $pedido->cantidad }}</p>
            <p>Total: ${{ number_format($pedido->total, 0, ',', '.') }}</p>
            <p>Estado: 
                @php
                    $color = match($pedido->estado) {
                        'Completado' => 'green',
                        'En proceso' => '#FF5722',
                        'Cancelado' => 'red',
                        default => 'black',
                    };
                @endphp
                <span style="color: {{ $color }}; font-weight: bold;">{{ $pedido->estado }}</span>
            </p>
            <button class="boton-agregar">Ver Detalles</button>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endsection
