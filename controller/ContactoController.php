<?php
    include_once 'model/CategoriasDAO.php';
    class ContactoController {

        public function index() {
            $categorias = CategoriasDAO::getCategorias();
            $categoriaSeleccionada = $_GET['cat'] ?? null;
            $view = "contacto.php";
            include "view/main.php";
        }

        public function enviar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nombre = htmlspecialchars($_POST['nombre']);
                $email = htmlspecialchars($_POST['email']);
                $mensaje = htmlspecialchars($_POST['mensaje']);

                $respuesta = "Gracias, $nombre. Tu mensaje ha sido enviado correctamente.";
            }
        }
    }
?>