<?php
    include_once "model/ProductosDAO.php";
    include_once "model/CategoriasDAO.php";
    include_once "model/UsuarioDAO.php";

    class AdminController {

        public function index() {
            $view = "admin.php";
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

        public function getUsuarios() {
            $usuarios = UsuarioDAO::getUsuarios();

            header('Content-Type: application/json; charset=utf-8');

            $data = [];
            foreach ($usuarios as $u) {
                $data[] = $u->toArray();
            }

            echo json_encode($data);
            exit;
        }
    }
?>