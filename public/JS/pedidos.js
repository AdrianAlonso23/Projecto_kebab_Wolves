// Clase Pedido
class Pedido {
    constructor(PEDIDO_ID, USUARIO_ID, FECHA, TOTAL, DIRECCION, ESTADO) {
        this.PEDIDO_ID = PEDIDO_ID;
        this.USUARIO_ID = USUARIO_ID;
        this.FECHA = FECHA;
        this.TOTAL = TOTAL;
        this.DIRECCION = DIRECCION;
        this.ESTADO = ESTADO;
    }
}

// Variables globales
let pedidosGlobal = [];
let modalEditarPedido;

// Inicialización al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    modalEditarPedido = new bootstrap.Modal(document.getElementById('modalEditarPedido'));
    cargarPedidos();
});

// Cargar pedidos desde la API
function cargarPedidos() {
    fetch('http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=getPedidos')
        .then(res => res.json())
        .then(data => {
            const pedidos = data.map(p => new Pedido(
                p.PEDIDO_ID,
                p.USUARIO_ID,
                p.FECHA,
                p.TOTAL,
                p.DIRECCION,
                p.ESTADO
            ));

            pedidosGlobal = pedidos;
            mostrarPedidos(pedidos);
        })
        .catch(err => console.error('Error al cargar pedidos:', err));
}

// Mostrar pedidos en la tabla
function mostrarPedidos(pedidos) {
    const lista = document.getElementById('listaPedidos');
    lista.innerHTML = '';

    pedidos.forEach(p => {
        const tr = document.createElement('tr');

        tr.innerHTML = `
            <td>${p.PEDIDO_ID}</td>
            <td>${p.USUARIO_ID}</td>
            <td>${p.FECHA}</td>
            <td>${p.TOTAL} €</td>
            <td>${p.DIRECCION}</td>
            <td>${p.ESTADO}</td>
            <td>
                <button class="btn btn-warning btn-sm me-2" onclick="abrirModalPedido(${p.PEDIDO_ID})">
                    Editar
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminarPedido(${p.PEDIDO_ID})">
                    Eliminar
                </button>
            </td>
        `;

        lista.appendChild(tr);
    });
}

// Abrir modal de edición
function abrirModalPedido(id) {
    const pedido = pedidosGlobal.find(p => p.PEDIDO_ID == id);
    if (!pedido) return;

    document.getElementById('editPedidoId').value = pedido.PEDIDO_ID;
    document.getElementById('editPedidoUsuario').value = pedido.USUARIO_ID;
    document.getElementById('editPedidoFecha').value = new Date(pedido.FECHA).toISOString().slice(0,16);
    document.getElementById('editPedidoTotal').value = pedido.TOTAL;
    document.getElementById('editPedidoDireccion').value = pedido.DIRECCION;
    document.getElementById('editPedidoEstado').value = pedido.ESTADO;

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

// Eliminar pedido
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
