<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrar Venta - Stockya</title>
<link rel="stylesheet" href="{{ asset('assets/css/estiloVendedor.css') }}">
</head>
<body>

<header class="header-vendedor">
    <div class="logo">
        <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo">
        <h2>Vendedor</h2>
    </div>

    <nav class="nav-vendedor">
        <a href="{{ route('vendedor.panel') }}">🧾 Registro de venta</a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="boton-salir">Salir</button>
    </form>
</header>

<main class="contenido">
    <!-- Cuadricula de ventas registradas -->
    <div id="ventas-registradas" class="ventas-registradas">
        <h2>Ventas Registradas</h2>
        <table class="tabla-productos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Productos</th>
                    <th>Total</th>
                    <th>Medio de pago</th>
                </tr>
            </thead>
            <tbody id="tabla-ventas-registradas"></tbody>
        </table>
        <button id="enviar-admin" onclick="enviarAlAdmin()">📤 Enviar al Admin</button>
    </div>
</main>

<script src="{{ asset('assets/js/registrarVenta.js') }}"></script>
<script>
function enviarAlAdmin() {
    const ventas = JSON.parse(localStorage.getItem('ventasRegistradas')) || [];
    // Guardamos también en una clave específica para el admin
    localStorage.setItem('ventasParaAdmin', JSON.stringify(ventas));
    alert('Ventas enviadas al admin correctamente ✅');
}
</script>
</body>
</html>
