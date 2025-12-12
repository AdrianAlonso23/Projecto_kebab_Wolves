<?php
require_once "database/database.php";
require_once "model/Categoria.php";

class CategoriasDAO {

    public static function getCategorias() {
        $conn = Database::connect();
        $sql = "SELECT * FROM categorias ";
        $result = $conn->query($sql);

        $categorias = [];

        while ($row = $result->fetch_assoc()) {
            $categoria = new Categoria();
            $categoria->setCATEGORIA_ID($row['CATEGORIA_ID']);
            $categoria->setNOMBRE_CATEGORIA($row['NOMBRE_CATEGORIA']);
            
            $categorias[] = $categoria;
        }

        return $categorias;
    }
    

    
}
