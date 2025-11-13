<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente - Stockya</title>
    <link rel="stylesheet" href="{{ asset('assets/css/estiloCliente.css') }}">
</head>
<body>
    <header class="barra-navegacion">
        <div class="marca">
            <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo">
            Stockya
        </div>

        <nav class="enlaces">
            <a href="{{ route('cliente.productos') }}">Productos</a>
            <a href="{{ route('cliente.pedidos') }}">Pedidos</a>
            <a href="{{ route('cliente.carrito') }}">Carrito 🛒</a>
        </nav>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="boton-naranja boton-salir">Salir</button>
        </form>
    </header>

    <main class="contenedor">
        @yield('contenido')
    </main>
</body>
</html>
