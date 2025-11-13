// assets/js/registrarVenta.js

document.addEventListener('DOMContentLoaded', () => {
    const tabla = document.getElementById('tabla-ventas-registradas');
    const ventas = JSON.parse(localStorage.getItem('ventasRegistradas')) || [];

    ventas.forEach((venta, index) => {
        const fila = document.createElement('tr');
        fila.innerHTML = `
            <td>${index + 1}</td>
            <td>${venta.productos.map(p => `${p.nombre} x${p.cantidad}`).join(', ')}</td>
            <td>$${venta.total.toLocaleString()}</td>
            <td>${venta.medioPago}</td>
        `;
        tabla.appendChild(fila);
    });
});
