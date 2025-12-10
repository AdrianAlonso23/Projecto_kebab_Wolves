<?php
include_once 'controller/ProductosController.php';

if(isset($_GET['controller'])){
    $nombre_controller = $_GET['controller'].'Controller'; 
    if(class_exists($nombre_controller)){
        $controller = new $nombre_controller();
        $action = $_GET['action'] ?? null;
        if($action && method_exists($controller, $action)){
            $controller->$action();
        } else {
            header("Location: 404.php");
        }
    }
} else {
    $controller = new ProductosController();
    $controller->index();
}
?>  