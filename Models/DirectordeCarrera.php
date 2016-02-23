<?php //namespace Models;
//require_once ('MallaCurricular.php');
require_once ('Profesor.php');
//require_once ('../autoload.php');
//require_once ('Competencia.php');
//equire_once ('ActividaddCompensacion.php');

/**
 * @author Freddy
 * @version 1.0
 * @created 19-Feb.-2016 19:48:54
 */
class DirectordeCarrera extends Profesor
{

	var $carrera;
	var $facultad;
	var $m_MallaCurricular;
	var $m_Competencia;
	var $m_ActividaddCompensacion;

	function __construct()
	{
        parent::__construct();
	}

	/**
	 * 
	 * @param idAsignatura
	 * @param nombreAsignatura
	 * @param nivelAsignatura
	 */
	function crearAsignatura($idAsignatura, $nombreAsignatura, $nivelAsignatura)
	{
	}

	function crearCompetencia()
	{
	}

	/**
	 * 
	 * @param codigoMalla
	 * @param codigoCarrera
	 * @param duracionMalla
	 * @param anioMalla
	 */
	function crearMallaCurricular($codigoMalla, $codigoCarrera , $duracionMalla, $anioMalla)
	{
	}

	/**
	 * 
	 * @param codigoMallaCurricular
	 */
	function extraerMallaCurricular($codigoMallaCurricular)
	{
	}

	function getcarrera()
	{
		return $this->carrera;
	}

	function getfacultad()
	{
		return $this->facultad;
	}

	/**
	 * 
	 * @param newVal
	 */
	function setcarrera($newVal)
	{
		$this->carrera = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	function setfacultad($newVal)
	{
		$this->facultad = $newVal;
	}

}
?>