<?php
    require_once "model/CategoriasDAO.php";
    require_once "model/UsuarioDAO.php";
    require_once "model/ProductosDAO.php";
    require_once "model/PedidosDAO.php";
    require_once "model/LineaPedidosDAO.php";
    require_once "model/LineaPedidos.php";
    require_once "model/Usuario.php";
    require_once "model/Productos.php";
    require_once "model/Pedidos.php";
    require_once "model/OfertasDAO.php";
    require_once "model/Ofertas.php";
    

    class ApiController{

        public function getCategorias() {
            $categoria = CategoriasDAO::getCategorias();

            header('Content-Type: application/json; charset=utf-8');

            $data = [];
            foreach ($categoria as $c) {
                $data[] = $c->toArray();
            }

            echo json_encode($data);
            exit;
        }

        /*********************************************USUARIOS*************************************************************/

        public function getUsuarios() {
            $usuarios = UsuarioDAO::getUsuarios();

            header('Content-Type: application/json; charset=utf-8');

            $data = [];
            foreach ($usuarios as $u) {
                $data[] = $u->toArray();
            }

            echo json_encode($data);
            exit;
        }

        public function getUsuarioById() {
            $id = $_GET['id'] ?? null;

            if (!$id) {
                echo json_encode(['error' => 'ID no recibido']);
                exit;
            }

            $usuario = UsuarioDAO::getUsuarioById($id);

            if (!$usuario) {
                echo json_encode(['error' => 'Usuario no encontrado']);
                exit;
            }

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($usuario->toArray());
            exit;
        }

        public function updateUsuario() {
            header('Content-Type: application/json; charset=utf-8');

            $method = $_SERVER['REQUEST_METHOD'];
            if ($method !== 'PUT') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            // Leer el JSON crudo
            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);

            // Validar que JSON sea válido
            if (!$data) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'JSON inválido']);
                exit;
            }

            // validamos los campos usando el operador ?? para evitar notices
            $id = $data['USUARIO_ID'] ?? null;
            $nombre = $data['NOMBRE'] ?? '';
            $correo = $data['CORREO'] ?? '';
            $contrasena = $data['CONTRASENA'] ?? '';
            $telefono = $data['TELEFONO'] ?? '';
            $rol = $data['ROL'] ?? '';

            if (!$id) {
                echo json_encode(['success' => false, 'error' => 'ID no recibido']);
                exit;
            }

            // Crear el objeto usuario
            $usuario = new Usuario();
            $usuario->setUSUARIO_ID($id);
            $usuario->setNOMBRE($nombre);
            $usuario->setCORREO($correo);
            $usuario->setCONTRASENA($contrasena);
            $usuario->setTELEFONO($telefono);
            $usuario->setROL($rol);

            // Actualizar usando DAO
            $result = UsuarioDAO::updateUsuario($usuario);

            if ($result['success']) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => $result['error']]);
            }

            exit;
        }

        public function createUsuario() {
            header('Content-Type: application/json; charset=utf-8');

            $method = $_SERVER['REQUEST_METHOD'];
            if ($method !== 'PUT') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            // Leer JSON crudo
            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'JSON inválido']);
                exit;
            }

            // Validar campos
            $nombre = $data['NOMBRE'] ?? '';
            $correo = $data['CORREO'] ?? '';
            $contrasena = $data['CONTRASENA'] ?? '';
            $telefono = $data['TELEFONO'] ?? '';
            $rol = $data['ROL'] ?? '';

            if (!$nombre || !$correo || !$contrasena) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'Faltan campos obligatorios']);
                exit;
            }

            // Crear objeto usuario
            $usuario = new Usuario();
            $usuario->setNOMBRE($nombre);
            $usuario->setCORREO($correo);
            $usuario->setCONTRASENA($contrasena);
            $usuario->setTELEFONO($telefono);
            $usuario->setROL($rol);

            // Insertar usando DAO
            $ok = UsuarioDAO::createUsuario($usuario);

            if ($ok['success'] ?? false) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode([
                    'success' => false,
                    'error' => $ok['error'] ?? 'No se pudo crear el usuario'
                ]);
            }

            exit;
        }


        // Eliminar un usuario (DELETE)
        public function deleteUsuario() {
            header('Content-Type: application/json; charset=utf-8');

            if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            $id = $_GET['id'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'ID no recibido']);
                exit;
            }

            $ok = UsuarioDAO::deleteUsuario($id);

            if ($ok['success'] ?? false) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => $ok['error'] ?? 'No se pudo eliminar el usuario']);
            }

            exit;
        }

        /*********************************************PRODUCTOS*************************************************************/

        public function getProductos() {
            $productos = ProductosDAO::getProductos();

            header('Content-Type: application/json; charset=utf-8');

            $data = [];
            foreach ($productos as $p) {
                $data[] = $p->toArray();
            }

            echo json_encode($data);
            exit;
        }
        
        public function getProductosAdmin() {
            $productos = ProductosDAO::getProductosAdmin(); 

            header('Content-Type: application/json; charset=utf-8');

            $data = [];

            foreach ($productos as $p) {
                // $p ahora es array
                $precio_final = $p['PRECIO']; 

                if (!empty($p['OFERTA'])) {
                    if (!empty($p['OFERTA']['PORCENTAJE']) && $p['OFERTA']['PORCENTAJE'] > 0) {
                        $precio_final = $p['PRECIO'] * (1 - $p['OFERTA']['PORCENTAJE'] / 100);
                    } elseif (!empty($p['OFERTA']['DESCUENTO_FIJO']) && $p['OFERTA']['DESCUENTO_FIJO'] > 0) {
                        $precio_final = $p['PRECIO'] - $p['OFERTA']['DESCUENTO_FIJO'];
                    }
                }

                // Añadimos PRECIO_FINAL al array
                $p['PRECIO_FINAL'] = $precio_final;

                $data[] = $p;
            }

            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            exit;
        }

        public function updateProducto() {
            header('Content-Type: application/json; charset=utf-8');

            $method = $_SERVER['REQUEST_METHOD'];
            if ($method !== 'PUT') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            // Leer el JSON crudo
            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);

            // Validar que JSON sea válido
            if (!$data) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'JSON inválido']);
                exit;
            }

            $id          = $data['PRODUCTO_ID'] ?? null;
            $nombre      = $data['NOMBRE'] ?? '';
            $descripcion = $data['DESCRIPCION'] ?? '';
            $precio      = $data['PRECIO'] ?? 0;
            $categoria   = $data['CATEGORIA_ID'] ?? 0;
            $imagen      = $data['IMAGEN'] ?? '';
            $oferta      = $data['OFERTA_ID'] ?? null; 

            if (!$id || !$nombre) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'Faltan campos obligatorios']);
                exit;
            }

            $producto = new Productos();
            $producto->setPRODUCTO_ID($id);
            $producto->setNOMBRE($nombre);
            $producto->setDESCRIPCION($descripcion);
            $producto->setPRECIO($precio);
            $producto->setCATEGORIA_ID($categoria);
            $producto->setIMAGEN($imagen);
            $producto->setOFERTA_ID($oferta); 

            $ok = ProductosDAO::updateProducto($producto);

            if ($ok['success'] ?? false) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => $ok['error'] ?? 'No se pudo actualizar el producto']);
            }

            exit;
        }

        public function createProducto() {
            header('Content-Type: application/json; charset=utf-8');

            $method = $_SERVER['REQUEST_METHOD'];
            if ($method !== 'PUT') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            // Leer el JSON crudo
            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);

            // Validar que JSON sea válido
            if (!$data) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'JSON inválido']);
                exit;
            }

            $nombre = $data['NOMBRE'] ?? '';
            $descripcion = $data['DESCRIPCION'] ?? '';
            $precio = $data['PRECIO'] ?? 0;
            $categoria = $data['CATEGORIA_ID'] ?? 0;
            $imagen = $data['IMAGEN'] ?? '';
            $oferta = $data['OFERTA_ID'] ?? null; 

            if (!$nombre || !$descripcion || !$precio || !$categoria) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'Faltan campos obligatorios']);
                exit;
            }

            $producto = new Productos();
            $producto->setNOMBRE($nombre);
            $producto->setDESCRIPCION($descripcion);
            $producto->setPRECIO($precio);
            $producto->setCATEGORIA_ID($categoria);
            $producto->setIMAGEN($imagen);
            $producto->setOFERTA_ID($oferta); 

            $ok = ProductosDAO::createProducto($producto);

            if ($ok['success'] ?? false) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => $ok['error'] ?? 'No se pudo crear el producto']);
            }

            exit;
        }

        public function deleteProducto() {
            header('Content-Type: application/json; charset=utf-8');

            if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            $id = $_GET['id'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'ID no recibido']);
                exit;
            }

            $ok = ProductosDAO::deleteProducto($id);

            if ($ok['success'] ?? false) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => $ok['error'] ?? 'No se pudo eliminar el producto']);
            }

            exit;
        }

        /*********************************************PEDIDOS*************************************************************/

        public function getPedidos() {
            header('Content-Type: application/json; charset=utf-8');

            $pedidos = PedidosDAO::getPedidos();
            $data = [];

            foreach ($pedidos as $p) {
                $data[] = $p->toArray();
            }

            echo json_encode($data);
            exit;
        }

        
        public function createPedido() {
            header('Content-Type: application/json; charset=utf-8');

            $method = $_SERVER['REQUEST_METHOD'];
            if ($method !== 'PUT') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);

            if (!$data) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'JSON inválido']);
                exit;
            }

            $usuarioId  = $data['usuario_id'] ?? null;
            $nombre     = $data['nombre'] ?? '';
            $apellido   = $data['apellido'] ?? '';
            $correo     = $data['correo'] ?? '';
            $telefono   = $data['telefono'] ?? '';
            $direccion  = $data['direccion'] ?? '';
            $carrito    = $data['carrito'] ?? [];

            if (!$usuarioId || !$nombre || !$correo || !$direccion || empty($carrito)) {
                echo json_encode(['success' => false, 'error' => 'Faltan campos obligatorios']);
                exit;
            }

            //Crear el pedido
            $pedido = new Pedidos();
            $pedido->setUSUARIO_ID($usuarioId);
            $pedido->setFECHA(date('Y-m-d H:i:s'));
            
            // Calcular total automáticamente
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            $pedido->setTOTAL($total);

            $pedido->setDIRECCION($direccion);
            $pedido->setTELEFONO($telefono);
            $pedido->setESTADO('PENDIENTE');

            $result = PedidosDAO::createPedido($pedido);

            if (!$result['success']) {
                echo json_encode(['success' => false, 'error' => 'Error al crear el pedido']);
                exit;
            }

            $pedidoId = $result['pedido_id'];

            // Crear las líneas del pedido
            foreach ($carrito as $item) {
                $linea = new LineaPedidos();
                $linea->setPEDIDO_ID($pedidoId);
                $linea->setPRODUCTO_ID($item['id']);
                $linea->setCANTIDAD($item['cantidad']);
                $linea->setPRECIO_UNITARIO($item['precio']);
                $linea->setSUBTOTAL($item['cantidad'] * $item['precio']);

                LineaPedidosDAO::createLineaPedido($linea);
            }

            echo json_encode(['success' => true, 'pedido_id' => $pedidoId]);
            exit;
        }


        public function updatePedido() {
            header('Content-Type: application/json; charset=utf-8');

            $method = $_SERVER['REQUEST_METHOD'];
            if ($method !== 'PUT') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            // Leer el JSON crudo
            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);

            // Validar que JSON sea válido
            if (!$data) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'JSON inválido']);
                exit;
            }

            // Validar campos usando ?? para evitar notices
            $id        = $data['PEDIDO_ID'] ?? null;
            $usuarioId = $data['USUARIO_ID'] ?? null;
            $fecha     = $data['FECHA'] ?? null;
            $total     = $data['TOTAL'] ?? null;
            $direccion = $data['DIRECCION'] ?? '';
            $telefono  = $data['TELEFONO'] ?? '';
            $estado    = $data['ESTADO'] ?? '';

            if (!$id || !$usuarioId || !$fecha || !$total || !$estado) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'Faltan campos obligatorios']);
                exit;
            }

            // Crear el objeto Pedido
            $pedido = new Pedidos();
            $pedido->setPEDIDO_ID($id);
            $pedido->setUSUARIO_ID($usuarioId);
            $pedido->setFECHA($fecha);
            $pedido->setTOTAL($total);
            $pedido->setDIRECCION($direccion);
            $pedido->setTELEFONO($telefono);
            $pedido->setESTADO($estado);

            // Actualizar usando DAO
            $result = PedidosDAO::updatePedido($pedido);

            if ($result['success']) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => $result['error']]);
            }

            exit;
        }


        // Eliminar un pedido (DELETE)
        public function deletePedido() {
            header('Content-Type: application/json; charset=utf-8');

            if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
                http_response_code(405);
                echo json_encode(['success' => false, 'error' => 'Método no permitido']);
                exit;
            }

            $id = $_GET['id'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'ID no recibido']);
                exit;
            }

            $ok = PedidosDAO::deletePedido($id);

            if ($ok['success'] ?? false) {
                echo json_encode(['success' => true]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => $ok['error'] ?? 'No se pudo eliminar el pedido']);
            }

            exit;
        }

        /*********************************************OFERTAS*************************************************************/

        public function getOfertas() {
            header('Content-Type: application/json; charset=utf-8');

            $ofertas = OfertasDAO::getOfertas();
            $data = [];

            foreach ($ofertas as $o) {
                $data[] = $o->toArray();
            }

            echo json_encode($data);
            exit;
        }
    }
?>