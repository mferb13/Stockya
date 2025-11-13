// assets/js/adminRegistroVentas.js

function cargarVentas() {
    const tabla = document.getElementById('tabla-ventas-registradas-admin');
    tabla.innerHTML = '';

    const fechaSeleccionada = document.getElementById('fecha-ventas').value;

    const ventas = JSON.parse(localStorage.getItem('ventasParaAdmin')) || [];

    let contador = 0;
    ventas.forEach((venta) => {
        const fechaVenta = venta.fecha || new Date().toISOString().slice(0,10);

        if (fechaVenta === fechaSeleccionada) {
            contador++;
            const productosStr = venta.productos.map(p => `${p.nombre} x${p.cantidad}`).join(', ');
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${contador}</td>
                <td>${productosStr}</td>
                <td>$${venta.total.toLocaleString()}</td>
                <td>${venta.medioPago}</td>
            `;
            tabla.appendChild(fila);
        }
    });

    if (contador === 0) {
        const fila = document.createElement('tr');
        fila.innerHTML = `<td colspan="4" style="text-align:center;">No hay ventas para esta fecha</td>`;
        tabla.appendChild(fila);
    }
}
