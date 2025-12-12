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
            $producto = new Productos();
            $producto->setPRODUCTO_ID($row['PRODUCTO_ID']);
            $producto->setNOMBRE($row['NOMBRE']);
            $producto->setDESCRIPCION($row['DESCRIPCION']);
            $producto->setPRECIO($row['PRECIO']);
            $producto->setIMAGEN($row['IMAGEN']);
            $producto->setCATEGORIA_ID($row['CATEGORIA_ID']);
            $producto->setOFERTA_ID($row['OFERTA_ID'] ?? null);

            $listaproductos[] = $producto;
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
            $p = new Productos();
            $p->setPRODUCTO_ID($row['PRODUCTO_ID']);
            $p->setNOMBRE($row['NOMBRE']);
            $p->setDESCRIPCION($row['DESCRIPCION']);
            $p->setPRECIO($row['PRECIO']);
            $p->setIMAGEN($row['IMAGEN']);
            $p->setCATEGORIA_ID($row['CATEGORIA_ID']);
            $p->setOFERTA_ID($row['OFERTA_ID'] ?? null);

            $productos[] = $p;
        }

        $stmt->close();
        $conn->close();

        return $productos;
    }
}
