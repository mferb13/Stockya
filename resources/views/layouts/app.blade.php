<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <livewire:layout.navigation />

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            @yield('contenido')
        </main>
    </div>

    <!-- ALERTAS TOAST STACK -->
    <div class="contenedor-alertas-stack"></div>

    <style>
        /* Toast stack container */
        .contenedor-alertas-stack {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .alerta.toast {
            padding: 1rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            opacity: 0;
            transform: translateX(100%);
            transition: opacity 0.5s, transform 0.5s;
            min-width: 250px;
        }

        .alerta.toast.success { background-color: #28a745; }
        .alerta.toast.error   { background-color: #dc3545; }
        .alerta.toast.info    { background-color: #007bff; }

        .alerta.toast.mostrar {
            opacity: 1;
            transform: translateX(0);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const contenedor = document.querySelector('.contenedor-alertas-stack');

            // Obtenemos todos los mensajes del servidor en un objeto JS
            const mensajes = {
                success: @json(session('success')),
                error:   @json(session('error')),
                info:    @json(session('info')),
            };

            Object.keys(mensajes).forEach(tipo => {
                const mensaje = mensajes[tipo];
                if (mensaje) {
                    const div = document.createElement('div');
                    div.className = `alerta toast ${tipo}`;
                    div.innerText = mensaje;
                    contenedor.appendChild(div);

                    // Mostrar y luego ocultar
                    setTimeout(() => div.classList.add('mostrar'), 10);
                    setTimeout(() => {
                        div.classList.remove('mostrar');
                        setTimeout(() => div.remove(), 500);
                    }, 3000);
                }
            });
        });
    </script>
</body>
</html>
