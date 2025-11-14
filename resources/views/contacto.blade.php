<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Stockya</title>
    <link rel="icon" href="{{ asset('assets/imagenes/logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/estiloGeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estiloContactoServicio.css') }}">
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
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
        <a href="{{ route('principal') }}">INICIO</a>
        <a href="{{ route('servicios') }}">SERVICIOS</a>
        <a class="boton-naranja" href="{{ route('contacto') }}">CONTACTO</a>
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

<main class="contenedor contacto">
    <h1 class="titulo-seccion">Contáctanos</h1>
    <p class="descripcion">¿Tienes dudas o sugerencias? Escríbenos y te responderemos lo antes posible.</p>

    <form class="formulario-contacto" method="POST" action="{{ route('contacto.send') }}">
        @csrf
        <input type="text" name="name" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <textarea name="message" placeholder="Escribe tu mensaje..." required></textarea>
        <button type="submit" class="boton-naranja">Enviar Mensaje</button>
    </form>

    <div class="info-extra">
        <h2>También puedes encontrarnos en:</h2>
        <p>📍 Sector A Mz. 10 Cs. 22 Parque Industrial</p>
        <p>📞 <a href="https://wa.me/573128982723">+57 312 898 2723</a></p>
        <p>✉ <a href="mailto:Pollospescados@gmail.com">Pollospescados@gmail.com</a></p>
    </div>
</main>

@include('partials.footer')

</body>
</html>
