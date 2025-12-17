<?php
session_start();

class CarritoController {
    
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
