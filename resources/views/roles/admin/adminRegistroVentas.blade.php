<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro de Ventas - Admin Stockya</title>
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
            <a href="#"><i>🧾</i> Registro de Ventas</a>
            <a href="#"><i>⚙️</i> Configuración</a>
        </nav>
        <div class="perfil">
            <img src="{{ asset('assets/imagenes/user.png') }}" alt="Admin">
            <div>
                <p class="nombre">{{ Auth::user()->name }}</p>
                <p class="rol">Administrador</p>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 10px;">
                @csrf
                <button type="submit" class="boton-salir">Cerrar sesión</button>
            </form>
        </div>
    </aside>

    <main class="contenido">
        <header>
            <h2>Ventas Registradas</h2>
            <input type="date" id="fecha-ventas" value="{{ date('Y-m-d') }}">
            <button onclick="cargarVentas()">Cargar ventas</button>
        </header>

        <section class="grid">
            <div class="tarjeta ventas-registradas">
                <h3>Ventas del Día</h3>
                <table class="tabla-productos">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Productos</th>
                            <th>Total</th>
                            <th>Medio de pago</th>
                        </tr>
                    </thead>
                    <tbody id="tabla-ventas-registradas-admin"></tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<script src="{{ asset('assets/js/adminRegistroVentas.js') }}"></script>
</body>
</html>
