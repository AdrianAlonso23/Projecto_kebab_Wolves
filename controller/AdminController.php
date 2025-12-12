<?php
    include_once "model/ProductosDAO.php";

    class AdminController {

        public function index() {
            $view = "admin.php";
            include "view/main.php";
        }
        /***********Apis JSON *************/

        public function getProductos() {
            $productos = ProductosDAO::getProductos();
            header('Content-Type: application/json; charset=utf-8');
            $data = [];
            foreach ($productos as $producto) {
                $data[] = $producto->toArray();
            }
            echo json_encode($data);
        }

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

        public function getUsuarios() {
            $usuarios = UsuariosDAO::getUsuarios();

            header('Content-Type: application/json');

            $data = [];
            foreach ($usuarios as $u) {
                $data[] = $u->toArray();
            }

            echo json_encode($data);
        }
    }
?>