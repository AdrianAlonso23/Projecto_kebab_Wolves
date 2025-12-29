    let modalEditarProducto;

    document.addEventListener("DOMContentLoaded", () => {
        // Inicializa el modal de Bootstrap
        const modalEl = document.getElementById('modalEditarProducto'); // id de tu modal en HTML
        modalEditarProducto = new bootstrap.Modal(modalEl);

        cargarProductos();
    });


    let modalCrearProducto;

    document.addEventListener("DOMContentLoaded", () => {
        modalCrearProducto = new bootstrap.Modal(
            document.getElementById('modalCrearProducto')
        );
    });
    
    class Producto {
        constructor(PRODUCTO_ID, NOMBRE, DESCRIPCION, PRECIO, CATEGORIA_ID, IMAGEN){
            this.PRODUCTO_ID = PRODUCTO_ID;
            this.NOMBRE = NOMBRE;
            this.DESCRIPCION = DESCRIPCION;
            this.PRECIO = PRECIO;
            this.CATEGORIA_ID = CATEGORIA_ID;
            this.IMAGEN = IMAGEN;
        }
    }
function mostrarProductos(productos) {
    const container = document.getElementById('productosContainer');

    // Borra SOLO las cards de productos (no la de agregar)
    container.querySelectorAll('.card.producto').forEach(card => card.remove());

    productos.forEach(producto => {
        const div = document.createElement('div');
        div.classList.add('card', 'producto');
        div.style.width = '18rem';

        div.innerHTML = `
            <img src="public/img/${producto.IMAGEN}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">${producto.NOMBRE}</h5>
                <p class="card-text">${producto.DESCRIPCION}</p>
                <p class="card-text"><strong>Precio:</strong> $${producto.PRECIO}</p>
            </div>
            <div class="d-flex justify-content-between">
                <button class="btn btn-warning btn-sm btnEditar">Editar Producto</button>
                <button class="btn btn-danger btn-sm btnEliminar">Eliminar Producto</button>
            </div>
        `;

        container.appendChild(div);

        div.querySelector('.btnEditar')
            .addEventListener('click', () => abrirModalEdicion(producto));

        div.querySelector('.btnEliminar')
            .addEventListener('click', () => eliminarProducto(producto.PRODUCTO_ID));
    });
}

    function cargarProductos() {
        fetch('http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=getProductos')
            .then(response => response.json())
            .then(data => {
                const productos = data.map(p => new Producto(
                    p.PRODUCTO_ID,
                    p.NOMBRE,
                    p.DESCRIPCION,
                    p.PRECIO,
                    p.CATEGORIA_ID,
                    p.IMAGEN
                ));

                mostrarProductos(productos);
                productos.forEach(producto => console.log('Producto:', producto));
            })
        .catch(err => console.error('Error al cargar productos:', err));
    }

    document.addEventListener("DOMContentLoaded", cargarProductos);


// Abrir modal y rellenar campos
function abrirModalEdicion(producto) {
    document.getElementById('editProductoId').value = producto.PRODUCTO_ID;
    document.getElementById('editProductoNombre').value = producto.NOMBRE;
    document.getElementById('editProductoDescripcion').value = producto.DESCRIPCION;
    document.getElementById('editProductoPrecio').value = producto.PRECIO;
    document.getElementById('editProductoCategoria').value = producto.CATEGORIA_ID;
    document.getElementById('editProductoImagen').value = producto.IMAGEN || '';

    modalEditarProducto.show();
}

// Guardar cambios del producto (PUT)
function guardarEdicionProducto(e) {
    e.preventDefault();

    const producto = {
        PRODUCTO_ID: parseInt(document.getElementById('editProductoId').value),
        NOMBRE: document.getElementById('editProductoNombre').value,
        DESCRIPCION: document.getElementById('editProductoDescripcion').value,
        PRECIO: parseFloat(document.getElementById('editProductoPrecio').value),
        CATEGORIA_ID: parseInt(document.getElementById('editProductoCategoria').value),
        IMAGEN: document.getElementById('editProductoImagen').value
    };

    fetch('?controller=Api&action=updateProducto', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json; charset=UTF-8' },
        body: JSON.stringify(producto)
    })
    .then(res => res.json())
    .then(resp => {
        if (resp.success) {
            modalEditarProducto.hide();
            cargarProductos();
            alert('Producto actualizado correctamente');
        } else {
            alert(resp.error || 'Error al actualizar producto');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error al actualizar producto');
    });
}

function abrirModalAgregarProducto() {
    document.getElementById('formCrearProducto').reset();
    modalCrearProducto.show();
}

function crearProducto(e) {
    e.preventDefault();

    const producto = {
        NOMBRE: document.getElementById('crearProductoNombre').value,
        DESCRIPCION: document.getElementById('crearProductoDescripcion').value,
        PRECIO: parseFloat(document.getElementById('crearProductoPrecio').value),
        CATEGORIA_ID: parseInt(document.getElementById('crearProductoCategoria').value),
        IMAGEN: document.getElementById('crearProductoImagen').value
    };

    fetch('http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=createProducto', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json; charset=UTF-8' },
        body: JSON.stringify(producto)
    })
    .then(res => res.json())
    .then(resp => {
        if (resp.success) {
            modalCrearProducto.hide();
            cargarProductos();
            alert('Producto creado correctamente');
        } else {
            alert(resp.error || 'Error al crear producto');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error al crear producto');
    });
}

function eliminarProducto(id) {
    if (!confirm('¿Seguro que deseas eliminar este producto?')) return;

    fetch(`http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=deleteProducto&id=${id}`, {
        method: 'DELETE'
    })
    .then(res => res.json())
    .then(resp => {
        if (resp.success) {
            alert('Producto eliminado correctamente');
            cargarProductos();
        } else {
            alert(resp.error || 'Error al eliminar producto');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error al eliminar producto');
    });
}




