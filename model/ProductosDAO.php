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

    // En ProductosDAO.php
    public static function updateProducto($producto) {
        $con = Database::connect();

        $sql = "UPDATE productos 
                SET NOMBRE = ?, DESCRIPCION = ?, PRECIO = ?, CATEGORIA_ID = ?, IMAGEN = ?
                WHERE PRODUCTO_ID = ?";

        $stmt = $con->prepare($sql);
        if (!$stmt) {
            return [
                'success' => false,
                'error' => $con->error
            ];
        }

        $nombre = $producto->getNOMBRE();
        $descripcion = $producto->getDESCRIPCION();
        $precio = $producto->getPRECIO();
        $categoria = $producto->getCATEGORIA_ID();
        $imagen = $producto->getIMAGEN();
        $id = $producto->getPRODUCTO_ID();

        $stmt->bind_param("ssdssi", $nombre, $descripcion, $precio, $categoria, $imagen, $id);

        if (!$stmt->execute()) {
            return [
                'success' => false,
                'error' => $stmt->error
            ];
        }

        return ['success' => true];
    }

    public static function createProducto($producto) {
        $con = Database::connect();

        $sql = "INSERT INTO productos (NOMBRE, DESCRIPCION, PRECIO, CATEGORIA_ID, IMAGEN)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $con->prepare($sql);
        if (!$stmt) {
            return [
                'success' => false,
                'error' => $con->error
            ];
        }

        $nombre = $producto->getNOMBRE();
        $descripcion = $producto->getDESCRIPCION();
        $precio = $producto->getPRECIO();
        $categoria = $producto->getCATEGORIA_ID();
        $imagen = $producto->getIMAGEN();

        $stmt->bind_param("ssdss", $nombre, $descripcion, $precio, $categoria, $imagen);

        if (!$stmt->execute()) {
            return [
                'success' => false,
                'error' => $stmt->error
            ];
        }

        return ['success' => true];
    }

    public static function deleteProducto($id) {
        $con = Database::connect();

        $sql = "DELETE FROM productos WHERE PRODUCTO_ID = ?";
        $stmt = $con->prepare($sql);

        if (!$stmt) {
            return ['success' => false, 'error' => $con->error];
        }

        $stmt->bind_param("i", $id);

        if (!$stmt->execute()) {
            return ['success' => false, 'error' => $stmt->error];
        }

        $stmt->close();
        $con->close();

        return ['success' => true];
    }

}
