<style>
    section {
        display: none;
    };
</style>
<section class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="40" height="32"></svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <button>
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            Home
            </button>
        </li>
        <li>
            <button>
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Dashboard
            </buttton>
        </li>
        <li>
            <button>
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Orders
            </button>
        </li>
        <li>
            <button>
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Products
            </button>
        </li>
        <li>
            <button>
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
            Customers
            </button>
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
            <li><a class="dropdown-item" href="#">Cerrar Sesion</a></li>
        </ul>
        </div>
    </div>
    <section class="section1  p-4 w-100">
        <?php echo('deide')?>;
    </section>
    <section class="section2  p-4 w-100 ">
        <ul id="listaUsuarios"></ul>
    </section>
    <section class="section3  p-4 w-100 ">
        <ul id="listaCategorias"></ul>
    </section>
    <section class="section4  p-4 w-100 ">
        <?php echo('4eide')?>;
    </section>
    <section class="section5  p-4 w-100">
        <div>
            <p>dfedwed</p>
        </div>
    </section>
</section>
<script>
    /****fetch api de categorias *****/
    document.addEventListener("DOMContentLoaded", fetchCategorias);

    function fetchCategorias() {
        fetch('?controller=Admin&action=getCategorias')
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


    class Usuario {
        constructor(id, nombre, email, telefono, rol) {
            this.usuario_id = id;
            this.nombre = nombre;
            this.email = email;
            this.telefono = telefono;
            this.rol = rol;
        }
    }
    
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>