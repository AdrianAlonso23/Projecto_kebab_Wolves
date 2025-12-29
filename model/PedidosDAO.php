<?php
require_once "database/database.php";
require_once "model/Pedidos.php";

class PedidosDAO {

    // Obtener todos los pedidos
    public static function getPedidos() {
        $con = Database::connect();
        $sql = "SELECT * FROM pedidos";
        $result = $con->query($sql);

        $pedidos = [];

        while ($row = $result->fetch_assoc()) {
            $pedido = new Pedidos();
            $pedido->setPEDIDO_ID($row['PEDIDO_ID']);
            $pedido->setUSUARIO_ID($row['USUARIO_ID']);
            $pedido->setFECHA($row['FECHA']);
            $pedido->setTOTAL($row['TOTAL']);
            $pedido->setDIRECCION($row['DIRECCION']);

            $pedidos[] = $pedido;
        }

        return $pedidos;
    }

    // Crear pedido
    public static function createPedido($pedido) {
        $con = Database::connect();

        $sql = "INSERT INTO pedidos (USUARIO_ID, FECHA, TOTAL, DIRECCION)
                VALUES (?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        if (!$stmt) {
            return ['success' => false, 'error' => $con->error];
        }

        $stmt->bind_param(
            "isds",
            $pedido->getUSUARIO_ID(),
            $pedido->getFECHA(),
            $pedido->getTOTAL(),
            $pedido->getDIRECCION()
        );

        if (!$stmt->execute()) {
            return ['success' => false, 'error' => $stmt->error];
        }

        return ['success' => true];
    }

    // Eliminar pedido
    public static function deletePedido($id) {
        $con = Database::connect();

        $stmt = $con->prepare("DELETE FROM pedidos WHERE PEDIDO_ID = ?");
        if (!$stmt) {
            return ['success' => false, 'error' => $con->error];
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            return ['success' => false, 'error' => $stmt->error];
        }

        return ['success' => true];
    }
}
