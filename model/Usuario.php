<?php
    class Usuario {
        private $USUARIO_ID;
        private $NOMBRE;
        private $CORREO;
        private $CONTRASENA;
        private $TELEFONO;
        private $ROL;

        public function getUSUARIO_ID() {
            return $this->USUARIO_ID;
        }

        public function getNOMBRE() { 
            return $this->NOMBRE; 
        }

        public function getCORREO() { 
            return $this->CORREO; 
        }

        public function getCONTRASENA() { 
            return $this->CONTRASENA; 
        }

        public function getTELEFONO() {
            return $this->TELEFONO;
        }

        public function getROL() {
            return $this->ROL;
        }

        public function setUSUARIO_ID($USUARIO_ID) {
            $this->USUARIO_ID = $USUARIO_ID;
        }

        public function setNOMBRE($NOMBRE) {
            $this->NOMBRE = $NOMBRE;
        }

        public function setCORREO($CORREO) {
            $this->CORREO = $CORREO;
        }

        public function setCONTRASENA($CONTRASENA) {
            $this->CONTRASENA = $CONTRASENA;
        }

        public function setTELEFONO($TELEFONO) {
            $this->TELEFONO = $TELEFONO;
        }

        public function setROL($ROL) {
            $this->ROL = $ROL;
        }

    }
?>
