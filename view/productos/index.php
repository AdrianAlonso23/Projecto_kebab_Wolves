<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acción</th>
    </tr>
    <?php foreach($listaproductos as $producto){ ?>
    <tr>
        <td><?=$producto->getPRODUCTO_ID()?></td>
        <td><?=$producto->getNOMBRE()?></td>
        <td><?=$producto->getDESCRIPCION()?></td>
        <td><?=$producto->getPRECIO()?> €</td>
        <td><img src="public/img/<?=$producto->getIMAGEN()?>" style="width:100px;"></td>
        <td>
            <a href="index.php?controller=Productos&action=show&PRODUCTO_ID=<?=$producto->getPRODUCTO_ID()?>">Ver</a>
        </td>
    </tr>
    <?php } ?>
</table> 
