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
	private $competencia;
    private $asignatura;

	function __construct()
	{
        parent::__construct();
        $this->dbdirector = new DBDirector();
	}

    //============ Funciones ================

	function existeDirector($email,$pass,$tipo){
        return $this->dbdirector->existeDirector($email,$pass,$tipo);
    }  

        //============ Competencias ================
    	function crearCompetencia($cate,$nomb,$desc){
            $this->competencia = new Competencia();
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

        //============ Asignaturas ================
        function crearAsignatura($codigo, $nombre, $nivel){
            $this->asignatura = new Asignatura();
            $this->asignatura->setCodigo($codigo);
            //$this->asignatura->setMalla($malla);
            $this->asignatura->setNombre($nombre);
            $this->asignatura->setNivel($nivel);
            $this->asignatura->getDBAsignatura()->add($this->asignatura);
        }

        function modificarAsignatura($id, $codigo, $nombre, $nivel){
            $this->asignatura = new Asignatura();
            $this->asignatura->setId($id);
            $this->asignatura->setCodigo($codigo);
            $this->asignatura->setNombre($nombre);
            $this->asignatura->setNivel($nivel);
            $this->asignatura->setDirector($this);
            $this->asignatura->getDBAsignatura()->modify($this->asignatura);
        }

        function eliminarAsignatura($id){
            $this->asignatura = new Asignatura();
            $this->asignatura->setId($id);
            $this->asignatura->getDBAsignatura()->delete($this->asignatura);
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