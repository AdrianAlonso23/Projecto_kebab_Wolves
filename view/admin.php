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
    <section id="dashboard"class="section-admin  p-4 w-100">
        <div class="dashboard">
            <h3>Bienvenido al panel de Adminitrador!</h3>
            <p>Desde aquí podrás gestionar los usuarios, productos, categorías y pedidos de la plataforma.</p>
        </div>
    </section>
    <section id="usuarios" class="section-admin  p-4 w-100 ">
        <h3>Usuarios</h3>
        <table>
            <th>
                <td><span><strong>Nombre</span></strong></td>
                <td><span><strong>Correo</span></strong></td>
                <td><span><strong>Télefono</span></strong></td>
                <td><span><strong>Rol</span></strong></td>
            </th>
        </table>
        <div class="div-usuarios">
            <div>
               <ul id="listaUsuarios"></ul> 
            </div>
            <div class="form-usuarios">
                <h3>Crear Usuario</h3>
                <form action="">
                    <label for="">dswsw</label>
                    <input type="text">
                </form>
            </div>
        </div>
        <div>
            <!-- Modal Editar Usuario -->
            <div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="mb-2">
                            <label>Nombre</label>
                            <input type="text" id="editNombre" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>Email</label>
                            <input type="email" id="editCorreo" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>Contraseña</label>
                            <input type="password" id="editContrasena" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>Telefono</label>
                            <input type="tel" id="editTelefono" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label>Rol</label>
                            <select id="editRol" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" id="guardarUsuarioBtn">Guardar</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="pedidos"class="section-admin  p-4 w-100 ">
        <h3>Pedidos</h3>
        <p>dwd</p>
    </section>
    <section id="productos"class="section-admin p-4 w-100">
        <h3>Productos</h3>
        <div id="productosContainer" class="d-flex flex-wrap gap-3"></div>
    </section>
    <section id="categorias" class="section-admin  p-4 w-100">
            <h3>Categorías</h3>
            <ul id="listaCategorias"></ul>
    </section>

</section>
<script>

    const buttons = document.querySelectorAll('.nav-item-admin');
    const sections = document.querySelectorAll('.section-admin');

    const sectionIds = ['dashboard', 'usuarios', 'pedidos', 'productos', 'categorias'];
    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            sectionIds.forEach(id => document.getElementById(id).style.display = 'none');
            document.getElementById(sectionIds[index]).style.display = 'block';
        });
    });


</script>
<script src="public/JS/productos.js"></script>
<script src="public/JS/categorias.js"></script>
<script src="public/JS/usuarios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>