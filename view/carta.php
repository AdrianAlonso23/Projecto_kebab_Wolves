<?php
require_once "model/ProductosDAO.php";

$productos = ProductosDAO::getProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <section>
        <div class="carta-container">
            <div class="titulo-carta">
                <h1>Nuestra Carta</h1>
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
                            <p><strong><?=$producto->getPRECIO()?> €</strong></p>
                            <button class="boton-agregar">
                                <a class="texto-boton" href="#">Agregar</a>
                            </button>
                        </div>
                        <div class="linea-amarilla"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
