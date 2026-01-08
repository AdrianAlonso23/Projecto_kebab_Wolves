<?php
    include_once "controller/HomeController.php";
    include_once "controller/CartaController.php";
    include_once "controller/LoginController.php";
    include_once "controller/ProductosController.php";
    include_once "controller/RegistroController.php";
    include_once "controller/ContactoController.php";
    include_once "controller/AdminController.php";
    include_once "controller/CarritoController.php";
    include_once "controller/ApiController.php";
    include_once "controller/MonedaController.php";
    include_once "controller/PerfilController.php";


    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if (isset($_GET['controller'])) {
        $nombrecontroller = $_GET['controller'] . 'Controller';
        if (class_exists($nombrecontroller)) {
            $controller = new $nombrecontroller();
            $action = $_GET['action'];
            if(isset($action) && method_exists($controller, $action)){
                $controller->$action();
            } else {
                header("Location:404.php");
            }
        } 
        else {
            echo "controller no encontrado: " . $nombrecontroller;
        }
    } else {
        $homeController = new HomeController();
        $homeController->index();
    }

?> 