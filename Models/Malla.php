<?php
require_once ('Director.php');
require_once ('Competencia.php');
require_once ('Asignatura.php');
require_once ('DBConexion/DBMalla.php');

class Malla
{

	private $plan;	
	private $idMalla;
    private $codigoCarrera;
	private $niveles;
	private $director;
	//private $m_Competencia;
	private $m_Asignatura; //Array de Asignaturas
    private $dbmalla;
    //construct
	function __construct()
	{
        $this->dbMalla= new DBMalla();
	}
    //FUNCTIONS

    public static function getMallas()
	{
	}
	
    //GETTERS
	function getDBMalla()
	{
		$this->dbmalla;
	}

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

    function getAsignaturas()
    {
    	return $this->m_Asignatura;
    }
	
    //SETTERS
	function setAsignaturas($newVal)
	{
		foreach($newVal as $value)
		{
			$value->setMalla($this);
		}
		$this->m_Asignatura = $newVal;
	}

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