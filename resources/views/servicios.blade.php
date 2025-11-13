<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Stockya</title>
    <link rel="stylesheet" href="{{ asset('assets/css/estiloContactoServicio.css') }}">
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>
<body>
    <header class="barra-navegacion">
        <div class="marca">
            <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo Stockya" class="logo-header">
            <span>STOCKYA</span>
        </div>

        <nav class="enlaces">
            <a href="{{ route('principal') }}">INICIO</a>
            <a href="{{ route('servicios') }}" class="boton-naranja">SERVICIOS</a>
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

    <main class="contenedor">
        <h1 class="titulo-seccion">Nuestros Servicios</h1>
        <p class="descripcion">
        En Stockya ofrecemos soluciones para clientes comunes, mayoristas y negocios que buscan calidad y frescura.
        </p>

        <div class="grid-servicios">
            <div class="tarjeta">
                <img src="{{ asset('assets/imagenes/pescado.jpg') }}" alt="Venta al detalle">
                <h2>Venta al Detalle</h2>
                <p>Productos frescos seleccionados para tu hogar. Compra lo que necesites sin cantidades mínimas.</p>
            </div>
            <div class="tarjeta">
                <img src="{{ asset('assets/imagenes/chorizo.jpg') }}" alt="Venta al por mayor">
                <h2>Venta al Por Mayor</h2>
                <p>Precios especiales para negocios y compradores grandes. Entregas rápidas y garantizadas.</p>
            </div>
            <div class="tarjeta">
                <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Asesoría personalizada">
                <h2>Asesoría Personalizada</h2>
                <p>Te ayudamos a encontrar el producto ideal según tus necesidades, con soporte directo de nuestro equipo.</p>
            </div>
        </div>
    </main>
</body>
</html>
