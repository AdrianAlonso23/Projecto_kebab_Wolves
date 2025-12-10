<?php
include_once 'database/database.php';
include_once 'Productos.php';

class ProductosDAO {

    public static function getProductosByID($PRODUCTO_ID){
        $connection = database::connect();
        $stmt = $connection->prepare("SELECT * FROM productos WHERE PRODUCTO_ID = ?");
        $stmt->bind_param("i", $PRODUCTO_ID);
        $stmt->execute();
        $results = $stmt->get_result();

        $producto = $results->fetch_object('Productos'); // clase Productos correcta
        $connection->close();

        return $producto;
    } 

    public static function getProductos($limit = null){
        $connection = database::connect();
        $sql = "SELECT * FROM productos";
        
        if($limit) {
            $sql .= " LIMIT ?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("i", $limit);
        } else {
            $stmt = $connection->prepare($sql);
        }
        
        $stmt->execute();
        $results = $stmt->get_result();

        $listaproductos = [];
        while($producto = $results->fetch_object('productos')){
            $listaproductos[] = $producto;
        }
        
        $connection->close();
        return $listaproductos;
    }
}
?>
