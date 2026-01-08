<?php
    class Pedidos{
        private $PEDIDO_ID;
        private $USUARIO_ID;
        private $FECHA;
        private $TOTAL;
        private $DIRECCION;
        private $TELEFONO;
        private $CODIGO_POSTAL;
        private $ESTADO;

        public $NOMBRE_USUARIO; // Nombre del usuario
        public $CORREO_USUARIO; // Correo del usuario
        public $LINEAS = [];    // Array de productos con cantidad

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

        public function getTELEFONO(){
            return $this->TELEFONO;
        }

        public function getCODIGO_POSTAL(){
            return $this->CODIGO_POSTAL;
        }

        public function getESTADO(){
            return $this->ESTADO;
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

        public function setTELEFONO($TELEFONO){
            $this->TELEFONO = $TELEFONO;
        }

        public function setCODIGO_POSTAL($CODIGO_POSTAL){
            $this->CODIGO_POSTAL = $CODIGO_POSTAL;
        }

        public function setESTADO($ESTADO){
            $this->ESTADO = $ESTADO;
        }

        // Para API JSON
        public function toArray(){
            return [
                'PEDIDO_ID' => $this->PEDIDO_ID,
                'USUARIO_ID' => $this->USUARIO_ID,
                'NOMBRE_USUARIO' => $this->NOMBRE_USUARIO ?? '',
                'CORREO_USUARIO' => $this->CORREO_USUARIO ?? '',
                'FECHA' => $this->FECHA,
                'TOTAL' => $this->TOTAL,
                'DIRECCION' => $this->DIRECCION,
                'TELEFONO' => $this->TELEFONO,
                'CODIGO_POSTAL' => $this->CODIGO_POSTAL,
                'ESTADO' => $this->ESTADO,
                'LINEAS' => $this->LINEAS
            ];
        }
    }
?>