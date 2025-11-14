<footer class="pie-pagina">
    <div class="contenedor-pie">
        {{-- Sección 1: Logo y descripción --}}
        <div class="seccion-pie">
            <div class="logo-pie">
                <img src="{{ asset('assets/imagenes/logo.png') }}" alt="Logo Stockya">
                <h3>STOCKYA</h3>
            </div>
            <p class="descripcion-pie">
                Tu aliado confiable en productos de pollo, pescado y desechables de calidad. 
                Trabajamos con los mejores proveedores para garantizar tu satisfacción.
            </p>
            <div class="redes-sociales">
                <a href="#" class="red-social">📘</a>
                <a href="#" class="red-social">📷</a>
                <a href="#" class="red-social">🐦</a>
                <a href="#" class="red-social">💼</a>
            </div>
        </div>

        {{-- Sección 2: Enlaces rápidos --}}
        <div class="seccion-pie">
            <h4>Enlaces Rápidos</h4>
            <ul class="enlaces-pie">
                <li><a href="{{ route('principal') }}">Inicio</a></li>
                <li><a href="{{ route('servicios') }}">Servicios</a></li>
                <li><a href="{{ route('contacto') }}">Contacto</a></li>
                <li><a href="{{ route('iniciarSesion') }}">Iniciar Sesión</a></li>
                <li><a href="{{ route('registro') }}">Registrarse</a></li>
            </ul>
        </div>

        {{-- Sección 3: Proveedores --}}
        <div class="seccion-pie">
            <h4>Nuestros Proveedores</h4>
            <ul class="proveedores-pie">
                <li>🐔 Bucanero - Pollo Premium</li>
                <li>🐟 Fresmar - Pescado Fresco</li>
                <li>🍗 Mac Pollo - Tradición</li>
                <li>📦 Darnel - Desechables</li>
            </ul>
        </div>

        {{-- Sección 4: Contacto --}}
        <div class="seccion-pie">
            <h4>Contacto</h4>
            <div class="info-contacto">
                <p>📍 Sector A Mz. 10 Cs. 22 Parque Industrial</p>
                <p>📞 <a href="https://wa.me/573128982723">+57 312 898 2723</a></p>
                <p>✉ <a href="mailto:Pollospescados@gmail.com">Pollospescados@gmail.com</a></p>
                <p>🕒 Lun - Vie: 7:00 AM - 6:00 PM</p>
            </div>
        </div>
    </div>

    {{-- Línea inferior --}}
    <div class="pie-inferior">
        <div class="contenedor-pie">
            <p>&copy; 2025 Stockya. Todos los derechos reservados.</p>
            <div class="enlaces-legales">
                <a href="#">Términos y Condiciones</a>
                <a href="#">Política de Privacidad</a>
                <a href="#">Aviso Legal</a>
            </div>
        </div>
    </div>
</footer>
