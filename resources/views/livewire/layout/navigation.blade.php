<!-- resources/views/layouts/navigation.blade.php -->
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @guest
                        <x-nav-link :href="route('principal')" :active="request()->routeIs('principal')">Inicio</x-nav-link>
                        <x-nav-link :href="route('servicios')" :active="request()->routeIs('servicios')">Servicios</x-nav-link>
                        <x-nav-link :href="route('contacto')" :active="request()->routeIs('contacto')">Contacto</x-nav-link>
                        <x-nav-link :href="route('iniciarSesion')" :active="request()->routeIs('iniciarSesion')">Iniciar sesión</x-nav-link>
                        <x-nav-link :href="route('registro')" :active="request()->routeIs('registro')">Registrarse</x-nav-link>
                    @else
                        @if(auth()->user()->role === 'cliente')
                            <x-nav-link :href="route('cliente.panel')" :active="request()->routeIs('cliente.panel')">Inicio</x-nav-link>
                            <x-nav-link :href="route('cliente.productos')" :active="request()->routeIs('cliente.productos')">Productos</x-nav-link>
                            <x-nav-link :href="route('cliente.pedidos')" :active="request()->routeIs('cliente.pedidos')">Pedidos</x-nav-link>
                        @elseif(auth()->user()->role === 'vendedor')
                            <x-nav-link :href="route('vendedor.panel')" :active="request()->routeIs('vendedor.panel')">Panel Vendedor</x-nav-link>
                            <x-nav-link :href="route('vendedor.registrarVenta')" :active="request()->routeIs('vendedor.registrarVenta')">Registrar Venta</x-nav-link>
                        @elseif(auth()->user()->role === 'admin')
                            <x-nav-link :href="route('admin.panel')" :active="request()->routeIs('admin.panel')">Panel Admin</x-nav-link>
                        @elseif(auth()->user()->role === 'mayorista')
                            <x-nav-link :href="route('mayorista.panel')" :active="request()->routeIs('mayorista.panel')">Panel Mayorista</x-nav-link>
                        @endif
                    @endguest
                </div>
            </div>

            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"></div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')">Perfil</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Cerrar sesión
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @guest
                <x-responsive-nav-link :href="route('principal')">Inicio</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('servicios')">Servicios</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contacto')">Contacto</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('iniciarSesion')">Iniciar sesión</x-responsive-nav-link>
                <x-responsive-nav-link :href="route('registro')">Registrarse</x-responsive-nav-link>
            @else
                @if(auth()->user()->role === 'cliente')
                    <x-responsive-nav-link :href="route('cliente.panel')">Inicio</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('cliente.productos')">Productos</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('cliente.pedidos')">Pedidos</x-responsive-nav-link>
                @elseif(auth()->user()->role === 'vendedor')
                    <x-responsive-nav-link :href="route('vendedor.panel')">Panel Vendedor</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('vendedor.registrarVenta')">Registrar Venta</x-responsive-nav-link>
                @elseif(auth()->user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.panel')">Panel Admin</x-responsive-nav-link>
                @elseif(auth()->user()->role === 'mayorista')
                    <x-responsive-nav-link :href="route('mayorista.panel')">Panel Mayorista</x-responsive-nav-link>
                @endif
            @endguest
        </div>

        @auth
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')">Perfil</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Cerrar sesión
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>
