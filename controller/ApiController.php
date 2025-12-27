<?php

    require_once "model/CategoriasDAO.php";
    require_once "model/UsuarioDAO.php";
    require_once "model/ProductosDAO.php";
    

    class ApiController{

        public function getCategorias() {
            $categorias = CategoriasDAO::getCategorias();
            header('Content-Type: application/json; charset=utf-8');
            $categorias = CategoriasDAO::getCategorias();
            $data = [];
            foreach ($categorias as $categoria) {
                $data[] = $categoria->toArray();
            }
            echo json_encode($data);
        }

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
            if ($method !== 'PUT' && $method !== 'POST') {
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

            // ✅ Aquí validamos los campos usando el operador ?? para evitar notices
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

        // Eliminar un usuario (DELETE)
        public function deleteUsuario() {
            header('Content-Type: application/json; charset=utf-8');

            // Solo aceptar DELETE
            if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
                echo json_encode(['error' => 'Método no permitido']);
                exit;
            }

            $id = $_GET['id'] ?? null;
            if (!$id) {
                echo json_encode(['error' => 'ID no recibido']);
                exit;
            }

            $ok = UsuariosDAO::deleteUsuario($id);

            if ($ok) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['error' => 'No se pudo eliminar']);
            }
            exit;
        }

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

    }

?>