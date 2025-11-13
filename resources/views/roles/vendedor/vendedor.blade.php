<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ventas - Stockya</title>
<link rel="stylesheet" href="{{ asset('assets/css/estiloVendedor.css') }}">
</head>
<body>

<header class="header-vendedor">
    <div class="logo">
        <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo">
        <h2>Vendedor</h2>
    </div>

    <nav class="nav-vendedor">
        <a href="{{ route('vendedor.registrarVenta') }}">🧾 Registrar venta</a>
    </nav>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf
        <button type="submit" class="boton-salir">Salir</button>
    </form>
</header>

<main class="contenido">
    <h2>Registro de Venta</h2>

    <!-- Buscador -->
    <input type="text" id="buscar-producto" placeholder="Buscar producto..." oninput="filtrarProductos()">
    <div id="productos-disponibles" class="productos-disponibles"></div>

    <!-- Tabla de ventas -->
    <table class="tabla-productos">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Total</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="tabla-ventas"></tbody>
    </table>

    <h3>Total general: <span id="suma">$0</span></h3>

    <!-- Selección de medio de pago -->
    <div class="medio-pago">
        <h3>Medio de Pago:</h3>
        <button type="button" onclick="seleccionarPago('Efectivo')">Efectivo</button>
        <button type="button" onclick="seleccionarPago('Tarjeta')">Tarjeta</button>
        <button type="button" onclick="seleccionarPago('Transferencia')">Transferencia</button>
        <p>Seleccionado: <span id="medio-pago">Efectivo</span></p>
    </div>

    <!-- Sección de pago -->
    <div class="seccion-pago">
        <div class="pago-row">
            <label>Total a pagar:</label>
            <span id="total-pago" class="total-pago">$0</span>
        </div>
        <div class="pago-row">
            <label>Pagaron:</label>
            <input type="number" id="pagaron" placeholder="Ingresa monto" oninput="calcularCambio()">
        </div>
        <div class="pago-row">
            <label>Devuelve:</label>
            <span id="cambio" class="cambio">$0</span>
        </div>
        <button type="button" class="boton-finalizar" onclick="finalizarPago()">Finalizar Pago</button>
    </div>
</main>

<script src="{{ asset('assets/js/ventasVendedor.js') }}"></script>
</body>
</html>
