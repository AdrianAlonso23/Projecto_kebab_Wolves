<?php
include_once 'model/CategoriasDAO.php';
include_once 'model/ProductosDAO.php';

class CartaController {
    public function index() {
        $categorias = CategoriasDAO::getCategorias();
        $categoriaSeleccionada = $_GET['cat'] ?? null;

        if ($categoriaSeleccionada) {
            $listaproductos = ProductosDAO::getProductosByCategoria($categoriaSeleccionada);
        } else {
            $listaproductos = ProductosDAO::getProductos();
        }

        $view = "carta.php";
        include "view/main.php";
    }
    /***********Apis JSON *************/

    public function getCategorias() {
        $categorias = CategoriasDAO::getCategorias();
        header('Content-Type: application/json; charset=utf-8');
        $categorias = CategoriasDAO::getCategorias();
        $data = [];
        foreach ($categorias as $categoria) {
            $data[] = $categoria->toArray();
        }
        echo json_encode($data);
    }
}
