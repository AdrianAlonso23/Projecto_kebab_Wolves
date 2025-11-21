<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebab Wolves</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<?php include_once "view/header.php"; ?>

<section>
    <div class="titulo-populares">
        <h2>Mas Populares</h2> 
    </div>
    <div class="populares">
        <?php foreach($listaproductos as $producto): ?>
            <div class="card" style="width: 24rem;">
                <img src="public/img/<?=$producto->getIMAGEN()?>" class="card-img-top">
                <div class="card-body">
                    <h4><?=$producto->getNOMBRE()?></h4>
                    <p><?=$producto->getDESCRIPCION()?></p>
                    <p><strong><?=$producto->getPRECIO()?> €</strong></p>
                    <a href="index.php?controller=Productos&action=show&PRODUCTO_ID=<?=$producto->getPRODUCTO_ID()?>" class="btn btn-primary">
                        Agregar
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
</body>
</html>
