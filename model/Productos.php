<?php
    class Productos{
        private $PRODUCTO_ID;
        private $NOMBRE;
        private $DESCRIPCION;
        private $PRECIO;
        private $IMAGEN;
        private $CATEGORIA_ID;
        private $OEFERTA_ID;

        public function __construct(){}
        

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

        public function setPRODUCTO_ID($PRODUCTO_ID){
            $this->PRODUCTO_ID = $PRODUCTO_ID;
        }

        public function setNOMBRE($NOMBRE){
            $this->NOMBRE = $NOMBRE;
        }

        public function setDESCRIPCION($DESCRIPCION){
            $this->DESCRIPCION = $DESCRIPCION;
        }

        public function setPRECIO($PRECIO){
            $this -> PRECIO = $PRECIO;
        }

        public function setIMAGEN($IMAGEN){
            $this -> IMAGEN = $IMAGEN;
        }

        public function setCATEGORIA_ID($CATEGORIA_ID){
            $this -> CATEGORIA_ID = $CATEGORIA_ID;
        }

        public function setOFERTA_ID($OFERTA_ID){
            $this -> OFERTA_ID = $OFERTA_ID;
        }
     
        
         /******* APi JSON ***********/

        public function toArray() {
            return [
                'PRODUCTO_ID' => $this->PRODUCTO_ID,
                'NOMBRE' => $this->NOMBRE,
                'DESCRIPCION' => $this->DESCRIPCION,
                'PRECIO' => $this->PRECIO,
                'IMAGEN' => $this->IMAGEN,
                'CATEGORIA_ID' => $this->CATEGORIA_ID,
                'OFERTA_ID' => $this->OFERTA_ID,
                'OFERTA' => $this->OFERTA
            ];
        }
    }

?>