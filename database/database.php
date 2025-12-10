<?php
class database {
    public static function connect(
        $host='localhost',
        $user='root',
        $password='',
        $db='kebabwolve'
    ){
        $connection = new mysqli($host, $user, $password, $db);

        if ($connection->connect_errno) {
            die("Error al conectar a la BD: " . $connection->connect_error);
        }

        return $connection;
    }
}
?>
 