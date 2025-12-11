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
    }
?>
