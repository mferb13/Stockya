@extends('layouts.cliente')

@section('contenido')
<h2 class="titulo-seccion">Productos Disponibles</h2>
<div class="grid-productos">
    @foreach($productos as $producto)
    <div class="producto">
        <img src="{{ asset('assets/imagenes/' . $producto->imagen) }}" alt="{{ $producto->nombre }}">
        <h4>{{ $producto->nombre }}</h4>
        <p>${{ number_format($producto->precio,0,',','.') }}</p>
        <form action="{{ route('cliente.carrito.agregar', $producto->id) }}" method="POST">
            @csrf
            <button class="boton-agregar">Agregar al carrito 🛒</button>
        </form>
    </div>
    @endforeach
</div>
@endsection
