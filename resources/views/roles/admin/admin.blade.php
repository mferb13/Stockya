<!-- resources/views/admin.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Stockya</title>
    <link rel="stylesheet" href="{{ asset('assets/css/estiloAdmin.css') }}">
</head>
<body>
    <div class="contenedor">
        <aside class="sidebar">
            <div class="logo">
                <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Stockya Logo">
                <h2>STOCKYA</h2>
            </div>
            <nav>
                <a href="#"><i>🏠</i> DashBoard</a>
                <a href="#"><i>📦</i> Inventario</a>
                <a href="#"><i>📝</i> Pedidos</a>
                <a href="#"><i>⚠️</i> Alertas</a>
                <a href="{{ route('admin.registroVentas') }}"><i>🧾</i> Registro de Ventas</a>
                <a href="#"><i>⚙️</i> Configuración</a>
            </nav>
            <div class="perfil">
                <img src="{{ asset('assets/imagenes/user.png') }}" alt="Admin">
                <div>
                    <p class="nombre">{{ Auth::user()->name }}</p>
                    <p class="rol">Administrador</p>
                </div>

                <!-- Botón de cerrar sesión -->
                <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
                    @csrf
                    <button type="submit" class="boton-salir">Cerrar sesión</button>
                </form>
            </div>
        </aside>

        <main class="contenido">
            <header>
                <h2>¡Bienvenido, {{ Auth::user()->name }}!</h2>
                <input type="text" placeholder="🔍 Buscar">
            </header>
            <section class="grid">
                <div class="tarjeta apis">
                    <h3>Estado APIs</h3>
                    <button class="api-btn nequi">Nequi</button>
                    <button class="api-btn banco">Banco</button>
                    <button class="api-btn pdf">PDF</button>
                </div>
                <div class="tarjeta inventario">
                    <h3>Resumen Inventario</h3>
                    <p>Producto A: 300 ud</p>
                    <p>Producto B: 120 ud</p>
                </div>
                <div class="tarjeta pedidos">
                    <h3>Pedidos Recientes</h3>
                    <p>Cliente X - 01/11/2025</p>
                    <p>Cliente Y - 02/11/2025</p>
                </div>
                <div class="tarjeta alertas">
                    <h3>Alertas</h3>
                    <p>Stock bajo: 5 productos</p>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
