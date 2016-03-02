<?php
require_once ('DBConexion/DBPuedeImpartir.php');
    
class PuedeImpartir{
    
    private $dbpuede;
    private $idMalla;
    private $idCompetencia;
    
    function __construct(){
        $this->dbpuede = new DBPuedeImpartir();
    }
    //GETTERS
    function getIdMalla(){
        return $this->idMalla;
    }
    
    function getIdCompetencia(){
        return $this->idCompetencia; 
    }
    
    function getDBPuede(){
        return $this->dbpuede;
    }
    //SETTERS 
    function setIdMalla($idMalla){
        $this->idMalla = $idMalla;
    }
    
    function setIdCompetencia($idCompetencia){
        $this->idCompetencia = $idCompetencia;
    }
    
    function set($idMalla){
        $this->idMalla = $idMalla;
    }       
}
?>