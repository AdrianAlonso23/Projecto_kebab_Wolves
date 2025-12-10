<?php
require_once "database/database.php";
require_once "model/Productos.php";

class ProductosDAO {

    public static function getProductos() {
        $conn = Database::connect();
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        $listaproductos = [];
        while($row = $result->fetch_assoc()){
            $listaproductos[] = new Productos(
                $row['PRODUCTO_ID'],
                $row['NOMBRE'],
                $row['DESCRIPCION'],
                $row['PRECIO'],
                $row['IMAGEN'],
                $row['CATEGORIA_ID'],
                $row['OFERTA_ID'] ?? null
            );
        }

        $conn->close();
        return $listaproductos;
    }

    public static function getProductosByCategoria($CATEGORIA_ID) {
        $conn = Database::connect();
        $sql = "SELECT * FROM productos WHERE CATEGORIA_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $CATEGORIA_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        $productos = [];
        while($row = $result->fetch_assoc()){
            $productos[] = new Productos(
                $row['PRODUCTO_ID'],
                $row['NOMBRE'],
                $row['DESCRIPCION'],
                $row['PRECIO'],
                $row['IMAGEN'],
                $row['CATEGORIA_ID'],
                $row['OFERTA_ID'] ?? null
            );
        }

        $stmt->close();
        $conn->close();
        return $productos;
    }
}
