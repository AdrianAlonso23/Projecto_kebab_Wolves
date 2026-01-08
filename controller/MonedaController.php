<?php
    require_once "model/PedidosDAO.php";

    class MonedaController {
        public function getPedidosMoneda() {
            header('Content-Type: application/json; charset=utf-8');

            $pedidos = PedidosDAO::getPedidos();
            $resultado = [];

            foreach ($pedidos as $p) {
                $pedido = $p->toArray();
                $pedido['LINEAS'] = $p->LINEAS ?? [];
                $pedido['MONEDA'] = 'EUR'; // siempre se envía en EUR
                $resultado[] = $pedido;
            }

            echo json_encode($resultado);
            exit;
        }
    }
?>