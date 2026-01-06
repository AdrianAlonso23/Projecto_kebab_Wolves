<?php
    include_once "model";

    class UsuarioController {

        public function index() {
            $view = "perfil.php";
            include "view/main.php";
        }
    }


?>