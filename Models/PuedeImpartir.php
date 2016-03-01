<?php
require_once ('DBConexion/DBPuedeImpartir.php');
    
class PuedeImpartir{
    
    private $dbpuede;
    private $idMalla;
    private $idCompetencia;
    
    function __construct(){
        $this->dbpuedo = $dbpuede;
    }
    //GETTERS
    function getIdMalla(){
        return $this->idMalla;
    }
    
    function getIdCompensacion(){
        return $this->idCompensacion = $idCompensacion; 
    }
    
    function getDBPuede(){
        return $this->dbpuede = $dbpuede;
    }
    
    //SETTERS 
    function setIdMalla($idMalla){
        $this->idMalla = $idMalla;
    }
    
    function setIdCompetencia($idCompetencia){
        $this->idCompetenca = $idCompetencia;
    }
    
    function set($idMalla){
        $this->idMalla = $idMalla;
    }
       
}
?>