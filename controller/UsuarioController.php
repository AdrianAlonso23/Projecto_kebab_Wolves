<?php
    include_once "model/UsuarioDAO.php";
    include_once "model/Usuario.php";

    class UsuarioController {

        public function GetUsuarios(){
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
            header('Content-Type: application/json; charset=utf-8');
            $data = [];
            foreach ($usuarios as $usuario) {
                $data[] = $usuario->toArray();
            }
            echo json_encode($data);
        }
    }
?>