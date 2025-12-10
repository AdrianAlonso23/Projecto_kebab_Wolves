<?php
    class Productos{
        private $PRODUCTO_ID;
        private $NOMBRE;
        private $DESCRIPCION;
        private $PRECIO;
        private $IMAGEN;
        private $CATEGORIA_ID;
        private $OEFERTA_ID;

        public function __construct($PRODUCTO_ID, $NOMBRE, $DESCRIPCION, $PRECIO, $IMAGEN, $CATEGORIA_ID, $OFERTA_ID = null) {
            $this->PRODUCTO_ID = $PRODUCTO_ID;
            $this->NOMBRE = $NOMBRE;
            $this->DESCRIPCION = $DESCRIPCION;
            $this->PRECIO = $PRECIO;
            $this->IMAGEN = $IMAGEN;
            $this->CATEGORIA_ID = $CATEGORIA_ID;
            $this->OFERTA_ID = $OFERTA_ID;
        }

        public function getPRODUCTO_ID(){
            return $this->PRODUCTO_ID;
        }

        public function getNOMBRE(){
            return $this->NOMBRE;
        }
        
        public function getDESCRIPCION(){
            return $this->DESCRIPCION;
        }

        public function getPRECIO(){
            return $this -> PRECIO;
        }

        public function getIMAGEN(){
            return $this -> IMAGEN;
        }

        public function getCATEGORIA_ID(){
            return $this -> CATEGORIA_ID;
        }

        public function getOFERTA_ID(){
            return $this -> OFERTA_ID;
        }
    }
?>