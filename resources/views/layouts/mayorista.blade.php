<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mayorista - Stockya</title>
    <link rel="stylesheet" href="{{ asset('assets/css/estiloCliente.css') }}">
</head>
<body>

    <header class="barra-navegacion">
        <div class="marca">
            <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo">
            Stockya
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
