<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayorista - Stockya</title>

    <link rel="icon" href="{{ asset('assets/imagenes/logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/estiloCliente.css') }}">
</head>
<body>

<header class="barra-navegacion">
    <div class="marca">
        <a href="{{ route('principal') }}" style="display:flex;align-items:center;gap:.5rem;text-decoration:none;color:inherit;">
            <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo">
            <span>STOCKYA</span>
        </a>
    </div>

    <nav class="enlaces">
        <a href="{{ route('mayorista.panel') }}">Catálogo</a>
        <a href="{{ route('mayorista.pedidos') }}">Pedidos</a>
    </nav>

    <div class="acciones">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="boton-naranja boton-salir">Salir</button>
        </form>
    </div>
</header>

<div class="contenedor">
    @yield('contenido')
</div>

</body>
</html>
