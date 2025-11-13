<nav class="barra-navegacion">
    <div class="marca">
        <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo">
        Stockya
    </div>
    <div class="enlaces">
        <a href="{{ route('cliente.panel') }}">Inicio</a>
        <a href="{{ route('cliente.productos') }}">Productos</a>
        <a href="{{ route('cliente.pedidos') }}">Pedidos</a>
    </div>
    <div class="acciones">
        <a href="{{ route('cliente.carrito') }}" class="carrito">🛒</a>
        <a href="{{ route('logout') }}">Salir</a>
    </div>
</nav>
