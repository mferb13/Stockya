<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Stockya</title>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{ asset('assets/css/estiloGeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estiloContactoServicio.css') }}">

    <!-- Script -->
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>
<body>
    <!-- ===== HEADER ===== -->
    <header class="barra-navegacion">
        <div class="marca">
            <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo Stockya" class="logo-header">
            <span>STOCKYA</span>
        </div>

        <!-- Menú principal -->
        <nav class="enlaces">
            <a href="{{ route('principal') }}">INICIO</a>
            <a href="{{ route('servicios') }}">SERVICIOS</a>
            <a href="{{ route('contacto') }}" class="boton-naranja">CONTACTO</a>
        </nav>

        <div class="acciones">
            <a href="#" class="carrito">🛒</a>
            <a href="{{ route('iniciarSesion') }}">INICIAR SESIÓN</a>
            <a href="{{ route('registro') }}">REGISTRO</a>
        </div>

        <!-- Botón menú hamburguesa -->
        <div class="boton-menu" onclick="alternarMenu()">☰</div>
    </header>

    <!-- ===== MENÚ LATERAL (MÓVIL) ===== -->
    <aside id="menu-lateral" class="menu-lateral">
        <a href="{{ route('iniciarSesion') }}">INICIAR SESIÓN</a>
        <a href="{{ route('registro') }}">REGISTRO</a>
        <a href="{{ route('servicios') }}">SERVICIOS</a>
        <a href="{{ route('contacto') }}">CONTACTO</a>
        <a href="{{ route('principal') }}">INICIO</a>
    </aside>

    <!-- ===== CONTENIDO PRINCIPAL ===== -->
    <main class="contenedor contacto">
        <h1 class="titulo-seccion">Contáctanos</h1>
        <p class="descripcion">
        ¿Tienes dudas o sugerencias? Escríbenos y te responderemos lo antes posible.
        </p>

        <!-- Formulario funcional -->
        <form class="formulario-contacto" method="POST" action="{{ route('contacto.send') }}">
        @csrf
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <textarea name="message" placeholder="Escribe tu mensaje aquí..." required></textarea>
            <button type="submit" class="boton-naranja">Enviar Mensaje</button>
        </form>

        <!-- Información adicional -->
        <div class="info-extra">
            <h2>También puedes encontrarnos en:</h2>
            <p>📍 Dirección: Sector A Mz. 10 Cs. 22 Parque Industrial</p>

            <p>
                📞 Teléfono:
                <a href="https://wa.me/573128982723?text=Hola%20quisiera%20más%20información%20sobre%20sus%20servicios"
                target="_blank">+57 312 898 2723</a>
            </p>

            <p>
                ✉️ Email:
                <a href="mailto:Pollospescados@gmail.com">Pollospescados@gmail.com</a>
            </p>
        </div>
    </main>
</body>
</html>
