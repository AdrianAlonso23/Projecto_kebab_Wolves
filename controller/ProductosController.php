<?php
include_once 'model/ProductosDAO.php';

class ProductosController {

    public function index() {
        $listaproductos = ProductosDAO::getProductos();
        $view = 'view/productos/index.php';
        include_once 'view/main.php';
    }
}
?>