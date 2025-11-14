<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Stockya</title>
    <link rel="icon" href="{{ asset('assets/imagenes/logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/estiloGeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estilosLogin.css') }}">
    <script src="{{ asset('assets/js/menu.js') }}" defer></script>
</head>
<body>
    <header class="barra-navegacion">
        <div class="marca">
            <a href="{{ route('principal') }}" style="display:flex;align-items:center;gap:.5rem;text-decoration:none;color:inherit;">
                <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo Stockya">
                <span>STOCKYA</span>
            </a>
        </div>
        <nav class="enlaces">
            <a href="{{ route('principal') }}">INICIO</a>
            <a href="{{ route('servicios') }}">SERVICIOS</a>
            <a href="{{ route('contacto') }}">CONTACTO</a>
        </nav>
        <div class="acciones">
            <a href="#" class="carrito">🛒</a>
            <a href="{{ route('iniciarSesion') }}" class="boton-naranja activo">INICIAR SESIÓN</a>
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

    <main class="contenedor-login">
        <div class="lado-izquierdo">
            <img src="{{ asset('assets/imagenes/pescado.jpg') }}" alt="Imagen de inicio de sesión">
        </div>

        <div class="tarjeta-login">
            <div class="logo-login">
                <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo Stockya">
                <h2>STOCKYA</h2>
            </div>

            <h3 class="titulo">Iniciar Sesión</h3>

            <form method="POST" action="{{ route('iniciarSesion.submit') }}">
                @csrf
                <input type="email" name="email" placeholder="Correo electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" class="boton-naranja">INGRESAR</button>

                @if ($errors->any())
                    <div class="alerta-error">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </form>

            <p class="texto-registro">
                ¿No tienes cuenta?
                <a href="{{ route('registro') }}" class="boton-registro">Regístrate</a>
            </p>
        </div>
    </main>

    @include('partials.footer')
</body>
</html>
