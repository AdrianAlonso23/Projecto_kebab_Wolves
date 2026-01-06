<?php
class LineaPedidos{
    private $LINEA_PEDIDO_ID;
    private $PEDIDO_ID;
    private $PRODUCTO_ID;
    private $CANTIDAD;
    private $PRECIO_UNITARIO;
    private $SUBTOTAL;

    public function __construct() {
    }


    public function getLINEA_PEDIDO_ID(){
        return $this->LINEA_PEDIDO_ID;
    }

    public function getPEDIDO_ID(){
        return $this->PEDIDO_ID;
    }

    public function getPRODUCTO_ID(){
        return $this->PRODUCTO_ID;
    }

    public function getCANTIDAD(){
        return $this->CANTIDAD;
    }

    public function getPRECIO_UNITARIO(){
        return $this->PRECIO_UNITARIO;
    }

    public function getSUBTOTAL(){
        return $this->SUBTOTAL;
    }

    public function setLINEA_PEDIDO_ID($LINEA_PEDIDO_ID){
        $this->LINEA_PEDIDO_ID = $LINEA_PEDIDO_ID;
    }

    public function setPEDIDO_ID($PEDIDO_ID){
        $this->PEDIDO_ID = $PEDIDO_ID;
    }

    public function setPRODUCTO_ID($PRODUCTO_ID){
        $this->PRODUCTO_ID = $PRODUCTO_ID;
    }

    public function setCANTIDAD($CANTIDAD){
        $this->CANTIDAD = $CANTIDAD;
    }

    public function setPRECIO_UNITARIO($PRECIO_UNITARIO){
        $this->PRECIO_UNITARIO = $PRECIO_UNITARIO;
    }

    public function setSUBTOTAL($SUBTOTAL){
        $this->SUBTOTAL = $SUBTOTAL;
    }

    /***************APi JSON *****************/

    public function toArray(){
        return[
            'LINEA_PEDIDO_ID' => $this->LINEA_PEDIDO_ID,
            'PEDIDO_ID' => $this->PEDIDO_ID,
            'PRODUCTO_ID' => $this->PRODUCTO_ID,
            'CANTIDAD' => $this->CANTIDAD,
            'PRECIO_UNITARIO' => $this->PRECIO_UNITARIO,
            'SUBTOTAL' => $this->SUBTOTAL
        ];
    }
}

?>