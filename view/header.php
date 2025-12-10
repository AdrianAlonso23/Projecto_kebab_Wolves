<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header>
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
        <div class="fondo-nav-principal">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="?controller=Home&action=index"><img src="public/img/Sin_logo_sin_fonfo-removebg-preview.png" alt="" width="75px"></a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                    
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=Home&action=index">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=Carta&action=index">Carta
                                <svg fill="#000000" width="15px" height="15px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.256 8.606c0-0.269 0.106-0.544 0.313-0.75 0.412-0.412 1.087-0.412 1.5 0l14.119 14.119 13.913-13.912c0.413-0.412 1.087-0.412 1.5 0s0.413 1.088 0 1.5l-14.663 14.669c-0.413 0.413-1.088 0.413-1.5 0l-14.869-14.869c-0.213-0.213-0.313-0.481-0.313-0.756z"></path>
                                </svg>
                            </a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link active" href="?controller=Contacto&action=index">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="carrito">
                    <a href="?controller=Carrito&action=index" class="text-dark">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 14H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM3.14 6l1.25 6h8.22l1.25-6H3.14zM5 12a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm6 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                        </svg>
                    </a>
                </div>
            </nav>
        </div>  
    </header>
</body>
</html>