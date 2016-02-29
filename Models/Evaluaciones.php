<?php
require_once('DBConexion/DBEvaluaciones.php');

class Evaluaciones{
    
    private $idEvaluaciones;
    private $fechaEvaluaciones;
    private $tipo;
    private $dbevaluaciones;
    //??
    private $idPrograma;
    
    function __construct(){
        $this->dbevaluaciones = new DBEvaluaciones();        
    }
    
    //GETTERS
    //?
    function getIdPrograma(){
        return $this->idPrograma;
    }
    function getIdEvaluaciones(){
        return $this->idEvaluaciones;
    }
    
    function getFechaEvaluaciones(){
        return $this->fechaEvaluaciones;
    }
    
    function getTipo(){
        return $this->tipo;
    }
    //SETTERS
    //?
    function setIdPrograma($newVal){
        $this->idPrograma = $newVal;
    }
    function setIdEvaluaciones($newVal){
        $this->idEvaluaciones = $newVal;
    }
    
    function setFechaEvaluaciones($newVal){
        $this->fechaEvaluaciones = $newVal;
    }
    
    function setTipo($newVal){
        $this->tipo = $newVal;
    }
} 
?>