<?php

require_once ('Persona.php');
require_once ('Evaluacion.php');
require_once ('DBConexion/DBEmpleador.php');

class Empleador extends Persona{
    
    private $cantidadPractica;
    private $nombreEmpresa;
    private $dbempleador;
    private $fonoFijo;
    private $celular;
    //private $m_Evaluacion
    
    function __construct(){
        $this->dbempleador = new DBEmpleador();
    }
    
    //GETTERS
    function getDBEmpleador(){
        return $this->dbempleador;
    }
    
    function getFonoFijo(){
        return $this->fonoFijo;
    }
    
    function getCelular(){
        return $this->celular;
    }
    
    function getCantPractica(){
        return $this->cantidadPractica;
    }
    
    function getNomEmpresa(){
        return $this->nombreEmpresa;
    }
    //SETTERS
    function setFonoFijo($newVal){
        $this->fonoFijo = $newVal;
    }
    
    function setCelular($newVal){
        $this->celular = $newVal;
    }
    
    function setCantPractica($newVal){
        $this->cantidadPractica = $newVal;
    }
    
    function setNomEmpresa(){
        $this->nombreEmpresa = $newVal;
    }
    
}

?>