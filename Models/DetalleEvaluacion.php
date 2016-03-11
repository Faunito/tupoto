<?php
require_once ('Evaluacion.php');
require_once ('Competencia.php');
require_once ('DBConexion/DBDetalleEvaluacion.php');

class DetalleEvaluacion
{
	private $calificacion;
	private $observacion;
    //PKS
	private $evaluacion;
	private $competencia;
	private $dbdetalleevaluacion;

	function __construct(){
		$this->dbdetalleevaluacion = new DBDetalleEvaluacion();
	}

	function getCompetenciasEvaluacion(){
		$this->competencia = new Competencia();
		$competencias = $this->competencia->getDBCompetencia()->getCompetenciasMalla($this->evaluacion->getPractica()->getAlumno()->getIdMalla());
		$array = array();
		$i = 0;
		foreach ($competencias as $competencia) {
			$nueva = new Competencia();
			$nueva->setIdComp($competencia['ID_COMPETENCIA']);
			$nueva->setNomComp($competencia['NOMBRE_COMPETENCIA']);
			$nueva->setDesComp($competencia['DESCRIPCION_DE_COMPETENCIA']);
			$nueva->setCate($competencia['CATEGORIA']);
			$array[$i] = $nueva;
			$i++;
		}
		return $array;
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