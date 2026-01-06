let offcanvasCarrito;

// ===== FUNCIONES DE CARRITO =====
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
    actualizarCarritoUI(carrito, 'carritoLateralContenido', 'totalCarritoLateral');
    offcanvasCarrito.show();
}

function actualizarCarritoUI(carrito, contenedorId, totalId) {
    const cont = document.getElementById(contenedorId);
    const totalDiv = document.getElementById(totalId);
    if (!cont || !totalDiv) return;

    cont.innerHTML = '';
    let total = 0;

    carrito.forEach(p => {
        total += p.precio * p.cantidad;

        if(contenedorId === 'carritoLateralContenido') {
            cont.innerHTML += `
            <div class="carrito-lateral-item">
                <span><img src="public/img/${p.imagen}" width="30%">${p.nombre} x${p.cantidad}</span>
                <strong>${(p.precio * p.cantidad).toFixed(2)}€</strong>
            </div>
            `;
        } else {
            cont.innerHTML += `
                <div class="carrito-pagina-item" data-id="${p.id}">
                    <div class="producto-info">
                        <img src="public/img/${p.imagen}" width="30%">
                        <div class="info-texto">
                            <div class="nombre-producto">${p.nombre}</div>
                            <div class="acciones-producto">
                                <a href="#" class="modificar">Modificar/Personalizar</a>
                            </div>
                        </div>
                    </div>

                    <div class="cantidad-control">
                        <button class="restar">-</button>
                        <span class="cantidad">${p.cantidad}</span>
                        <button class="sumar">+</button>
                    </div>

                    <div class="precio">${(p.precio * p.cantidad).toFixed(2)}€</div>
                    
                    <a href="#" class="eliminar acciones-producto">Eliminar</a>
                </div>
            `;
        }
    });

    totalDiv.innerHTML = `<strong>${total.toFixed(2)}€</strong>`;

    if(carrito.length === 0) {
        cont.innerHTML = '<p>Tu carrito está vacío</p>';
        totalDiv.innerHTML = '';
    }

    // Funcionalidad sumar/restar solo en la página
    if(contenedorId === 'carritoPaginaContenido') {
        cont.querySelectorAll('.sumar').forEach(btn => {
            btn.addEventListener('click', e => {
                const id = e.target.closest('.carrito-pagina-item').dataset.id;
                const c = obtenerCarrito();
                const prod = c.find(p => p.id == id);
                prod.cantidad++;
                guardarCarrito(c);
                actualizarCarritoUI(c, 'carritoPaginaContenido', 'totalCarritoPagina');
                actualizarCarritoUI(c, 'carritoLateralContenido', 'totalCarritoLateral');
            });
        });

        cont.querySelectorAll('.restar').forEach(btn => {
            btn.addEventListener('click', e => {
                const id = e.target.closest('.carrito-pagina-item').dataset.id;
                let c = obtenerCarrito();
                const prod = c.find(p => p.id == id);
                if(prod.cantidad > 1) prod.cantidad--;
                else c = c.filter(p => p.id != id);
                guardarCarrito(c);
                actualizarCarritoUI(c, 'carritoPaginaContenido', 'totalCarritoPagina');
                actualizarCarritoUI(c, 'carritoLateralContenido', 'totalCarritoLateral');
            });
        });

        cont.querySelectorAll('.eliminar').forEach(btn => {
            btn.addEventListener('click', e => {
                e.preventDefault();
                const id = e.target.closest('.carrito-pagina-item').dataset.id;
                let c = obtenerCarrito().filter(p => p.id != id);
                guardarCarrito(c);
                actualizarCarritoUI(c, 'carritoPaginaContenido', 'totalCarritoPagina');
                actualizarCarritoUI(c, 'carritoLateralContenido', 'totalCarritoLateral');
            });
        });
    }
}

// ===== INICIALIZACIÓN =====
document.addEventListener('DOMContentLoaded', () => {
    const offcanvasElement = document.getElementById('carritoLateral');
    if(offcanvasElement) {
        offcanvasCarrito = new bootstrap.Offcanvas(offcanvasElement);

        document.getElementById('btnCarrito')
            .addEventListener('click', () => offcanvasCarrito.show());

        document.getElementById('cerrarCarrito')
            .addEventListener('click', () => offcanvasCarrito.hide());

        actualizarCarritoUI(obtenerCarrito(), 'carritoLateralContenido', 'totalCarritoLateral');
    }

    if(document.getElementById('carritoPaginaContenido')) {
        actualizarCarritoUI(obtenerCarrito(), 'carritoPaginaContenido', 'totalCarritoPagina');
    }

    // ===== LISTENER FORMULARIO PAGAR =====
    const formCarrito = document.querySelector('form.layout-carrito');

    if (formCarrito) {
        formCarrito.addEventListener('submit', (e) => {
            e.preventDefault();

            const carrito = JSON.parse(sessionStorage.getItem('carrito') || '[]');
            if (carrito.length === 0) {
                alert("El carrito está vacío");
                return;
            }

            const carritoInput = document.getElementById('carritoInput');
            carritoInput.value = JSON.stringify(carrito);
            console.log("Carrito enviado a PHP:", carritoInput.value);

            // Aseguramos que se actualice el input antes de enviar
            setTimeout(() => {
                formCarrito.submit();
            }, 0);
        });
    }
});
