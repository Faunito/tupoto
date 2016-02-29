<?php
require_once ('Evaluacion.php');
require_once ('Competencia.php');

class DetalleEvaluacion
{
	private $calificacion;
	private $observacion;
    //PKS
	private $evaluacion;
	private $competencia;

	function __construct()
	{
	}


	//GETTERS
	function getCalificacion()
	{
		return $this->calificacion;
	}

	function getObservacion()
	{
		return $this->observacion;
	}

	function getEvaluacion()
	{
		return $this->evaluacion;
	}

	function getCompetencia()
	{
		return $this->competencia;
	}


	//SETTERS
	function setCalificacion($newVal)
	{
		$this->calificacion = $newVal;
	}

	function setObservacion($newVal)
	{
		$this->observacion = $newVal;
	}

	function setEvaluacion($newVal)
	{
		$this->evaluacion = $newVal;
	}

	function setCompetencia($newVal)
	{
		$this->competencia = $newVal;
	}
}
?>