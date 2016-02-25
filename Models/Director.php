<?php //namespace Models;
//require_once ('MallaCurricular.php');
require_once ('Profesor.php');
require_once ('DBConexion/DBDirector.php');
//require_once ('../autoload.php');
//require_once ('Competencia.php');
//equire_once ('ActividaddCompensacion.php');

class Director extends Profesor
{
    //VARS
	private $carrera;
	private $facultad;
	//var $m_MallaCurricular;
	//var $m_Competencia;
	//var $m_ActividaddCompensacion;
    //var $dbdirector;
    //CONSTRUCT
	function __construct()
	{
        parent::__construct();
        $this->dbdirector = new DBDirector();
	}

	function existeDirector($email,$pass,$tipo){
        return $this->dbdirector->existeDirector($email,$pass,$tipo);
    }  

	function crearAsignatura($idAsignatura, $nombreAsignatura, $nivelAsignatura){
	}

	function crearCompetencia()	{
	}

	function crearMallaCurricular($codigoMalla, $codigoCarrera , $duracionMalla, $anioMalla){
	}

	function extraerMallaCurricular($codigoMallaCurricular){
	}

	function getCarrera()
	{
		return $this->carrera;
	}

	function getFacultad(){
		return $this->facultad;
	}
    
    function getDirector($email,$pass){
        $this->setCorreoElectronico($email);
        $this->setPassword($pass);
        $this->dbdirector->GetInstance($this);
    }


	function setCarrera($carrera){
		$this->carrera = $carrera;
	}

	function setFacultad($facultad){
		$this->facultad = $facultad;
	}

}
?>