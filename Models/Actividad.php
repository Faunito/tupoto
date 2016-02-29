<?php
require_once ('Competencia.php');
require_once ('EspecificacionDeCompetencia.php');
require_once ('Alumno.php');
require_once ('EspecificaciondeEvidencia.php');

class Actividad
{
	private $dbpractica;
    
    private $descripcionActividad;
	private $idActividad;
    
    private $idCompetencia;
	private $m_Competencia;    
	private $m_EspecificacionDeCompetencia;
	private $alumnoRut;
	private $m_EspecificaciondeEvidencia;

	function __construct()
	{
        $this->dbpractica = new DBPractica();
	}

    //GETTERS
	function getDesAct()
	{
		return $this->descripcion;
	}
    
    function getIdComp(){
        return $this->idCompetencia;
    }
    
	function getIdActividad()
	{
		return $this->idActividad;
	}
    
    function getAlumnoRut(){
        return $this->alumnoRut;
    }
    //SETTERS
    function setAlumnoRut($newVal){
        $this->alumnoRut;
    }
    
    function setIdComp($newVal){
        $this->idCompetencia;
    }
    
	function setDesAct($newVal)
	{
		$this->descripcionActividad = $newVal;
	}

	function setIdActividad($newVal)
	{
		$this->idActividad = $newVal;
	}

}
?>