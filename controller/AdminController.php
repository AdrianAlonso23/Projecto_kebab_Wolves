<?php
    include_once "model/ProductosDAO.php";
    include_once "model/CategoriasDAO.php";
    include_once "model/UsuarioDAO.php";

    class AdminController {

        public function index() {
            $view = "admin.php";
            include "view/main.php";
        }

    }
?>