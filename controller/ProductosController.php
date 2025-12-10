<?php
include_once 'model/ProductosDAO.php';

class ProductosController {

    public function show(){
        $PRODUCTO_ID = $_GET['PRODUCTO_ID'];                   
        $producto = ProductosDAO::getproductosByID($PRODUCTO_ID);  
        $view = 'productos/show.php';                         
        include_once 'view/main.php';                         
    }


    public function index() {
        $listaproductos = ProductosDAO::getProductos(); 
        $view = 'productos/index.php';                  
        include_once 'view/main.php';                   
    }

    
}
?> 
