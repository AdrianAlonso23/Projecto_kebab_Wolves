<?php
    class Ofertas{
        private $OFERTA_ID;
        private $NOMBRE_OFERTA;
        private $COMIENZO;
        private $FINAL;
        private $PORCENTAJE;
        private $DESCUENTO_FIJO;
        
        public function __construct() {
        }

        public function getOFERTA_ID(){
            return $this->OFERTA_ID;
        }

        public function getNOMBRE_OFERTA(){
            return $this->NOMBRE_OFERTA;
        }

        public function getCOMIENZO(){
            return $this->COMIENZO;
        }

        public function getFINAL(){
            return $this->FINAL;
        }

        public function getPORCENTAJE(){
            return $this->PORCENTAJE;
        }

        public function getDESCUENTO_FIJO(){
            return $this->DESCUENTO_FIJO;
        }

        public function setOFERTA_ID($OFERTA_ID){
            $this->OFERTA_ID = $OFERTA_ID;
        }

        public function setNOMBRE_OFERTA($NOMBRE_OFERTA){
            $this->NOMBRE_OFERTA = $NOMBRE_OFERTA;
        }

        public function setCOMIENZO($COMIENZO){
            $this->COMIENZO = $COMIENZO;
        }

        public function setFINAL($FINAL){
            $this->FINAL = $FINAL;
        }

        public function setPORCENTAJE($PORCENTAJE){
            $this->PORCENTAJE = $PORCENTAJE;
        }

        public function setDESCUENTO_FIJO($DESCUENTO_FIJO){
            $this->DESCUENTO_FIJO = $DESCUENTO_FIJO;
        }

        /************API JSON *****************/

        public function toArray(){
            return[
                "OFERTA_ID"=>$this->OFERTA_ID,
                "NOMBRE_OFERTA"=>$this->NOMBRE_OFERTA,
                "COMIENZO"=>$this->COMIENZO,
                "FINAL"=>$this->FINAL,
                "PORCENTAJE"=>$this->PORCENTAJE,
                "DESCUENTO_FIJO"=>$this->DESCUENTO_FIJO
            ];
        }
    }
?>