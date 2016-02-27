<?php
//require_once ('Practica.php');

class Evaluacion
{

	var $resultado;
	var $fechaEntrega;
	var $idEvaluacion;
	var $observacion; //Fatla en la Base de Datos
	//var $m_Practica;

	function __construct()
	{
	}

	//METODOS

	//GETTER
	function getResultado()
	{
		return $this->resultado;
	}

	function getFechaEntrega()
	{
		return $this->fechaEntrega;
	}

	function getIdEvaluacion()
	{
		return $this->idEvaluacion;
	}

	function getObservacion()
	{
		return $this->observacion;
	}

	//SETTERS
	function setResultado($newVal)
	{
		$this->resultado = $newVal;
	}

	function setFechaEntrega($newVal)
	{
		$this->fechaEntrega = $newVal;
	}

	function setIdEvaluacion($newVal)
	{
		$this->idEvaluacion = $newVal;
	}

	function setObservacion($newVal)
	{
		$this->observacion = $newVal;
	}

}
?>