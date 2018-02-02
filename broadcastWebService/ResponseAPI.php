<?php

/**
 * Description of ResponseAPI
 *
 * @author mj_uc
 */
class ResponseAPI {
    
    var $telefono; //String
    var $fecha; //String
    var $hora; //String
    var $estado; //String
    
    //Constructor por Parametros en PHP
    function __construct($telefono, $fecha, $hora, $estado) {
        $this->telefono = $telefono;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->estado = $estado;
    }

}
