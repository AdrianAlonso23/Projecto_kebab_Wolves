<?php
    include_once "model/ProductosDAO.php";

    class AdminController {

        public function index() {
            $view = "admin.php";
            include "view/main.php";
        }
    }
?>