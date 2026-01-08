    <section>
        <div class="carta-container">
            <div class="titulo-carta">
                <h1>CARTA</h1>
            </div>
            <div>
                <ul class="listas-categorias d-flex">
                    <?php foreach ($categorias as $cat): ?>
                        <li class="lista-categoria">
                            <a href="index.php?controller=Carta&action=index&cat=<?= $cat->getCATEGORIA_ID() ?>"><?= $cat->getNOMBRE_CATEGORIA() ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="d-flex row g-0">
                <?php foreach($listaproductos as $producto): ?>
                    <div class="col-12 col-md-3 d-flex justify-content-center mb-4">
                        <div class="contenido-producto mb-5" style="width:24rem;">
                            <img src="public/img/<?=$producto->getIMAGEN()?>" class="card-img"> 
                            <div class="linea-amarilla"></div>
                            <div class="cuerpo-productos">
                                <h4 class="titulo-producto"><?=$producto->getNOMBRE()?></h4>
                                <p class="descripcion-producto"><?=$producto->getDESCRIPCION()?></p>
                                <?php
                                    $precioOriginal = $producto->getPRECIO();
                                    $precioFinal = $precioOriginal;

                                    if($producto->getOFERTA_ID() != null){
                                        $oferta = OfertasDAO::getOfertaById($producto->getOFERTA_ID());

                                        if($oferta){
                                            if($oferta->getPORCENTAJE() > 0){
                                                $precioFinal = $precioOriginal * (1 - $oferta->getPORCENTAJE()/100);
                                            } else {
                                                $precioFinal = $precioOriginal - $oferta->getDESCUENTO_FIJO();
                                            }
                                        }
                                    }
                                ?>
                                <p>
                                    <?php if($precioFinal != $precioOriginal): ?>
                                        <s class="precio-anterior"><strong><?= number_format($precioOriginal,2) ?> €</strong></s>
                                        <span class="precio-oferta"><strong><?= number_format($precioFinal,2) ?> €</strong></span>
                                    <?php else: ?>
                                        <strong><?= number_format($precioOriginal,2) ?> €</strong>
                                    <?php endif; ?>
                                </p>
                                <button class="boton-agregar"
                                onclick='añadirAlCarrito({
                                    id: <?= $producto->getPRODUCTO_ID() ?>,
                                    imagen: "<?= $producto->getIMAGEN() ?>",
                                    nombre: "<?= addslashes($producto->getNOMBRE()) ?>",
                                    precio: <?= $producto->getPRECIO() ?>
                                })'>
                                    <span class="texto-boton">Agregar</span>
                                </button>
                            </div>
                            <div class="linea-amarilla"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>