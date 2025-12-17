<?php
    include_once "model/ProductosDAO.php";
    include_once "model/CategoriasDAO.php";
    include_once "model/UsuarioDAO.php";

    class AdminController {

        public function index() {
            $view = "admin.php";
            include "view/main.php";
        }

        public function __construct() {
            if (!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'admin') {
                header('Location: index.php');
                exit;
            }
        }
    }
?>