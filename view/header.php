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
                <div class="d-flex justify-content-end">
                    <div class="perfil">
                        <a href="?controller=Admin&action=index" class="text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10.5 8 10.5s4.757.726 5.468 1.87A7 7 0 0 0 8 1z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="carrito">
                        <a href="?controller=Carrito&action=index" class="text-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 16 16" class="c-shop-overlay-button__icon">
                                <g>
                                    <path d="M7.06,19.4,5.33,6.88H27.44L25.68,19.4Zm19.29.41L28.22,6.56a.38.38,0,0,0-.09-.3.36.36,0,0,0-.28-.12H5.22L4.4.92A.37.37,0,0,0,4,.61H.92A.38.38,0,0,0,.61,1a.39.39,0,0,0,.31.32H3.71l3.18,21.7a.38.38,0,0,0,.37.31H25.88a.37.37,0,0,0,.37-.38.36.36,0,0,0-.37-.36H7.58l-.39-2.48H26a.38.38,0,0,0,.37-.34" fill="#000"></path>
                                    <path d="M7.06,19.4,5.33,6.88H27.44L25.68,19.4Zm19.29.41L28.22,6.56a.38.38,0,0,0-.09-.3.36.36,0,0,0-.28-.12H5.22L4.4.92A.37.37,0,0,0,4,.61H.92A.38.38,0,0,0,.61,1a.39.39,0,0,0,.31.32H3.71l3.18,21.7a.38.38,0,0,0,.37.31H25.88a.37.37,0,0,0,.37-.38.36.36,0,0,0-.37-.36H7.58l-.39-2.48H26a.38.38,0,0,0,.37-.33Z" fill="#000" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                    <path d="M10.11,28.16a1.49,1.49,0,1,1,1.49-1.49,1.49,1.49,0,0,1-1.49,1.49h0m0-3.72a2.24,2.24,0,1,0,2.24,2.23h0a2.23,2.23,0,0,0-2.23-2.24h0" fill="currentColor"></path>
                                    <path d="M10.11,28.16a1.49,1.49,0,1,1,1.49-1.49,1.49,1.49,0,0,1-1.49,1.49Zm0-3.72a2.24,2.24,0,1,0,2.24,2.23h0a2.23,2.23,0,0,0-2.23-2.24Z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                    <path d="M22.59,28.16a1.49,1.49,0,0,1,0-3,1.47,1.47,0,0,1,1.51,1.47v0a1.49,1.49,0,0,1-1.49,1.49h0m0-3.72a2.24,2.24,0,1,0,2.24,2.23h0a2.23,2.23,0,0,0-2.23-2.24h0" fill="currentColor"></path>
                                    <path d="M22.59,28.16a1.49,1.49,0,0,1,0-3,1.47,1.47,0,0,1,1.51,1.47v0A1.5,1.5,0,0,1,22.59,28.16Zm0-3.72a2.24,2.24,0,1,0,2.24,2.23h0a2.23,2.23,0,0,0-2.23-2.24Z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                    <path d="M9.3,8.64A.37.37,0,0,0,8.93,9h0v8.26a.37.37,0,0,0,.35.37h0a.37.37,0,0,0,.37-.37V9a.36.36,0,0,0-.37-.37" fill="currentColor"></path>
                                    <path d="M9.3,8.64A.37.37,0,0,0,8.93,9h0v8.26a.37.37,0,0,0,.35.37h0a.37.37,0,0,0,.37-.37V9A.36.36,0,0,0,9.3,8.64Z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                    <path d="M12.85,8.64a.38.38,0,0,0-.37.37v8.26a.39.39,0,0,0,.44.31.37.37,0,0,0,.31-.31V9a.37.37,0,0,0-.38-.37" fill="currentColor"></path>
                                    <path d="M12.85,8.64a.38.38,0,0,0-.37.37v8.26a.39.39,0,0,0,.44.31.37.37,0,0,0,.31-.31V9A.37.37,0,0,0,12.85,8.64Z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                    <path d="M16.41,8.64A.37.37,0,0,0,16,9h0v8.26a.37.37,0,0,0,.35.37h0a.37.37,0,0,0,.37-.37V9a.36.36,0,0,0-.37-.37" fill="currentColor"></path>
                                    <path d="M16.41,8.64A.37.37,0,0,0,16,9h0v8.26a.37.37,0,0,0,.35.37h0a.37.37,0,0,0,.37-.37V9A.36.36,0,0,0,16.41,8.64Z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                    <path d="M20,8.64a.38.38,0,0,0-.37.37v8.26a.38.38,0,0,0,.37.37.37.37,0,0,0,.37-.35V9A.36.36,0,0,0,20,8.64" fill="currentColor"></path>
                                    <path d="M20,8.64a.38.38,0,0,0-.37.37v8.26a.38.38,0,0,0,.37.37.37.37,0,0,0,.37-.35V9A.36.36,0,0,0,20,8.64Z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                    <path d="M23.52,8.64a.38.38,0,0,0-.38.37v8.26a.39.39,0,0,0,.44.31.37.37,0,0,0,.31-.31V9a.36.36,0,0,0-.37-.37" fill="currentColor"></path>
                                    <path d="M23.52,8.64a.38.38,0,0,0-.38.37v8.26a.39.39,0,0,0,.44.31.37.37,0,0,0,.31-.31V9A.36.36,0,0,0,23.52,8.64Z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="1.21"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
            </nav>
        </div>  
    </header>
</body>
</html>