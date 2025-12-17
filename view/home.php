<section>
    <div class="imagen-header">
        <div class="card-bg">
            <h1 class="card-title">KEBAB WOLVES</h1>
            <p class="card-text">Donde el kebab se convierte en leyenda</p>
        </div>
    </div>
    <section class="fondo-populares">
        <div class="titulo-populares container" >
            <h2>MAS POPULARES</h2> 
        </div>
        <div class=" row g-0">
            <?php foreach($listaproductos as $producto): ?>
                <?php if(in_array($producto->getPRODUCTO_ID(), [1,4,3,11])): ?>
                    <div class="col-12 col-md-3 d-flex justify-content-center mb-4">
                        <div class="contenido-producto mb-5" style="width:24rem;">
                            <img src="public/img/<?=$producto->getIMAGEN()?>" class="card-img"> 
                            <div class="linea-amarilla"></div>
                            <div class="cuerpo-productos">
                                <h4 class="titulo-producto"><?=$producto->getNOMBRE()?></h4>
                                <p class="descripcion-producto"><?=$producto->getDESCRIPCION()?></p>
                                <p><strong><?=$producto->getPRECIO()?> €</strong></p>
                                <button class="boton-agregar"
                                onclick='añadirAlCarrito({
                                    id: <?= $producto->getPRODUCTO_ID() ?>,
                                    nombre: "<?= addslashes($producto->getNOMBRE()) ?>",
                                    precio: <?= $producto->getPRECIO() ?>
                                })'>
                                    <span class="texto-boton">Agregar</span>
                                </button>
                            </div>
                            <div class="linea-amarilla"></div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>  
    <section class="fondo-carrusel">
        <div class="titulo-menus">
            <h2>MENUS</h2> 
        </div>
        <?php
            $filtro = array_filter($listaproductos, fn($p) =>
                in_array($p->getPRODUCTO_ID(), [5,6,7,8,9,10])
            );
            $chunks = array_chunk($filtro, 3);
        ?>
        <div id="productosCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php foreach ($chunks as $index => $chunk): ?>
                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                    <div class="d-flex justify-content-center gap-5">
                        <?php foreach ($chunk as $producto): ?>
                        <div class="img-hover-container">
                            <a href=""><img src="public/img/<?=$producto->getIMAGEN()?>" class="img-fija"></a>
                            <div class="hover-text">
                                <div class="descripcion-menu">
                                    <h3 class="texto-menu"><?=$producto->getNOMBRE()?></h3>
                                    <h3 class="texto-menu"><?=$producto->getDESCRIPCION()?></h3>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productosCarousel" data-bs-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40">
                    <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path>
                </svg>        
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#productosCarousel" data-bs-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40" width="40" height="40">
                    <path d="m15.5 0.932-4.3 4.38 14.5 14.6-14.5 14.5 4.3 4.4 14.6-14.6 4.4-4.3-4.4-4.4-14.6-14.6z"></path>
                </svg>
            </button>
        </div>
    </section>
    <section class="section-nosotros">
        <div class="titulo-nosotros">
            <h2>SOBRE NOSOTROS</h2>
        </div>
        <div class="contenedor-nosotros">
            <div class="info-nosotros">
                <div class="dato">
                    <div class="hexagon"><img src="public/iconos/mobile-phone-touch-screen-svgrepo-com.svg"></div>
                    <p>+34 683 924 731</p>
                </div>

                <div class="dato">
                    <div class="hexagon"><img src="public/iconos/email-mails-svgrepo-com.svg"></div>
                    <p>kebabwolves@gmail.com</p>
                </div>

                <div class="dato">
                    <div class="hexagon"><img src="public/iconos/location-svgrepo-com.svg"></div>
                    <div>
                        <p>Waterloo Rd, Wolverhampton</p>
                        <p> WV1 4QR,Reino Unido</p>
                    </div>
                </div>

                <div class="texto-quienes">
                    <h3>¿Quiénes somos?</h3>
                    <p>
                        En <strong>Kebab Wolves</strong> creemos que un buen kebab no es solo comida, es una experiencia. 
                        Nacimos con la idea de combinar tradición y sabor auténtico con un toque moderno.
                        Preparamos nuestras salsas de manera artesanal y cocinamos con pasión para ofrecerte el mejor sabor posible.  
                        Nuestro objetivo es que cada bocado te transporte a nuestras raíces, pero con la fuerza y 
                        energía que caracteriza a la manada de los Wolves.  
                        Aquí no solo servimos kebabs: compartimos momentos, cultura y buena comida.
                    </p>
                </div>
                <div>
                    <button class="boton-contactanos">
                        <a class="texto-boton-contactanos" href="?controller=Contacto&action=index">Contactanos -></a>
                    </button>
                </div>
            </div>

            <div class="mapa-nosotros">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2875.1809118085953!2d-2.1328502685546806!3d52.59017514239421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48709b8575eeb52b%3A0x784fa301fcde3bf1!2sMolineux%20Stadium!5e1!3m2!1ses!2ses!4v1764670683105!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</section>