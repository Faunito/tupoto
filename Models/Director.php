<?php //namespace Models;
//require_once ('MallaCurricular.php');
require_once ('Profesor.php');
require_once ('DBConexion/DBDirector.php');
require_once ('Competencia.php');
//require_once ('../autoload.php');
//equire_once ('ActividaddCompensacion.php');

class Director extends Profesor
{
    //VARS
	private $carrera;
	private $facultad;
	//var $m_MallaCurricular;
	private $competencia;
	//var $m_ActividaddCompensacion;
    //var $dbdirector;
    //CONSTRUCT
	function __construct()
	{
        parent::__construct();
        $this->dbdirector = new DBDirector();
	}

	function existeDirector($email,$pass,$tipo){
        return $this->dbdirector->existeDirector($email,$pass,$tipo);
    }  
    //asignatura
	function crearAsignatura($idAsignatura, $nombreAsignatura, $nivelAsignatura){
	}
    //competencias
	function crearCompetencia($id,$cate,$nomb,$desc){
        $this->competencia = new Competencia();
        $this->competencia->setIdComp($id);
        $this->competencia->setCate($cate);
        $this->competencia->setNomComp($nomb);
        $this->competencia->setDesComp($desc);
        $this->competencia->setDirector($this);
        $this->competencia->getDBCompetencia()->add($this->competencia);        
	}
    
    function modificarCompetencia($id,$cate,$nomb,$desc){
        $this->competencia = new Competencia();
        $this->competencia->setIdComp($id);
        $this->competencia->setCate($cate);
        $this->competencia->setNomComp($nomb);
        $this->competencia->setDesComp($desc);
        $this->competencia->setDirector($this);
        $this->competencia->getDBCompetencia()->modify($this->competencia);
    }
    
    function eliminarCompetencia($id){
        $this->competencia = new Competencia();
        $this->competencia->setIdComp($id);
        $this->competencia->getDBCompetencia()->delete($this->competencia);
    }
    //mallas
	function crearMallaCurricular($codigoMalla, $codigoCarrera , $duracionMalla, $anioMalla){
	}
    
	function extraerMallaCurricular($codigoMallaCurricular){
	}
    //GETTERS
	function getCarrera()
	{
		return $this->carrera;
	}

	function getFacultad(){
		return $this->facultad;
	}
    
    function getDirector($email,$pass){
        $this->setCorreoElectronico($email);
        $this->setPassword($pass);
        $this->dbdirector->GetInstance($this);
    }
    //SETTERS
	function setCarrera($carrera){
		$this->carrera = $carrera;
	}

	function setFacultad($facultad){
		$this->facultad = $facultad;
	}

}
?>