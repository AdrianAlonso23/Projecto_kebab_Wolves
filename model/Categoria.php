<?php
class Categoria {

    private $CATEGORIA_ID;
    private $NOMBRE_CATEGORIA;

    public function __construct($CATEGORIA_ID, $NOMBRE_CATEGORIA) {
        $this->CATEGORIA_ID = $CATEGORIA_ID;
        $this->NOMBRE_CATEGORIA = $NOMBRE_CATEGORIA;
    }

    public function getCATEGORIA_ID() {
        return $this->CATEGORIA_ID;
    }

    public function getNOMBRE_CATEGORIA() {
        return $this->NOMBRE_CATEGORIA;
    }
    
    /******APi JSON ***********/

    public function toArray() {
        return [
            'CATEGORIA_ID' => $this->CATEGORIA_ID,
            'NOMBRE_CATEGORIA' => $this->NOMBRE_CATEGORIA
        ];
    }
}
