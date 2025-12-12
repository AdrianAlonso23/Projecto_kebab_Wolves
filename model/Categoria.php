<?php
class Categoria {

    private $CATEGORIA_ID;
    private $NOMBRE_CATEGORIA;

    public function __construct() {
    }

    public function getCATEGORIA_ID() {
        return $this->CATEGORIA_ID;
    }

    public function getNOMBRE_CATEGORIA() {
        return $this->NOMBRE_CATEGORIA;
    }
    
    public function setCATEGORIA_ID($CATEGORIA_ID) {
        $this->CATEGORIA_ID = $CATEGORIA_ID;
    }

    public function setNOMBRE_CATEGORIA($NOMBRE_CATEGORIA) {
        $this->NOMBRE_CATEGORIA = $NOMBRE_CATEGORIA;
    }

    
    /******APi JSON ***********/

    public function toArray() {
        return [
            'CATEGORIA_ID' => $this->CATEGORIA_ID,
            'NOMBRE_CATEGORIA' => $this->NOMBRE_CATEGORIA
        ];
    }
}
