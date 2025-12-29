<?php
    class Pedidos{
        private $PEDIDO_ID;
        private $USUARIO_ID;
        private $FECHA;
        private $TOTAL;
        private $DIRECCION;


        public function __construct() {
        }

        public function getPEDIDO_ID(){
            return $this->PEDIDO_ID;
        }
        
        public function getUSUARIO_ID(){
            return $this->USUARIO_ID;
        }

        public function getFECHA(){
            return $this->FECHA;
        }

        public function getTOTAL(){
            return $this->TOTAL;
        }

        public function getDIRECCION(){
            return $this->DIRECCION;
        }

        public function setPEDIDO_ID($PEDIDO_ID){
            $this->PEDIDO_ID = $PEDIDO_ID;
        }

        public function setUSUARIO_ID($USUARIO_ID){
            $this->USUARIO_ID = $USUARIO_ID;
        }

        public function setFECHA($FECHA){
            $this->FECHA = $FECHA;
        }

        public function setTOTAL($TOTAL){
            $this->TOTAL = $TOTAL;
        }

        public function setDIRECCION($DIRECCION){
            $this->DIRECCION = $DIRECCION;
        }
        /***************APi JSON *****************/
        public function toArray(){
            return[
                'PEDIDO_ID' => $this->PEDIDO_ID,
                'USUARIO_ID' => $this->USUARIO_ID,
                'FECHA' => $this->FECHA,
                'TOTAL' => $this->TOTAL,
                'DIRECCION' => $this->DIRECCION
            ];
        }
    }
?>