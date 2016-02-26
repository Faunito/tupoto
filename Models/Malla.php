<?php
require_once ('DirectordeCarrera.php');
require_once ('Competencia.php');
require_once ('Asignatura.php');

class Malla
{

	private $plan;//anio
	private $codigoCarrera;
	private $idMalla;
	private $niveles;
	private $director;
	//private $m_Competencia;
	//private $m_Asignatura;
    private $dbmalla;
    //construct
	function __construct()
	{
        $this->dbMalla= new DBMalla();
	}
    //FUNCTIONS
	function extraerAsignatura($codigoMalla)
	{
	}
    //GETTERS
	function getPlan()
	{
		return $this->plan;
	}

	function getCodCarrera()
	{
		return $this->codigoCarrera;
	}

	function getIdMalla()
	{
		return $this->idMalla;
	}
    
    function getNiveles(){
        return $this->niveles;
    }
    
    function getDirector(){
        return $this->director;
    }

	static function getMallas()
	{
	}
    //SETTERS
	function setPlan($newVal)
	{
		$this->plan = $newVal;
	}
    
    function setDirector($newVal){
        $this->director = $newVal;
    }

	function setCodCarrera($newVal)
	{
		$this->codCarrera = $newVal;
	}
    
    function setNiveles($newVal){
        $this->niveles = $newVal;
    }

	function setIdMalla($newVal)
	{
		$this->idMalla = $newVal;
	}

}
?>