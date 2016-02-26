<?php
//require_once ('MallaCurricular.php');
//require_once ('DetalleEvaluacion.php');
//require_once ('EspecificaciondeEvidencia.php');
require_once ('DBConexion/DBCompetencia.php');
require_once('Director.php');
class Competencia
{
	private $categoria;
	private $desComp;
	private $idComp;
	private $nomComp;
	private $dbcomp;
    private $director;
	//private $m_MallaCurricular;
	//private $m_DetalleEvaluacion;
	//private $m_EspecificaciondeEvidencia;
	//FUNCTIONS
	function __construct()
	{
		$this->dbcomp = new DBCompetencia();		
	}
    
	//GETTERS
    function getCate(){
        return $this->categoria;    
    }
    
    function getDirector(){
        return $this->director;
    }
    
	function getDesComp()
	{
		return $this->desComp;
	}

	function getIdComp()
	{
		return $this->idComp;
	}

	function getNomComp()
	{
		return $this->nombComp;
	}

	function getFalComp()
	{
	}

	function getDBCompetencia(){
		return $this->dbcomp;
	}
	//SETTERS
    function setCate($newVal){
        $this->categoria = $newVal;
    }
    
    function setDirector($newVal){
        $this->director = $newVal;
    }
    
	function setDesComp($newVal)
	{
		$this->desComp = $newVal;
	}

	function setIdComp($newVal)
	{
		$this->idComp = $newVal;
	}

	function setNomComp($newVal)
	{
		$this->nombComp = $newVal;
	}

}
?>