<?php
    include_once "model/ProductosDAO.php";

    class AdminController {

        public function index() {
            $view = "admin.php";
            include "view/main.php";
        }

        /***********Apis JSON *************/
        public function getCategorias() {
            include_once 'model/CategoriasDAO.php';
            $categorias = CategoriasDAO::getCategorias();
            header('Content-Type: application/json; charset=utf-8');
            $data = [];
            foreach ($categorias as $categoria) {
                $data[] = $categoria->toArray();
            }
            echo json_encode($data);
        }
    }
?>