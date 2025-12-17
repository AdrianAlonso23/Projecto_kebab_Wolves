<section class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
        <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Menu Aministración</span>
        </p>
        <hr>
        <ul class=" flex-column mb-auto">
            <li class="nav-item-admin ">
                <button>Dashboard</button>
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
                <button>Categorias</button>
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
                <li><a class="dropdown-item" href="?controller=Login&action=logout">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
    <section class="section-admin  p-4 w-100">
        <div class="dashboard">
            <h3>Bienvenido al panel de Adminitrador!</h3>
            <p>Desde aquí podrás gestionar los usuarios, productos, categorías y pedidos de la plataforma.</p>
        </div>
    </section>
    <section class="section-admin  p-4 w-100 ">
        <div id="UsuariosContainer" class="d-flex flex-wrap gap-3"></div>
    </section>
    <section class="section-admin  p-4 w-100 ">
        <p>dwd</p>
    </section>
    <section class="section-admin p-4 w-100">
        <h3>Productos</h3>
        <div id="productosContainer" class="d-flex flex-wrap gap-3"></div>
    </section>
    <section class="section-admin  p-4 w-100">
        <div>
            <h3>Categorías</h3>
            <ul id="listaCategorias"></ul>
        </div>
    </section>
</section>
<script>

    const buttons = document.querySelectorAll('.nav-item-admin');
    const sections = document.querySelectorAll('.section-admin');

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

</script>
<script src="public/JS/productos.js"></script>
<script src="public/JS/categorias.js"></script>
<script src="public/JS/usuarios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
