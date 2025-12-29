class Pedido {
    constructor(PEDIDO_ID, USUARIO_ID, FECHA, TOTAL, DIRECCION) {
        this.PEDIDO_ID = PEDIDO_ID;
        this.USUARIO_ID = USUARIO_ID;
        this.FECHA = FECHA;
        this.TOTAL = TOTAL;
        this.DIRECCION = DIRECCION;
    }
}

function cargarPedidos() {
        fetch('http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=getPedidos')
        .then(res => res.text())
        .then(text => {
            try {
                const data = JSON.parse(text);
                // trabajar con los pedidos
            } catch(e) {
                console.error("No se pudo parsear JSON:", text);
            }
        });
    }

    document.addEventListener("DOMContentLoaded", cargarPedidos);

function mostrarPedidos(pedidos) {
    const tbody = document.getElementById('listaPedidos');
    tbody.innerHTML = '';

    pedidos.forEach(p => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>${p.PEDIDO_ID}</td>
            <td>${p.USUARIO_ID}</td>
            <td>${p.FECHA}</td>
            <td>${p.TOTAL} €</td>
            <td>${p.DIRECCION}</td>
            <td>
                <button class="btn btn-danger btn-sm"
                        onclick="eliminarPedido(${p.PEDIDO_ID})">
                    Eliminar
                </button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

