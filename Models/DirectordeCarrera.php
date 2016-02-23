<?php //namespace Models;
//require_once ('MallaCurricular.php');
require_once ('Profesor.php');
//require_once ('../autoload.php');
//require_once ('Competencia.php');
//equire_once ('ActividaddCompensacion.php');

class DirectorDeCarrera extends Profesor
{
    //VARS
	private $carrera;
	private $facultad;
	var $m_MallaCurricular;
	var $m_Competencia;
	var $m_ActividaddCompensacion;
    //CONSTRUCT
	function __construct()
	{
        parent::__construct();
	}
    //FUNCTIONS
	function crearAsignatura($idAsignatura, $nombreAsignatura, $nivelAsignatura)
	{
	}

	function crearCompetencia()
	{
	}

	function crearMallaCurricular($codigoMalla, $codigoCarrera , $duracionMalla, $anioMalla)
	{
	}

	function extraerMallaCurricular($codigoMallaCurricular)
	{
	}
    //GETTERS
	function getCarrera()
	{
		return $this->carrera;
	}

	function getFacultad()
	{
		return $this->facultad;
	}
    //SETTERS
	function setCarrera($newVal)
	{
		$this->carrera = $newVal;
	}

	function setFacultad($newVal)
	{
		$this->facultad = $newVal;
	}

}
?>