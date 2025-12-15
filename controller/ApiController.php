<?php

    class ApiController{

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

        public function getProductos() {
            $productos = ProductosDAO::getProductos();

            header('Content-Type: application/json; charset=utf-8');

            $data = [];
            foreach ($productos as $p) {
                $data[] = $p->toArray();
            }

            echo json_encode($data);
            exit;
        }

    }

?>