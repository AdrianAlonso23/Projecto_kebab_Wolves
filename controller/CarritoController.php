<?php
    include_once("model/CategoriasDAO.php");
    include_once("model/ProductosDAO.php");
    include_once("model/UsuarioDAO.php");
    include_once("model/PedidosDAO.php");
    include_once("model/Pedidos.php");
    include_once("model/LineaPedidos.php");
    include_once("model/LineaPedidosDAO.php");
    class CarritoController {

        public function index() {
            $view = "carrito.php";
            include "view/main.php";
        }

        // Mostrar carrito (puede usarse en ajax)
        public function getCarrito() {
            $carrito = $_SESSION['carrito'] ?? [];
            echo json_encode($carrito);
        }

        // Agregar producto
        public function agregar() {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            $existe = false;
            foreach ($_SESSION['carrito'] as &$p) {
                if ($p['id'] == $id) {
                    $p['cantidad']++;
                    $existe = true;
                    break;
                }
            }
            if (!$existe) {
                $_SESSION['carrito'][] = [
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => 1
                ];
            }

            echo json_encode($_SESSION['carrito']);
        }

        public function pagar() {
            
            if (!isset($_SESSION['USUARIO_ID'])) {
                die("Debes iniciar sesión para hacer un pedido");
            }

            $usuarioId = $_SESSION['USUARIO_ID'];
            // 1. Verificar que llegue el carrito desde el formulario
            $carritoJson = $_POST['carrito'] ?? null;

            if (!$carritoJson) {
                
                echo "El carrito está vacío";
                return;
            }

            $carrito = json_decode($carritoJson, true);

            if (!$carrito || count($carrito) === 0) {
                echo "El carrito está vacío";
                return;
            }

            // 2. Recoger datos del formulario
            $nombre     = $_POST['nombre'] ?? '';
            $apellido   = $_POST['apellido'] ?? '';
            $correo     = $_POST['correo'] ?? '';
            $telefono   = $_POST['telefono'] ?? '';
            $direccion  = $_POST['direccion'] ?? '';

            // 3. Calcular total usando el carrito enviado
            $total = 0;
            foreach ($carrito as $producto) {
                $total += $producto['precio'] * $producto['cantidad'];
            }

            // 4. Crear objeto Pedido
            $pedido = new Pedidos();
            $pedido->setUSUARIO_ID($usuarioId); 
            $pedido->setFECHA(date('Y-m-d H:i:s'));
            $pedido->setTOTAL($total);
            $pedido->setDIRECCION($direccion);
            $pedido->setTELEFONO($telefono);
            $pedido->setESTADO("PENDIENTE");

            // 5. Insertar pedido
            $resultadoPedido = PedidosDAO::createPedido($pedido);

            if (!$resultadoPedido['success']) {
                echo "Error al crear el pedido: " . $resultadoPedido['error'];
                return;
            }

            $pedidoId = $resultadoPedido['pedido_id'];

            // 6. Insertar líneas de pedido usando $carrito
            foreach ($carrito as $producto) {
                $linea = new LineaPedidos();
                $linea->setPEDIDO_ID($pedidoId);
                $linea->setPRODUCTO_ID($producto['id']);
                $linea->setCANTIDAD($producto['cantidad']);
                $linea->setPRECIO_UNITARIO($producto['precio']);
                $linea->setSUBTOTAL($producto['precio'] * $producto['cantidad']);

                $resultadoLinea = LineaPedidosDAO::createLineaPedido($linea);

                if (!$resultadoLinea['success']) {
                    echo "Error al crear línea de pedido";
                    return;
                }
            }

            // 7. Vaciar carrito del navegador (JS se encargará)
            unset($_SESSION['carrito']);
            // 8. Redirigir a confirmación
            header("Location: index.php?controller=Carta&action=index");
            exit;
        }

        private function calcularTotal($carrito) {
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            return $total;
        }

        // Eliminar producto
        public function eliminar() {
            $id = $_POST['id'];
            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $key => $p) {
                    if ($p['id'] == $id) {
                        unset($_SESSION['carrito'][$key]);
                    }
                }
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            }

            echo json_encode($_SESSION['carrito']);
        }
    }
?>
