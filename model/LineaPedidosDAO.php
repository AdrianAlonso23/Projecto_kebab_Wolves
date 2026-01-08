<?php
require_once "database/database.php";
require_once "model/LineaPedidos.php";

class LineaPedidosDAO {

    public static function createLineaPedido(LineaPedidos $linea) {
        $con = Database::connect();

        $sql = "INSERT INTO linea_pedidos 
                (PEDIDO_ID, PRODUCTO_ID, CANTIDAD, PRECIO_UNITARIO, SUBTOTAL)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        if (!$stmt) {
            return ['success' => false, 'error' => $con->error];
        }

        $stmt->bind_param(
            "iiidd",
            $linea->getPEDIDO_ID(),
            $linea->getPRODUCTO_ID(),
            $linea->getCANTIDAD(),
            $linea->getPRECIO_UNITARIO(),
            $linea->getSUBTOTAL()
        );

        if (!$stmt->execute()) {
            return ['success' => false, 'error' => $stmt->error];
        }

        return ['success' => true];
    }
}
