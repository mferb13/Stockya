<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Stockya</title>
    <link rel="stylesheet" href="{{ asset('assets/css/estiloGeneral.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/estilosRegistro.css') }}">
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
            <a href="{{ route('servicios') }}">SERVICIOS</a>
            <a href="{{ route('contacto') }}">CONTACTO</a>
        </nav>

        <div class="acciones">
            <a href="#" class="carrito">🛒</a>
            <a href="{{ route('iniciarSesion') }}">INICIAR SESIÓN</a>
            <a href="{{ route('registro') }}" class="boton-naranja activo">REGISTRO</a>
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

    <main class="contenedor-principal">
        <div class="lado-izquierdo">
            <img src="{{ asset('assets/imagenes/chorizo.jpg') }}" alt="Imagen lateral">
        </div>

        <div class="formulario-registro">
        <h2>REGISTRO</h2>
        <form method="POST" action="{{ route('registro.submit') }}">
            @csrf
            <div class="fila">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
            </div>
            <div class="fila">
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="cedula" placeholder="Código (Cédula)" required>
            </div>

            <div class="fila">
                <select name="rol" required>
                    <option value="" disabled selected>Seleccione su rol</option>
                    <option value="cliente">🧍 Cliente Común</option>
                    <option value="mayorista">📦 Cliente al por mayor</option>
                </select>
            </div>

            <div class="fila">
                <input type="password" name="password" placeholder="Contraseña" required>
                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
            </div>

            <label class="terminos">
                <input type="checkbox" required> Acepto términos y condiciones
            </label>
            <button type="submit" class="boton-crear">Crear</button>
        </form>

        <p class="texto-registro">
        ¿Ya tienes cuenta?
        <a href="{{ route('iniciarSesion') }}" class="boton-iniciarSesion">Inicia sesión</a>
            </p>
        </div>
    </main>
</body>
</html>
