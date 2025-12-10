<?php
require_once "database/database.php";
require_once "model/Categoria.php";

class CategoriasDAO {

    public static function getCategorias() {
        $conn = Database::connect();
        $sql = "SELECT * FROM categorias";
        $result = $conn->query($sql);

        $categorias = [];

        while ($row = $result->fetch_assoc()) {
            $categorias[] = new Categoria(
                $row['CATEGORIA_ID'],
                $row['NOMBRE_CATEGORIA']
            );
        }

        return $categorias;
    }
}
