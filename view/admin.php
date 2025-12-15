<section class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
        <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Menu Aministración</span>
        </p>
        <hr>
        <ul class=" flex-column mb-auto">
            <li class="nav-item-admin ">
                <button>Historial</button>
            </li>
            <li class="nav-item-admin"> 
                <button>Usuarios</buttton>
            </li>
            <li class="nav-item-admin">
                <button>Pedidos</button>
            </li>
            <li class="nav-item-admin">
                <button>Productos</button>
            </li>
            <li class="nav-item-admin">
                <button>Customers</button>
            </li>
        </ul>
        <hr>
        <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10.5 8 10.5s4.757.726 5.468 1.87A7 7 0 0 0 8 1z"/>
            </svg>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="#">Ajustes</a></li>
            <li><a class="dropdown-item" href="#">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?controller=Home&action=index">Cerrar Sesion</a></li>
        </ul>
        </div>
    </div>
    <section class="section-admin  p-4 w-100">
        <?php echo('deide')?>;
    </section>
    <section class="section-admin  p-4 w-100 ">
        <ul id="listaUsuarios"></ul>
    </section>
    <section class="section-admin  p-4 w-100 ">
        <ul id="listaCategorias"></ul>
    </section>
    <section class="section-admin p-4 w-100">
        <div id="productosContainer" class="d-flex flex-wrap gap-3"></div>
    </section>
    <section class="section-admin  p-4 w-100">
        <div>
            <p>dfedwed</p>
        </div>
    </section>
</section>
<script>
    /****fetch api de categorias *****/
    document.addEventListener("DOMContentLoaded", fetchCategorias);

    function fetchCategorias() {
        fetch('?controller=Api&action=getCategorias')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const lista = document.getElementById('listaCategorias');
            lista.innerHTML = ""; 
            data.forEach(cat => {
                const li = document.createElement('li');
                li.textContent = cat.NOMBRE_CATEGORIA;
                lista.appendChild(li);
            });
        })
    };
    /****fetch api de usuarios *****/
    document.addEventListener("DOMContentLoaded", fetchUsuarios);

    function fetchUsuarios() {
        fetch('?controller=Api&action=getUsuarios')
            .then(response => response.json())
            .then(data => {
                const lista = document.getElementById('listaUsuarios');
                lista.innerHTML = '';

                data.forEach(u => {
                    const li = document.createElement('li');
                    li.textContent = `${u.NOMBRE} - ${u.CORREO} (${u.ROL})`;
                    lista.appendChild(li);
                });
            })
            .catch(err => console.error('Error usuarios:', err));
    };


    const buttons = document.querySelectorAll('button');
    const sections = document.querySelectorAll('section');

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            sections.forEach((section, secIndex) => {
                if (index === secIndex) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }

            });
            buttons.forEach((btn, btnIndex) => {
                if (index === btnIndex) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        });
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
    
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>