<?php
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
    include_once "controller/HomeController.php";
    $controller = new HomeController();
    $controller->index();    
}
?>