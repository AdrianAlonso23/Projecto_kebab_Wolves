<?php
    require_once 'database/database.php';
    require_once 'model/Ofertas.php';

    class OfertasDAO {

        // Obtener una oferta por ID
        public static function getOfertaById($id) {
            $con = database::connect();
            $stmt = $con->prepare("SELECT * FROM ofertas WHERE OFERTA_ID = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($row = $result->fetch_assoc()) {
                $oferta = new Ofertas();
                $oferta->setOFERTA_ID($row['OFERTA_ID']);
                $oferta->setNOMBRE_OFERTA($row['NOMBRE_OFERTA']);
                $oferta->setCOMIENZO($row['COMIENZO']);
                $oferta->setFINAL($row['FINAL']);
                $oferta->setPORCENTAJE($row['PORCENTAJE']);
                $oferta->setDESCUENTO_FIJO($row['DESCUENTO_FIJO']);
                return $oferta;
            }

            return null;
        }

        // Obtener todas las ofertas
        public static function getOfertas() {
            $con = database::connect();
            $sql = "SELECT * FROM ofertas";
            $result = $con->query($sql);

            $ofertas = [];
            while ($row = $result->fetch_assoc()) {
                $oferta = new Ofertas();
                $oferta->setOFERTA_ID($row['OFERTA_ID']);
                $oferta->setNOMBRE_OFERTA($row['NOMBRE_OFERTA']);
                $oferta->setCOMIENZO($row['COMIENZO']);
                $oferta->setFINAL($row['FINAL']);
                $oferta->setPORCENTAJE($row['PORCENTAJE']);
                $oferta->setDESCUENTO_FIJO($row['DESCUENTO_FIJO']);
                $ofertas[] = $oferta;
            }

            return $ofertas;
        }
    }
?>
