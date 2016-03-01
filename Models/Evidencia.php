<?php
require_once ('Competencia.php');
require_once ('DBConexion/DBEvidencia.php');

class Evaluacion
{

	private $idEvidencia;    
	private $idCompetencia;
	private $descripcion;
	private $nivelEvidencia;
  
	private $dbevidencia;

	function __construct()
	{
		$this->dbevidencia = new DBEvidencia();
	}

	//METODOS

	//GETTER
	function getIdEvidencia()
	{
		return $this->idEvidencia;
	}

	function getIdCompetencia()
	{
		return $this->idCompetencia;
	}

	function getDescripcion()
	{
		return $this->descripcion;
	}

	function getNivel()
	{
		return $this->nivelEvidencia;
	}

	//SETTERS
	function setIdEvidencia($idEvidencia)
	{
		$this->idEvidencia = $idEvidencia;
	}

	function setIdCompetencia($idCompetencia)
	{
		$this->idCompetencia = $idCompetencia;
	}

	function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	function setNivel($nivel)
	{
		$this->nivel = $nivel;
	}
}
?>