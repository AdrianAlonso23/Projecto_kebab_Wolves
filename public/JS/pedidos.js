// Clase Pedido
class Pedido {
    constructor(PEDIDO_ID, USUARIO_ID, NOMBRE_USUARIO, FECHA, TOTAL, DIRECCION, ESTADO, LINEAS = []) {
        this.PEDIDO_ID = PEDIDO_ID;
        this.USUARIO_ID = USUARIO_ID;         
        this.NOMBRE_USUARIO = NOMBRE_USUARIO; 
        this.FECHA = FECHA;
        this.TOTAL = TOTAL;
        this.DIRECCION = DIRECCION;
        this.ESTADO = ESTADO;
        this.LINEAS = LINEAS;
    }
}


let monedaSeleccionada = 'EUR';
let pedidosGlobal = [];

// Devuelve el símbolo de la moneda
function simboloMoneda(moneda) {
    switch(moneda) {
        case 'USD': return '$';
        case 'CAD': return 'C$';
        default: return '€';
    }
}

// Inicialización al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    // Inicializar el modal de Bootstrap
    modalEditarPedido = new bootstrap.Modal(document.getElementById('modalEditarPedido'));

    // Cargar pedidos
    cargarPedidos();

    // Botón guardar del modal
    const guardarBtn = document.getElementById('guardarPedidoBtn');
    if (guardarBtn) {
        guardarBtn.addEventListener('click', guardarEdicionPedido);
    }
});

// Función 1: cargar pedidos y convertir moneda
function cargarPedidos() {
    fetch('?controller=Moneda&action=getPedidosMoneda')
        .then(res => res.json())
        .then(data => {
            pedidosGlobal = data;

            if (monedaSeleccionada !== 'EUR') {
                const urlTasa = `https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_JKtEf8hjxjjZA8pYs1tAZxiMGLjabdnrIKyMjP8q&base_currency=EUR&currencies=${monedaSeleccionada}`;
                
                fetch(urlTasa)
                    .then(res => res.json())
                    .then(resp => {
                        const tasa = resp.data[monedaSeleccionada] || 1;
                        pedidosGlobal.forEach(p => {
                            p.TOTAL = parseFloat((parseFloat(p.TOTAL) * tasa).toFixed(2));
                        });
                        mostrarPedidos();
                    })
                    .catch(err => {
                        console.error('Error al obtener tasa de cambio:', err);
                        mostrarPedidos(); 
                    });
            } else {
                mostrarPedidos(); 
            }
        })
        .catch(err => console.error('Error al cargar pedidos:', err));
}

// Función 2: mostrar pedidos en la tabla
function mostrarPedidos() {
    const lista = document.getElementById('listaPedidos');
    if (!lista) return;
    lista.innerHTML = '';

    const simbolo = simboloMoneda(monedaSeleccionada);

    pedidosGlobal.forEach(p => {
        const productosHTML = (p.LINEAS || [])
            .map(l => `${l.nombre} (${l.cantidad})x`)
            .join('<br>');

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${p.PEDIDO_ID}</td>
            <td>${p.NOMBRE_USUARIO}</td>
            <td>${p.FECHA}</td>
            <td>${p.TOTAL} ${simbolo}</td>
            <td>${p.DIRECCION ?? '—'}</td>
            <td>${productosHTML || '—'}</td>
            <td>${p.ESTADO}</td>
            <td>
                <button class="btn btn-warning btn-sm me-2" onclick="abrirModalPedido(${p.PEDIDO_ID})">Editar</button>
                <button class="btn btn-warning btn-sm" onclick="eliminarPedido(${p.PEDIDO_ID})">Eliminar</button>
            </td>
        `;
        lista.appendChild(tr);
    });
}

// Cambiar moneda
document.getElementById('selectMoneda').addEventListener('change', e => {
    monedaSeleccionada = e.target.value;
    cargarPedidos();
});

// Abrir modal de edición
function abrirModalPedido(id) {
    const pedido = pedidosGlobal.find(p => p.PEDIDO_ID == id);
    if (!pedido) return;

    const editId = document.getElementById('editPedidoId');
    const editUsuario = document.getElementById('editPedidoUsuario');
    const editFecha = document.getElementById('editPedidoFecha');
    const editTotal = document.getElementById('editPedidoTotal');
    const editDireccion = document.getElementById('editPedidoDireccion');
    const editEstado = document.getElementById('editPedidoEstado');

    if (!editId || !editUsuario || !editFecha || !editTotal || !editDireccion || !editEstado) return;

    editId.value = pedido.PEDIDO_ID;
    editUsuario.value = pedido.USUARIO_ID;
    editFecha.value = new Date(pedido.FECHA).toISOString().slice(0,16);
    editTotal.value = pedido.TOTAL;
    editDireccion.value = pedido.DIRECCION ?? '';
    editEstado.value = pedido.ESTADO;

    modalEditarPedido.show();
}

// Guardar cambios de edición
function guardarEdicionPedido(event) {
    event.preventDefault();

    const pedido = {
        PEDIDO_ID: parseInt(document.getElementById('editPedidoId').value),
        USUARIO_ID: parseInt(document.getElementById('editPedidoUsuario').value),
        FECHA: document.getElementById('editPedidoFecha').value,
        TOTAL: parseFloat(document.getElementById('editPedidoTotal').value),
        DIRECCION: document.getElementById('editPedidoDireccion').value,
        ESTADO: document.getElementById('editPedidoEstado').value
    };

    fetch('http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=updatePedido', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json; charset=UTF-8' },
        body: JSON.stringify(pedido)
    })
    .then(res => res.json())
    .then(resp => {
        if (resp.success) {
            modalEditarPedido.hide();
            cargarPedidos(); 
            alert('Pedido actualizado correctamente');
        } else {
            alert(resp.error || 'Error al actualizar pedido');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error al actualizar pedido');
    });
}

// Eliminar pedido (DELETE)
function eliminarPedido(id) {
    if (!confirm('¿Seguro que quieres eliminar este pedido?')) return;

    fetch(`http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=deletePedido&id=${id}`, {
        method: 'DELETE'
    })
    .then(res => res.json())
    .then(resp => {
        if (resp.success) {
            alert('Pedido eliminado');
            cargarPedidos();
        } else {
            alert(resp.error || 'Error al eliminar pedido');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error al eliminar pedido');
    });
}
