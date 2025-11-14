<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stockya</title>
    {{-- Icon --}}
    <link rel="icon" href="{{ asset('assets/imagenes/logo.ico') }}" type="image/x-icon">
    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ asset('assets/css/estiloGeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estilosPrincipal.css') }}">
    {{-- Scripts --}}
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>
<body>
    <header class="barra-navegacion">
        <div class="marca">
            <a href="{{ route('principal') }}" style="display: flex; align-items: center; gap: .5rem; text-decoration: none; color: inherit;">
                <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo Stockya">
                <span>STOCKYA</span>
            </a>
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

    {{-- SECCIÓN DE NOVEDADES --}}
    <section class="seccion-novedades">
        <div class="contenedor-novedades">
            <h2 class="titulo-novedades">PROVEEDORES</h2>
            <div class="grid-novedades">

                {{-- Tarjeta 1 --}}
                <article class="tarjeta-novedad">
                    <img src="{{ asset('assets/imagenes/bucanero.jpeg') }}" class="imagen-novedad">
                    <div class="contenido-novedad">
                        <h3>Calidad premium</h3>
                        <p>Trabajamos con Bucanero, la marca líder en pollo de alta calidad.</p>
                    </div>
                </article>

                {{-- Tarjeta 2 --}}
                <article class="tarjeta-novedad">
                    <img src="{{ asset('assets/imagenes/fresmar.jpeg') }}" class="imagen-novedad">
                    <div class="contenido-novedad">
                        <h3>Delicias del mar</h3>
                        <p>Fresmar es nuestro aliado para llevar los mejores productos del océano.</p>
                    </div>
                </article>

                {{-- Tarjeta 3 --}}
                <article class="tarjeta-novedad">
                    <img src="{{ asset('assets/imagenes/mac.jpeg') }}" class="imagen-novedad">
                    <div class="contenido-novedad">
                        <h3>Tradición de excelencia</h3>
                        <p>Mac Pollo nos acompaña con calidad y frescura garantizada.</p>
                    </div>
                </article>

                {{-- Tarjeta 4 --}}
                <article class="tarjeta-novedad">
                    <img src="{{ asset('assets/imagenes/darnel.jpeg') }}" class="imagen-novedad">
                    <div class="contenido-novedad">
                        <h3>Desechables prácticos</h3>
                        <p>Darnel nos ofrece envases resistentes y confiables.</p>
                    </div>
                </article>

            </div>
        </div>
    </section>

    {{-- GALERÍA --}}
    <section class="galeria-section">
        <h2 class="galeria-titulo">Nuestros productos</h2>
        <div class="galeria-container">
            <div class="galeria">
                <img src="{{ asset('assets/imagenes/alitas.jpg') }}">
                <img src="{{ asset('assets/imagenes/mojarra.jpg') }}">
                <img src="{{ asset('assets/imagenes/salmon.jpg') }}">
                <img src="{{ asset('assets/imagenes/costilla.jpg') }}">
                <img src="{{ asset('assets/imagenes/huevos.jpg') }}">
                <img src="{{ asset('assets/imagenes/Queso.jpg') }}">
                <img src="{{ asset('assets/imagenes/salchichon.jpg') }}">
                <img src="{{ asset('assets/imagenes/salmon.jpg') }}">
            </div>
        </div>
    </section>

    @include('partials.footer')

</body>
</html>
