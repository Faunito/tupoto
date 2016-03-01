<?php

class Especificacion{

	private $idEspecificacion;
    private $idCompetencia;
	private $nivelCompetencia;
    private $dbespecificacion;
    private $descripcion;

	function __construct(){
        $this->dbespecificacion = new DBEspecificacion(); 
	}
    //GETTERS
    function getDescripcion(){
        return $this->descripcion;
    }
    
    function getIdCompetencia(){
        return $this->idCompetencia;
    } 

	function getIdEspecificacion()
	{
		return $this->idEspecificacion;
	}

	function getNivelCompetencia()
	{
		return $this->nivelCompetencia;
	}
    
    function getDB(){
        return $this->dbespecificacion;
    }
    //SETTERS
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }
    
	function setIdEspecificacion($idEspecificacion)
	{
		$this->idEspecificacion = $idEspecificacion;
	}
    
	function setNivelCompetencia($nivelCompetencia)
	{
		$this->nivelCompetencia = $nivelCompetencia;
	}
    
    function setIdCompetencia($idCompetencia){
        $this->idCompetencia = $idCompetencia;
    }
}
?>