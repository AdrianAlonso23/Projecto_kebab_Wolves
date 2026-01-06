<?php
session_start();
require_once "PedidosDAO.php";
require_once "LineaPedidosDAO.php";

class ConfirmacionController {

    public function index() {
        $listaproductos = ProductosDAO::getProductos();
        $view = "confirmacion.php";
        include "view/main.php";
    }
    
    $pedidoId = $_GET['id'] ?? null;
    
    if (!$pedidoId) {
        header("Location: index.php");
        exit;
    }

    // Obtener el pedido y sus líneas
    $pedido = PedidosDAO::getPedidoById($pedidoId);
    $lineas = LineaPedidosDAO::getLineasByPedidoId($pedidoId);

    // Calcular total
    $total = 0;
    foreach ($lineas as $linea) {
        $total += $linea['SUBTOTAL'];
    }
}
?>