<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stockya</title>

    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ asset('assets/css/estiloGeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estilosPrincipal.css') }}">

    {{-- Scripts --}}
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>
<body>
    <header class="barra-navegacion">
        <div class="marca">
            <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo Stockya">
            <span>STOCKYA</span>
        </div>
        <nav class="enlaces">
            <a href="{{ route('principal') }}" class="boton-naranja">INICIO</a>
            <a href="{{ route('servicios') }}">SERVICIOS</a>
            <a href="{{ route('contacto') }}">CONTACTO</a>
        </nav>
        <div class="acciones">
            <a href="#" class="carrito">🛒</a>
            <a href="{{ route('iniciarSesion') }}">INICIAR SESIÓN</a>
            <a href="{{ route('registro') }}">REGISTRO</a>
        </div>
        <div class="boton-menu" onclick="alternarMenu()">☰</div>
    </header>

    <aside id="menu-lateral" class="menu-lateral">
        <a href="{{ route('iniciarSesion') }}">INICIAR SESIÓN</a>
        <a href="{{ route('registro') }}">REGISTRO</a>
        <a href="{{ route('servicios') }}">SERVICIOS</a>
        <a href="{{ route('contacto') }}">CONTACTO</a>
        <a href="{{ route('principal') }}">INICIO</a>
    </aside>

    <main class="seccion-principal">
        <div class="texto-principal">
            <h4>A TU ALCANCE</h4>
            <h1><strong>PORQUE EL <br>TIEMPO ES DINERO</strong></h1>
            <p>Podrás realizar tus pedidos con nosotros de una manera más eficaz y llevar un registro.</p>
            <a href="{{ route('contacto') }}" class="boton-naranja">DESCÚBRELO</a>
        </div>
        <div class="imagen-principal">
            <img src="{{ asset('assets/imagenes/pollo.png') }}" alt="Productos de pollo">
        </div>
    </main>
</body>
</html>