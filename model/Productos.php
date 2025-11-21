<?php
    class Productos{
        private $PRODUCTO_ID;
        private $NOMBRE;
        private $DESCRIPCION;
        private $PRECIO;
        private $IMAGEN;
        private $CATEGORIA_ID;
        private $OEFERTA_ID;

       /* public function __construct($id, $nombre, $Pais, $Ciudad, $fechaFundacion, $idEstadio){
          /*  $this->id = $id;
            $this->nombre = $nombre;
            $this->Pais = $Pais;
            $this->Ciudad = $Ciudad;
            $this->fechaFundacion = $fechaFundacion;
            $this->idEstadio = $idEstadio;*/
        //}

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