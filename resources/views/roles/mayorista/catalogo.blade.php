@extends('layouts.mayorista')

@section('contenido')
<h2 class="titulo-seccion">Catálogo Mayorista</h2>

<div class="grid-productos">
    @foreach($productos as $producto)
    <div class="producto">
        <img src="{{ asset('assets/imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
        <h4>{{ $producto->nombre }}</h4>
        <p>Precio unitario: ${{ number_format($producto->precio, 0, ',', '.') }}</p>
        <p>Stock: {{ $producto->stock }} uds</p>
        <form action="{{ route('mayorista.solicitar', $producto->id) }}" method="POST">
            @csrf
            <button type="submit" class="boton-agregar">Solicitar Pedido</button>
        </form>
    </div>
    @endforeach
</div>
@endsection
