<?php
require_once 'model/Usuario.php';
require_once 'model/UsuarioDAO.php';

class RegistroController {

    public function index() {
        $view = "registro.php";
        include "view/main.php";
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Capturamos los datos del formulario
            $NOMBRE = $_POST['NOMBRE'] ?? '';
            $CORREO = $_POST['CORREO'] ?? '';
            $CONTRASENA = $_POST['CONTRASENA'] ?? '';
            $TELEFONO = $_POST['TELEFONO'] ?? '';
            // Creamos un nuevo usuario
            $usuario = new Usuario();
            $usuario->setNOMBRE($NOMBRE);
            $usuario->setCORREO($CORREO);
            $usuario->setCONTRASENA(password_hash($CONTRASENA, PASSWORD_BCRYPT));
            $usuario->setTELEFONO($TELEFONO);
            $usuario->setROL('usuario');

            $usuarioDAO = new UsuarioDAO();
            $usuarioDAO->InsertUsuario($usuario);

            header('Location: index.php?controller=Login&action=index');
            exit;
        } else {
            header('Location: index.php?controller=Registro&action=index');
            exit;
        }
    }
}
?>
