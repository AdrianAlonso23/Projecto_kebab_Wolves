<?php
include_once "model/UsuarioDAO.php";
include_once "model/PedidosDAO.php"; 

class PerfilController {

    public function index() {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        if(!isset($_SESSION['USUARIO_ID'])) {
            header("Location: login.php");
            exit();
        }

        $usuario_id = $_SESSION['USUARIO_ID'];
        $usuario = UsuarioDAO::getUsuarioById($usuario_id);
        $pedidos = PedidosDAO::getPedidosByUsuario($usuario_id);
        $pedidos = PedidosDAO::getPedidos(); 
        $pedidosUsuario = array_filter($pedidos, function($p) use ($usuario_id) {
            return $p->getUSUARIO_ID() == $usuario_id;
        });

        $view = "perfil.php";
        include "view/main.php";  
    }
}
?>