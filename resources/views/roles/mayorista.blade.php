@extends('layouts.mayorista')

@section('contenido')
<section class="contenedor-mayorista">
    <h2 class="titulo-seccion">Catálogo Mayorista</h2>

    <div class="grid-mayorista">
        <div class="tarjeta-mayorista">
            <img src="{{ asset('assets/imagenes/pollo.png') }}" alt="Pollo Entero">
            <h4>Pollo Entero</h4>
            <p class="stock">Disponibles: 120 unidades</p>
            <table class="tabla-precios">
                <tr><td>10 uds</td><td>$220.000</td></tr>
                <tr><td>50 uds</td><td>$1.000.000</td></tr>
            </table>
            <button class="boton-naranja">Solicitar Pedido</button>
        </div>

        <div class="tarjeta-mayorista">
            <img src="{{ asset('assets/imagenes/pan.jpeg') }}" alt="Pan HB Catalina">
            <h4>Pan HB Catalina</h4>
            <p class="stock">Disponibles: 500 unidades</p>
            <table class="tabla-precios">
                <tr><td>20 uds</td><td>$90.000</td></tr>
                <tr><td>100 uds</td><td>$400.000</td></tr>
            </table>
            <button class="boton-naranja">Solicitar Pedido</button>
        </div>
    </div>
</section>
@endsection
