<?php
    include_once 'model/CategoriasDAO.php';
    include_once 'model/ProductosDAO.php';
    include_once 'model/OfertasDAO.php';

    class CartaController {
        public function index() {

            $categorias = CategoriasDAO::getCategorias();
            $categoriaSeleccionada = $_GET['cat'] ?? null;

            if ($categoriaSeleccionada) {
                $listaproductos = ProductosDAO::getProductosByCategoria($categoriaSeleccionada);
            } else {
                $listaproductos = ProductosDAO::getProductos();
            }

            $listadoOfertas = OfertasDAO::getOfertas(); 

            $view = "carta.php";
            include "view/main.php";
        }
    }
?>