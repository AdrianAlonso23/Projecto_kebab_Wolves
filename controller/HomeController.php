<?php
include_once "model/ProductosDAO.php";
include_once 'model/CategoriasDAO.php';

class HomeController {

    public function index() {
        $listaproductos = ProductosDAO::getProductos();
        $view = "home.php";
        include "view/main.php";
    }

    
}
?>