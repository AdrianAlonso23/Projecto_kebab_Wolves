let offcanvasCarrito;

function obtenerCarrito() {
    return JSON.parse(sessionStorage.getItem('carrito')) || [];
}

function guardarCarrito(carrito) {
    sessionStorage.setItem('carrito', JSON.stringify(carrito));
}

function añadirAlCarrito(producto) {
    const carrito = obtenerCarrito();
    const existe = carrito.find(p => p.id === producto.id);

    if (existe) {
        existe.cantidad++;
    } else {
        carrito.push({ ...producto, cantidad: 1 });
    }

    guardarCarrito(carrito);
    actualizarCarritoUI();
    offcanvasCarrito.show(); // abre el menú lateral
}

function actualizarCarritoUI() {
    const carrito = obtenerCarrito();
    const cont = document.getElementById('carritoContenido');
    const contador = document.getElementById('contadorCarrito');
    const totalDiv = document.getElementById('totalCarrito');

    if (!cont || !contador || !totalDiv) return;

    cont.innerHTML = '';
    let totalCantidad = 0;
    let totalPrecio = 0;

    carrito.forEach(p => {
        totalCantidad += p.cantidad;
        totalPrecio += p.precio * p.cantidad;

        cont.innerHTML += `
            <div class="d-flex justify-content-between mb-2">
                <span>${p.nombre} x${p.cantidad}</span>
                <strong>${(p.precio * p.cantidad).toFixed(2)}€</strong>
            </div>
        `;
    });

    contador.textContent = totalCantidad;

    totalDiv.innerHTML = `
        <strong>Total: ${totalPrecio.toFixed(2)} €</strong>
    `;
}

// Inicialización cuando carga la página
document.addEventListener('DOMContentLoaded', () => {
    const offcanvasElement = document.getElementById('carritoLateral');
    offcanvasCarrito = new bootstrap.Offcanvas(offcanvasElement);

    document.getElementById('btnCarrito')
        .addEventListener('click', () => offcanvasCarrito.show());

    document.getElementById('cerrarCarrito')
        .addEventListener('click', () => offcanvasCarrito.hide());

    actualizarCarritoUI();
});