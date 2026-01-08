<section class="d-flex">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height: 650px;">
        <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-4">Menu Aministración</span>
        </p>
        <hr>
        <ul class=" flex-column mb-auto">
            <li class="nav-item-admin">
                <button type="button">Dashboard</button>
            </li>
            <li class="nav-item-admin">
                <button type="button">Usuarios</button>
            </li>
            <li class="nav-item-admin">
                <button type="button">Pedidos</button>
            </li>
            <li class="nav-item-admin">
                <button type="button">Productos</button>
            </li>
            <li class="nav-item-admin">
                <button type="button">Categorias</button>
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
                <li><a class="dropdown-item" href="?controller=Perfil&action=index">Perfil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="?controller=Login&action=logout">Cerrar Sesión</a></li>
            </ul>
        </div>
    </div>
    <section id="dashboard"class="p-4 w-100">
        <div class="dashboard">
            <h3>Bienvenido al panel de Adminitrador!</h3>
            <p>Desde aquí podrás gestionar los usuarios, productos, categorías y pedidos de la plataforma.</p>
        </div>
    </section>
    <section id="usuarios" class="section-admin  p-4 w-100 ">
        <div class="d-flex justify-content-around">
            <div class="tabla-usuarios">
                <h3>Usuarios</h3>
                <table class="table table-striped text-center align-items-center align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="listaUsuarios"></tbody>
                </table>
            </div>
            <div class="form-usuarios">
                <h3>Crear Usuario</h3>
                <form id="formCrearUsuario" onsubmit="event.preventDefault(); crearUsuario();">
                    <label class="label-usuarios" for="crearNombre">Nombre</label>
                    <input class="input-usuarios" id="crearNombre" type="text" placeholder="Nombre" required>
                    <label class="label-usuarios" for="crearCorreo">Correo</label>
                    <input class="input-usuarios" id="crearCorreo" type="email" placeholder="Correo" required>
                    <label class="label-usuarios" for="crearContrasena">Contraseña</label>
                    <input class="input-usuarios" id="crearContrasena" type="password" placeholder="Contraseña" required>
                    <label class="label-usuarios" for="crearTelefono">Teléfono</label>
                    <input class="input-usuarios" id="crearTelefono" type="text" placeholder="Teléfono">
                    
                    <label class="label-usuarios" for="crearRol">Rol</label>
                    <select id="crearRol" required>
                        <option value="">-</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
    
                    <button class="boton-usuarios" type="submit">Crear usuario</button>
                </form>
            </div>
        </div>
    </section>
    <section id="pedidos" class="section-admin p-4 w-100">
        <div class="d-flex justify-content-between mb-3">
            <div>
                <h3>Pedidos</h3>
            </div>
            <!-- Filtros pedidos -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <input 
                        type="text" 
                        id="filtroUsuario" 
                        class="form-control" 
                        placeholder="Filtrar por usuario">
                </div>

                <div class="col-md-3">
                    <input 
                        type="date" 
                        id="filtroFecha" 
                        class="form-control">
                </div>

                <div class="col-md-3">
                    <select id="ordenPrecio" class="form-select">
                        <option value="">Ordenar por precio</option>
                        <option value="asc">Precio ↑</option>
                        <option value="desc">Precio ↓</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button id="btnAplicarFiltros" class="btn btn-warning">
                        Aplicar filtros
                    </button>
                </div>
            </div>
            <!-- Select de monedas -->
            <div class="d-flex align-items-center">
                <label for="selectMoneda" class="me-2">Moneda:</label>
                <select id="selectMoneda" class="form-select w-auto">
                    <option value="EUR" selected>EUR</option>
                    <option value="USD">USD</option>
                    <option value="CAD">CAD</option>
                </select>
            </div>
        </div>
        <div class="table-container">
            <table class="table table-striped text-center align-items-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Usuario</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Dirección</th>
                        <th>Productos</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="listaPedidos"></tbody>
            </table>
        </div>
    </section>
    <section id="productos"class="section-admin p-4 w-100">
        <h3>Productos</h3>
        <div id="productosContainer" class="d-flex flex-wrap gap-3">
            <div>
                <div class="card card-add-product h-100 d-flex align-items-center justify-content-center"
                    onclick="abrirModalAgregarProducto()">

                    <div class="text-center">
                        <span class="add-icon">+</span>
                        <p class="mt-2">Agregar producto</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section id="categorias" class="section-admin  p-4 w-100">
            <h3>Categorías</h3>
            <ul id="listaCategorias"></ul>
    </section>

</section>
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
                    <button type="button" class="btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="guardarUsuarioBtn">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar Producto -->
<div class="modal fade" id="modalCrearProducto" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form id="formCrearProducto" onsubmit="crearProducto(event)">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" id="crearProductoNombre" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea class="form-control" id="crearProductoDescripcion" required></textarea>
          </div>

          <div class="mb-3">
            <label class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="crearProductoPrecio" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Categoría</label>
            <input type="number" class="form-control" id="crearProductoCategoria" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Imagen</label>
            <input type="text" class="form-control" id="crearProductoImagen">
          </div>
          <div class="mb-3">
            <label class="form-label">Oferta (opcional)</label>
            <select class="form-control" id="crearProductoOferta">
                <option value="">-- Sin oferta --</option>
                <!-- Aquí puedes cargar dinámicamente las ofertas desde PHP -->
                <option value="1">Oferta 1</option>
                <option value="2">Oferta 2</option>
            </select>
        </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="boton-modal-productos" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="boton-modal-productos">Crear producto</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal Editar Producto -->
<div class="modal fade" id="modalEditarProducto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="formEditarProducto" onsubmit="guardarEdicionProducto(event)">
            <div class="modal-header">
            <h5 class="modal-title">Editar Producto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
            <input type="hidden" id="editProductoId">

            <div class="mb-3">
                <label for="editProductoNombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="editProductoNombre" required>
            </div>

            <div class="mb-3">
                <label for="editProductoDescripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="editProductoDescripcion" required></textarea>
            </div>

            <div class="mb-3">
                <label for="editProductoPrecio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="editProductoPrecio" required>
            </div>

            <div class="mb-3">
                <label for="editProductoCategoria" class="form-label">Categoría</label>
                <input type="number" class="form-control" id="editProductoCategoria" required>
            </div>

            <div class="mb-3">
                <label for="editProductoImagen" class="form-label">Imagen</label>
                <input type="text" class="form-control" id="editProductoImagen">
            </div>

            <div class="mb-3">
                <label class="form-label">Oferta (opcional)</label>
                <select class="form-control" id="editProductoOferta">
                    <option value="">-- Sin oferta --</option>
                    <option value="1">Oferta 1</option>
                    <option value="2">Oferta 2</option>
                </select>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="boton-modal-productos" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="boton-modal-productos">Guardar cambios</button>
            </div>
        </form>
        </div>
    </div>
</div>
 <!-- Modal Editar Pedido -->
<div class="modal fade" id="modalEditarPedido" tabindex="-1" aria-labelledby="modalEditarPedidoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditarPedido" onsubmit="guardarEdicionPedido(event)">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarPedidoLabel">Editar Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editPedidoId">

                    <div class="mb-3">
                        <label for="editPedidoUsuario" class="form-label">Usuario ID</label>
                        <input type="number" class="form-control" id="editPedidoUsuario" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPedidoFecha" class="form-label">Fecha</label>
                        <input type="datetime-local" class="form-control" id="editPedidoFecha" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPedidoTotal" class="form-label">Total (€)</label>
                        <input type="number" step="0.01" class="form-control" id="editPedidoTotal" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPedidoDireccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="editPedidoDireccion" required>
                    </div>

                    <div class="mb-3">
                        <label for="editPedidoEstado" class="form-label">Estado</label>
                        <select class="form-control" id="editPedidoEstado" required>
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="EN_PROCESO">EN PROCESO</option>
                            <option value="ENVIADO">ENVIADO</option>
                            <option value="ENTREGADO">ENTREGADO</option>
                            <option value="CANCELADO">CANCELADO</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success" id="guardarPedidoBtn">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
<script src="public/JS/pedidos.js"></script>
