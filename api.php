<?php
    include_once "controller/HomeController.php";
    include_once "controller/CartaController.php";
    include_once "controller/LoginController.php";
    include_once "controller/ProductosController.php";
    include_once "controller/RegistroController.php";
    include_once "controller/ContactoController.php";
    include_once "controller/AdminController.php";
    

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if (isset($_GET['controller'])) {
        $nombre_controller = $_GET['controller'].'Controller';
        include_once "controller/$nombre_controller.php";

        if (class_exists($nombre_controller)) {
            $controller = new $nombre_controller();
            $action = $_GET['action'] ?? 'index';

            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                echo "Acción no encontrada";
            }
        }
    } else {
        $controller = new HomeController();
        $controller->index();    
    }
?>