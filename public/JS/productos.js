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
        container.innerHTML = ''; 

        productos.forEach(producto => {
            const div = document.createElement('div');
            div.classList.add('card');
            div.style.width = '18rem';

            div.innerHTML = `
                <img src="public/img/${producto.IMAGEN}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">${producto.NOMBRE}</h5>
                    <p class="card-text">${producto.DESCRIPCION}</p>
                    <p class="card-text"><strong>Precio:</strong> $${producto.PRECIO}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-warning btn-sm ">
                        Editar Producto
                    </button>
                    <button class="btn btn-danger btn-sm ">
                        Eliminar Producto
                    </button>
                </div>
            `;

            container.appendChild(div);
        });
    }

    function cargarProductos() {
        fetch('?controller=Api&action=getProductos')
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
