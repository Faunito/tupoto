<?php
require_once ('Competencia.php');
require_once ('DBConexion/DBEvidencia.php');

class Evidencia
{

	private $idEvidencia;    
	private $competencia;
	private $descripcion;
	private $nivelEvidencia;
	private $dbevidencia;

	function __construct()
	{
		$this->dbevidencia = new DBEvidencia();
	}

	//METODOS
	public static function getEvidenciasCompetencia($idCompetencia){
		return DBEvidencia::getAllAsoc($idCompetencia);
	}

	//GETTER
	function getIdEvidencia()
	{
		return $this->idEvidencia;
	}

	function getIdCompetencia()
	{
		return $this->competencia;
	}

	function getDescripcion()
	{
		return $this->descripcion;
	}

	function getNivel()
	{
		return $this->nivelEvidencia;
	}

    function getDBEvidencia()
    {
        return $this->dbevidencia;
    }
    
	//SETTERS
	function setIdEvidencia($idEvidencia)
	{
		$this->idEvidencia = $idEvidencia;
	}

	function setIdCompetencia($idCompetencia)
	{
		$this->competencia = $idCompetencia;
	}

	function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}

	function setNivel($nivel)
	{
		$this->nivelEvidencia = $nivel;
	}
}
?>