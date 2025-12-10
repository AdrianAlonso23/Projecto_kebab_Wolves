<?php
include_once "model/ProductosDAO.php";

class HomeController {

    public function index() {
        $listaproductos = ProductosDAO::getProductos();
        $view = "home.php";
        include "view/main.php";
    }
}
?>