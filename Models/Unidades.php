<?php

require_once ('DBConexion/DBUnidades.php');

class Unidades{
    private $idUnidad;
    private $tituloUnidad;
    private $dbunidad;
    
    function __construct(){
        $this->dbunidad = new DBUnidades();
    }
    
    //GETTERS
    function getIdUnidad(){
        return $this->idUnidad;
    }
    
    function getTituloUnidad(){
        return $this->tituloUnidad;
    }
    //SETTERS
    function setIdUnidad($newVal){
        $this->idUnidad = $newVal;
    }
    
    function setTituloUnidad($newVal){
        $this->tituloUnidad = $newVal;
    }
}
?>