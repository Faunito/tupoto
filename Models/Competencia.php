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
    private $falComp;
	//private $m_MallaCurricular;
	//private $m_DetalleEvaluacion;
	//private $m_EspecificaciondeEvidencia;
	//FUNCTIONS
	function __construct()
	{
		$this->dbcomp = new DBCompetencia();		
	}
    
	//GETTERS
    //recibe objeto eliminar $var si no funciona
    public static function getCompetencias(){
        return DBCompetencia::getAll();
    } 
    
    function getCate(){
        return $this->categoria;    
    }
    
    function getDirector(){
        return $this->director;
    }
    
	function getDesComp(){
		return $this->desComp;
	}

	function getIdComp()
	{
		return $this->idComp;
	}

	function getNomComp()
	{
		return $this->nomComp;
	}

	function getFalComp()//falencia competencia
	{
        return $this->falComp;
	}

	function getDBCompetencia(){
		return $this->dbcomp;
	}
    
    public static function getCompetencia($id){
        return DBCompetencia::getCompetencia($id);
    }
	//SETTERS
    function setFalComp($newVal){
        $this->falComp = $newVal;
    }
        
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
		$this->nomComp = $newVal;
	}

}
?>