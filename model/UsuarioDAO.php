<?php
require_once 'database/database.php';
require_once 'model/Usuario.php';

    class UsuarioDAO {

        public function BusquedaCorreo($CORREO){
            $con = database::connect();
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE CORREO = ?");
            $stmt->bind_param("s", $CORREO);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if($fila = $resultado->fetch_assoc()){
                $usuario = new Usuario();
                $usuario->setUSUARIO_ID($fila['USUARIO_ID']);
                $usuario->setNOMBRE($fila['NOMBRE']);
                $usuario->setCORREO($fila['CORREO']);
                $usuario->setCONTRASENA($fila['CONTRASENA']);
                $usuario->setTELEFONO($fila['TELEFONO']);
                $usuario->setROL($fila['ROL']);
                return $usuario;
            } else {
                return null;
            }
        }

        public function InsertUsuario($usuario){
            $con = database::connect();
            $stmt = $con->prepare("INSERT INTO usuarios (NOMBRE, CORREO, CONTRASENA, TELEFONO, ROL)VALUES (?, ?, ?, ?, ?)");
            $NOMBRE = $usuario->getNOMBRE();
            $CORREO = $usuario->getCORREO();
            $CONTRASENA = $usuario->getCONTRASENA();
            $TELEFONO = $usuario->getTELEFONO();
            $ROL = $usuario->getROL();

            $stmt->bind_param("sssss", $NOMBRE, $CORREO, $CONTRASENA, $TELEFONO, $ROL);
            $stmt->execute();
        }

        public static function getUsuarios(){
            $con = database::connect();
            $sql = "SELECT * FROM usuarios";
            $result = $con->query($sql);

            $usuarios = [];

            while($row = $result->fetch_assoc()){
                $usuario = new Usuario();
                $usuario->setUSUARIO_ID($row['USUARIO_ID']);
                $usuario->setNOMBRE($row['NOMBRE']);
                $usuario->setCORREO($row['CORREO']);
                $usuario->setCONTRASENA($row['CONTRASENA']);
                $usuario->setTELEFONO($row['TELEFONO']);
                $usuario->setROL($row['ROL']);

                $usuarios[] = $usuario;
            }

            return $usuarios;
        }

        public static function getUsuarioById($id) {
            $con = database::connect();
            $stmt = $con->prepare("SELECT * FROM usuarios WHERE USUARIO_ID = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $usuario = new Usuario();
                $usuario->setUSUARIO_ID($row['USUARIO_ID']);
                $usuario->setNOMBRE($row['NOMBRE']);
                $usuario->setCORREO($row['CORREO']);
                $usuario->setCONTRASENA($row['CONTRASENA']);
                $usuario->setTELEFONO($row['TELEFONO']);
                $usuario->setROL($row['ROL']);
                return $usuario;
            }

            return null;
        }

        public static function updateUsuario($usuario) {
            $con = database::connect();
            $sql = "UPDATE usuarios 
                    SET NOMBRE = ?, CORREO = ?, CONTRASENA = ?, TELEFONO = ?, ROL = ?
                    WHERE USUARIO_ID = ?";

            $stmt = $con->prepare($sql);
            if (!$stmt) {
                error_log("Error prepare: " . $con->error);
                return false;
            }

            
            $nombre = $usuario->getNOMBRE() ?? '';
            $correo = $usuario->getCORREO() ?? '';
            $contrasena = $usuario->getCONTRASENA() ?? '';
            $telefono = $usuario->getTELEFONO() ?? '';
            $rol = $usuario->getROL() ?? '';
            $id = $usuario->getUSUARIO_ID();

            $stmt->bind_param(
                "sssssi",
                $nombre,
                $correo,
                $contrasena,
                $telefono,
                $rol,
                $id
            );

            if (!$stmt->execute()) {
                error_log("Error execute: " . $stmt->error);
                return false;
            }

            return ['success' => true];
        }
    }
?>
