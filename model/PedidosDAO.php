<?php
require_once "database/database.php";
require_once "model/Pedidos.php";

class PedidosDAO {

    
    public static function getPedidos() {
        $con = Database::connect();

        $sql = "
            SELECT 
                p.PEDIDO_ID AS pedido_id,
                p.USUARIO_ID AS usuario_id,
                u.NOMBRE AS nombre_usuario,
                u.CORREO AS correo_usuario,
                p.FECHA AS fecha,
                p.TOTAL AS total,
                p.DIRECCION AS direccion,
                p.TELEFONO AS telefono,
                p.ESTADO AS estado,
                prod.NOMBRE AS nombre_producto,
                lp.CANTIDAD AS cantidad_producto
            FROM pedidos p
            INNER JOIN usuarios u ON p.USUARIO_ID = u.USUARIO_ID
            INNER JOIN linea_pedidos lp ON lp.PEDIDO_ID = p.PEDIDO_ID
            INNER JOIN productos prod ON lp.PRODUCTO_ID = prod.PRODUCTO_ID
            ORDER BY p.PEDIDO_ID ASC
        ";

        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        $pedidos = [];

        while ($row = $result->fetch_assoc()) {
            $pedidoId = $row['pedido_id'];

            // Si el pedido aún no existe en el array, lo creamos
            if (!isset($pedidos[$pedidoId])) {
                $pedido = new Pedidos();
                $pedido->setPEDIDO_ID($row['pedido_id']);
                $pedido->setUSUARIO_ID($row['usuario_id']);
                $pedido->NOMBRE_USUARIO = $row['nombre_usuario'];
                $pedido->CORREO_USUARIO = $row['correo_usuario'];
                $pedido->setFECHA($row['fecha']);
                $pedido->setTOTAL($row['total']);
                $pedido->setDIRECCION($row['direccion']);
                $pedido->setTELEFONO($row['telefono']);
                $pedido->setESTADO($row['estado']);
                $pedido->LINEAS = []; // array de productos
                $pedidos[$pedidoId] = $pedido;
            }

            // Añadimos el producto y la cantidad a las líneas
            $pedidos[$pedidoId]->LINEAS[] = [
                'nombre' => $row['nombre_producto'],
                'cantidad' => $row['cantidad_producto']
            ];
        }

        $stmt->close();
        $con->close();

        // Devolver array indexado numéricamente
        return array_values($pedidos);
    }

    public static function getPedidosByUsuario($usuario_id) {
        $con = database::connect();
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE USUARIO_ID = ? ORDER BY FECHA DESC");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $pedidos = [];
        while($row = $result->fetch_assoc()) {
            $pedidos[] = $row;
        }

        return $pedidos;
    }

    // Crear pedido
    public static function createPedido(Pedidos $pedido) {
        $con = Database::connect();

        $sql = "INSERT INTO pedidos (USUARIO_ID, FECHA, TOTAL, DIRECCION, TELEFONO, ESTADO)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        if (!$stmt) {
            return ['success' => false, 'error' => $con->error];
        }

        $usuarioId  = $pedido->getUSUARIO_ID();
        $fecha      = $pedido->getFECHA();
        $total      = $pedido->getTOTAL();
        $direccion  = $pedido->getDIRECCION();
        $telefono   = $pedido->getTELEFONO();
        $estado     = $pedido->getESTADO();


        $stmt->bind_param(
            "isdsss",  
            $usuarioId,
            $fecha,
            $total,
            $direccion,
            $telefono,
            $estado
        );

        // Ejecutar la consulta
        if (!$stmt->execute()) {
            return ['success' => false, 'error' => $stmt->error];
        }

        // Obtener el ID correcto
        $pedidoId = $con->insert_id;

        $con->close();
        return ['success' => true, 'pedido_id' => $pedidoId];
    }

    // Actualizar pedido
    public static function updatePedido($pedido) {
        $con = Database::connect();

        $sql = "UPDATE pedidos 
                SET USUARIO_ID = ?, FECHA = ?, TOTAL = ?, DIRECCION = ?, TELEFONO = ?, ESTADO = ?
                WHERE PEDIDO_ID = ?";

        $stmt = $con->prepare($sql);
        if (!$stmt) {
            error_log("Error prepare: " . $con->error);
            return ['success' => false, 'error' => $con->error];
        }

        // Obtener valores y prevenir notices
        $usuarioId   = $pedido->getUSUARIO_ID() ?? 0;
        $fecha       = $pedido->getFECHA() ?? date('Y-m-d H:i:s');
        $total       = $pedido->getTOTAL() ?? 0;
        $direccion   = $pedido->getDIRECCION() ?? '';
        $telefono    = $pedido->getTELEFONO() ?? '';
        $estado      = $pedido->getESTADO() ?? '';
        $id          = $pedido->getPEDIDO_ID() ?? 0;

        // Bind con tipos correctos: i=integer, s=string, d=double
        $stmt->bind_param(
            "isdssssi",
            $usuarioId,
            $fecha,
            $total,
            $direccion,
            $telefono,
            $estado,
            $id
        );

        if (!$stmt->execute()) {
            error_log("Error execute: " . $stmt->error);
            return ['success' => false, 'error' => $stmt->error];
        }

        $con->close();
        return ['success' => true];
    }


    // Eliminar pedido
    public static function deletePedido($id) {
        $con = database::connect();

        //Borrar las líneas del pedido
        $stmt1 = $con->prepare("DELETE FROM linea_pedidos WHERE PEDIDO_ID = ?");
        if (!$stmt1) return ['success' => false, 'error' => $con->error];
        $stmt1->bind_param("i", $id);
        if (!$stmt1->execute()) return ['success' => false, 'error' => $stmt1->error];
        $stmt1->close();

        // Borrar el pedido
        $stmt2 = $con->prepare("DELETE FROM pedidos WHERE PEDIDO_ID = ?");
        if (!$stmt2) return ['success' => false, 'error' => $con->error];
        $stmt2->bind_param("i", $id);
        if (!$stmt2->execute()) return ['success' => false, 'error' => $stmt2->error];
        $stmt2->close();

        $con->close();

        return ['success' => true];
    }
}
