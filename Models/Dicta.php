<?php
require_once('DBConexion/DBDicta.php');

class Dicta{
    private $id;
    private $rut;
    private $paralelo;
    private $dbdicta;
    
    function __construct(){
        $this->dbdicta = new DBDicta();
    }
    
    //============ Funciones ================
    
    //============ Getters ================
    function getDBDicta(){
        return $this->dbdicta;
    }
    
    function getId($id){
        return $this->id;
    }
    
    function getRut($rut){
        return $this->rut;
    }
    
    function getParaleleo($paralelo){
        return $this->paralelo;
    }
    //============ Setters ================
    function setId($id){
        $this->id = $id;
    }
    
    function setRut($rut){
        $this->rut = $rut;
    }
    
    function setParalelo($paralelo){
        $this->paralelo = $paralelo;
    }
}
?>