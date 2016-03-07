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
	private $listaOff;
	//private $m_Competencia;
	private $m_Asignatura; //Array de Asignaturas
    private $dbMalla;
    //construct
	function __construct()
	{
        $this->dbMalla = new DBMalla();
	}
    //FUNCTIONS

    public static function getMallas()
	{
        return DBMalla::getAll();
	}
	public static function getMalla($id)
	{
        return DBMalla::getMalla($id);
	}
	function getMallasCompetencia($idCompetencia){
		return DBMalla::getMallasCompetencia($idCompetencia);
	}
	
    //GETTERS
	function getDBMalla()
	{
		return $this->dbMalla;
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
	
	 function getAsignaturasOff()
    {
    	return $this->listaOff;
    }
	
    //SETTERS
	function setAsignaturas($asignaturas)
	{
		foreach($asignaturas as $asignatura)
		{
			$asignatura->setMalla($this);
		}
		$this->m_Asignatura = $asignaturas;
	}

	function unsetAsignaturas($asignaturas)
	{
		foreach($asignaturas as $asignatura)
		{
			$asignatura->unsetMalla();
		}
		$this->listaOff = $asignaturas;
	}

	function setPlan($plan)
	{
		$this->plan = $plan;
	}
    
    function setDirector($director){
        $this->director = $director;
    }

	function setCodCarrera($codigo)
	{
		$this->codigoCarrera = $codigo;
	}
    
    function setNiveles($niveles){
        $this->niveles = $niveles;
    }

	function setIdMalla($idmalla)
	{
		$this->idMalla = $idmalla;
	}

}
?>