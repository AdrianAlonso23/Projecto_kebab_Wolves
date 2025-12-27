<header>
    <!-- Navbar superior -->
    <div class="fondo-nav-superior">
        <nav class="nav-superior">
            <div>
                <ul class="nav-ul">
                    <li class="ruta-pagina">Kebabwolves.com</li>
                </ul>
            </div>
            <div class="div-ul">
                <ul class="nav-ul">
                    <li class="menu-ul"><a href="?controller=Login&action=index">Iniciar Sesion</a></li>
                    <li class="menu-ul"><a href="?controller=Registro&action=index">Registrarse</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Navbar principal -->
    <div class="fondo-nav-principal">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="?controller=Home&action=index">
                    <img src="public/img/Sin_logo_sin_fonfo-removebg-preview.png" alt="" width="75px">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=Home&action=index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=Carta&action=index">Carta
                                <svg fill="#000000" width="15px" height="15px" viewBox="0 0 32 32">
                                    <path d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=Contacto&action=index">Contacto</a>
                        </li>
                    </ul>
                </div>

                <!-- Perfil y Carrito -->
                <div class="d-flex justify-content-end align-items-center gap-4">
                    <?php if (isset($_SESSION['NOMBRE'])): ?>
                        <p>Logueado como <strong><?= $_SESSION['NOMBRE'] ?></strong>(<?= $_SESSION['ROL'] ?>)</p>
                    <?php else: ?>
                        <p>No has iniciado sesión</p>
                    <?php endif; ?>

                    <div class="perfil">
                        <?php if (isset($_SESSION['ROL']) && $_SESSION['ROL'] === 'admin'): ?>
                            <a href="?controller=Admin&action=index" class="text-dark d-flex align-items-center g-5">
                        <?php else: ?>
                            <a href="?controller=Home&action=index" class="text-dark d-flex align-items-center g-5">
                        <?php endif; ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10.5 8 10.5s4.757.726 5.468 1.87A7 7 0 0 0 8 1z"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Botón Carrito -->
                    <div class="carrito">
                        <button id="btnCarrito" class="btn btn-outline-dark position-relative" style="border-radius: 0px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                            <span id="contadorCarrito" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>


