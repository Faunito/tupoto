<?php //namespace Models;
require_once ('Malla.php');
require_once ('Profesor.php');
require_once ('PuedeImpartir.php');
require_once ('DBConexion/DBDirector.php');
require_once ('DBConexion/DBPuedeImpartir.php');
require_once ('Competencia.php');
require_once ('Evidencia.php');

//require_once ('../autoload.php');
//equire_once ('ActividaddCompensacion.php');

class Director extends Profesor
{
    //VARS
	private $carrera;
	private $facultad;
	private $competencia;
    private $evidencia;
    private $asignatura;
    private $malla;
    private $asignaCompetencia;

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
        function consultarCompetencia($id){            
            $this->competencia = new Competencia();
            $this->competencia->setIdComp($id);
            $this->competencia->setDirector($this);
            return $this->competencia->getDBCompetencia()->GetInstance($this->competencia); 
        }

    	function crearCompetencia($cate,$nomb,$desc){
            $this->competencia = new Competencia();
            $this->competencia->setCate($cate);
            $this->competencia->setNomComp($nomb);
            $this->competencia->setDesComp($desc);
            $this->competencia->setDirector($this);
            return $this->competencia->getDBCompetencia()->add($this->competencia);        
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

        //============ Evidencias ================
        function consultarEvidencia($id){  
            $this->competencia = new Evidencia();
            $this->competencia->setIdEvidencia($id);
            return $this->competencia->getDBEvidencia()->GetInstance($this->competencia); 
        }

        function crearEvidencia($descripcion, $nivel, $idCompetencia){
            $this->evidencia = new Evidencia();
            $this->evidencia->setDescripcion($descripcion);
            $this->evidencia->setNivel($nivel);
            $this->evidencia->setIdCompetencia($idCompetencia);
            $this->evidencia->getDBEvidencia()->add($this->evidencia);        
        }

        function modificarEvidencia($idCompetencia, $descripcion, $nivel){
            $this->evidencia = new Evidencia();
            $this->evidencia->setIdCompetencia($idCompetencia);
            $this->evidencia->setDescripcion($descripcion);
            $this->evidencia->setNivel($nivel);
            $this->evidencia->getDBEvidencia()->modify($this->evidencia);
        }
        
        function eliminarEvidencia($id){
            $this->evidencia = new Evidencia();
            $this->evidencia->setIdEvidencia($id);
            $this->evidencia->getDBEvidencia()->delete($this->evidencia);
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
        //============ Asignar competencia a malla ================
        function asignarCompetenciaMalla($idMalla,$idCompetencia){
            $this->asignaCompetencia = new PuedeImpartir();
            $this->asignaCompetencia->setIdMalla($idMalla);
            $this->asignaCompetencia->setIdCompetencia($idCompetencia);
            $this->asignaCompetencia->getDBPuede()->add($this->asignaCompetencia);
        }
        //============ Mallas ================
        function crearMalla($codigo, $plan, $lvl, $asignaturas)
        {
            $this->malla = new Malla();
            $this->malla->setCodCarrera($codigo);
            $this->malla->setPlan($plan);
            $this->malla->setNiveles($lvl);
            $this->malla->setDirector($this);
            $this->malla->setAsignaturas($asignaturas);
            $this->malla->getDBMalla()->add($this->malla);
        }

        function modificarMalla($id, $codigo, $plan, $lvl, $listaOn, $listaOff)
        {
            $this->malla = new Malla();
            $this->malla->setIdMalla($id);
            $this->malla->setCodCarrera($codigo);
            $this->malla->setPlan($plan);
            $this->malla->setNiveles($lvl);
            $this->malla->setDirector($this);
            $this->malla->setAsignaturas($listaOn);
            $this->malla->unsetAsignaturas($listaOff);
            $this->malla->getDBMalla()->modify($this->malla);
        }
        
        function eliminarMalla($id)
        {
            $this->malla = new Malla();
            $this->malla->setIdMalla($id);
            $this->malla->getDBMalla()->delete($this->malla);
        }

        //============ Alumnos ================

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