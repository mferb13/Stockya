// Lista de productos disponibles
const productos = [
    { nombre: "Pan Bimbo Ultra Max", precio: 5000 },
    { nombre: "Pan Bimbo Blanco", precio: 4000 },
    { nombre: "Pollo Entero", precio: 220000 },
    { nombre: "Arroz 1kg", precio: 7000 },
    { nombre: "Leche Entera 1L", precio: 3500 }
];

const inputBuscar = document.getElementById('buscar-producto');
const divProductos = document.getElementById('productos-disponibles');
let pagoSeleccionado = 'Efectivo';

// Filtrar productos por búsqueda
function filtrarProductos() {
    const query = inputBuscar.value.toLowerCase();
    divProductos.innerHTML = '';

    const filtrados = productos.filter(p => p.nombre.toLowerCase().includes(query));
    filtrados.forEach(p => {
        const item = document.createElement('div');
        item.classList.add('producto-item');
        item.innerHTML = `
            ${p.nombre} - $${p.precio.toLocaleString()}
            <button type="button" onclick="agregarProducto('${p.nombre}', ${p.precio})">Agregar</button>
        `;
        divProductos.appendChild(item);
    });

    divProductos.style.display = filtrados.length && query ? 'block' : 'none';
}

// Cerrar el dropdown si se hace click fuera
document.addEventListener('click', function(e) {
    if (!divProductos.contains(e.target) && e.target !== inputBuscar) {
        divProductos.style.display = 'none';
    }
});

// Agregar producto a la venta
function agregarProducto(nombre, precio) {
    const tabla = document.getElementById('tabla-ventas');

    // Si ya existe en la tabla, solo aumentar cantidad
    for (let fila of tabla.rows) {
        if (fila.cells[0].textContent === nombre) {
            const inputCantidad = fila.querySelector('input');
            inputCantidad.value = parseInt(inputCantidad.value) + 1;
            actualizarTotal(inputCantidad);
            return;
        }
    }

    // Si no existe, crear nueva fila
    const fila = document.createElement('tr');
    fila.innerHTML = `
        <td>${nombre}</td>
        <td><input type="number" value="1" min="1" onchange="actualizarTotal(this)"></td>
        <td>${precio}</td>
        <td class="total">${precio}</td>
        <td><button type="button" onclick="eliminarFila(this)">Eliminar</button></td>
    `;
    tabla.appendChild(fila);
    recalcularSuma();
}

// Actualizar total de una fila
function actualizarTotal(input) {
    const fila = input.closest('tr');
    const precio = parseInt(fila.cells[2].textContent);
    const cantidad = parseInt(input.value) || 1;
    fila.querySelector('.total').textContent = (precio * cantidad).toString();
    recalcularSuma();
}

// Eliminar fila
function eliminarFila(btn) {
    btn.closest('tr').remove();
    recalcularSuma();
}

// Recalcular suma general
function recalcularSuma() {
    let total = 0;
    document.querySelectorAll('.total').forEach(t => {
        const v = parseInt(t.textContent);
        if (!isNaN(v)) total += v;
    });

    document.getElementById('suma').textContent = '$' + total.toLocaleString();
    document.getElementById('total-pago').textContent = total.toLocaleString();
    calcularCambio();
}

// Cambio en tiempo real (puede ser negativo)
function calcularCambio() {
    const totalStr = document.getElementById('total-pago').textContent
        .replace(/\./g, '')
        .replace('$', '');
    const pagaronStr = document.getElementById('pagaron').value.replace(/\./g, '');

    const total = parseInt(totalStr) || 0;
    const pagaron = parseInt(pagaronStr) || 0;

    const cambio = pagaron - total;
    document.getElementById('cambio').textContent = '$' + cambio.toLocaleString();
}

// Seleccionar medio de pago
function seleccionarPago(medio) {
    pagoSeleccionado = medio;
    document.getElementById('medio-pago').textContent = medio;
}

// Finalizar pago
function finalizarPago() {
    const tablaVentas = document.getElementById('tabla-ventas');
    if (tablaVentas.rows.length === 0) {
        alert('No hay productos en la venta.');
        return;
    }

    const productosVenta = [];
    let totalVenta = 0;

    // Recorremos filas de la tabla
    for (let fila of tablaVentas.rows) {
        const nombre = fila.cells[0].textContent;
        const cantidad = parseInt(fila.querySelector('input').value) || 1;
        const total = parseInt(fila.cells[3].textContent.replace(/\./g, '')) || 0;

        productosVenta.push({ nombre, cantidad, total });
        totalVenta += total;
    }

    const pagaron = parseInt(
        (document.getElementById('pagaron').value || '0').replace(/\./g, '')
    ) || 0;

    // Guardar en LocalStorage para registrarVenta.blade.php
    let ventas = JSON.parse(localStorage.getItem('ventasRegistradas')) || [];
    ventas.push({
        productos: productosVenta,
        total: totalVenta,
        medioPago: pagoSeleccionado,
        pagaron: pagaron,
        cambio: pagaron - totalVenta,
        fecha: new Date().toISOString().slice(0, 10) // YYYY-MM-DD
    });
    localStorage.setItem('ventasRegistradas', JSON.stringify(ventas));

    alert('Venta realizada correctamente');

    // Limpiar venta actual
    tablaVentas.innerHTML = '';
    document.getElementById('suma').textContent = '$0';
    document.getElementById('total-pago').textContent = '0';
    document.getElementById('pagaron').value = '';
    document.getElementById('cambio').textContent = '$0';
    seleccionarPago('Efectivo');
    divProductos.innerHTML = '';
}
