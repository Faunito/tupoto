<?php
require_once ('Practica.php');
require_once ('Profesor.php');
require_once ('Empleador.php');
require_once ('DBConexion/DBEvaluacion.php');

class Evaluacion
{

	private $resultado;    
	private $fechaEntrega;
	private $idEvaluacion;
	private $observacion;
    
	private $practica;
	private $profesor;
	private $empleador;
    
	private $dbevaluacion;

	function __construct()
	{
		$this->dbevaluacion = new DBEvaluacion();
	}

	//METODOS
    public static function getEvaluacionesPractica($practica){
        return DBEvaluacion::getEvaluacionesPractica($practica);
    }
	//GETTER
	function getDBEvaluacion(){
		return $this->dbevaluacion;
	}
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

	function getProfesor()
	{
		return $this->profesor;
	}

	function getEmpleador()
	{
		return $this->empleador;
	}

	function getPractica()
	{
		return $this->practica;
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

	function setProfesor($newVal)
	{
		$this->profesor = $newVal;
	}

	function setEmpleador($newVal)
	{
		$this->empleador = $newVal;
	}

	function setPractica($newVal)
	{
		$this->practica = $newVal;
	}

}
?>