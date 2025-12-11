<?php
require_once 'model/UsuarioDAO.php';

class LoginController {

    public function index() {
        $view = "login.php";
        $error = ''; 
        include "view/main.php";
    }

    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $CORREO = $_POST['CORREO'] ?? '';
            $CONTRASENA = $_POST['CONTRASENA'] ?? '';

            $usuarioDAO = new UsuarioDAO();
            $usuario = $usuarioDAO->BusquedaCorreo($CORREO);

            if ($usuario) {
                $hash = trim($usuario->getCONTRASENA());
                if (password_verify($CONTRASENA, $hash)) {
                    session_start();
                    $_SESSION['USUARIO_ID'] = $usuario->getUSUARIO_ID();
                    $_SESSION['NOMBRE'] = $usuario->getNOMBRE();
                    $_SESSION['ROL'] = $usuario->getROL();

                    header('Location: index.php?controller=Home&action=index');
                    exit;
                } else {
                    $error = "Contraseña incorrecta";
                }
            } else {
                $error = "Usuario no encontrado";
            }

            $view = "login.php";
            include "view/main.php";
        } else {
            header('Location: index.php?controller=Login&action=index');
            exit;
        }
    }
}
?>
