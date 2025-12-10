<?php
include_once 'model/ProductosDAO.php';

class ProductosController {

    public function index() {
        $listaproductos = ProductosDAO::getProductos();
        $view = 'view/productos/index.php';
        include_once 'view/main.php';
    }

    public function show() {
        $PRODUCTO_ID = $_GET['PRODUCTO_ID'];
        $producto = ProductosDAO::getProductosByID($PRODUCTO_ID);
        $view = 'view/productos/show.php';
        include_once 'view/main.php';
    }
}
?>