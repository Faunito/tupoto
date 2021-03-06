<?php //namespace Models;
require_once ('Malla.php');
require_once ('Profesor.php');
require_once ('PuedeImpartir.php');
require_once ('DBConexion/DBDirector.php');
require_once ('DBConexion/DBPuedeImpartir.php');
require_once ('Competencia.php');
require_once ('Evidencia.php');
require_once ('Especificacion.php');
require_once ('Practica.php');
require_once ('Evaluacion.php');
require_once ('DetalleEvaluacion.php');
require_once ('UsuarioFactory.php');
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
    private $desasignaCompetencia;
    private $empleador;

	function __construct()
	{
        parent::__construct();
        $this->dbdirector = new DBDirector();
	}

    //============ Funciones ================

	function existeDirector($email,$pass,$tipo){
        return $this->dbdirector->existeDirector($email,$pass,$tipo);
    }
   //============ Usuarios ================
   function registrarUsuario($rut,$nombre,$apaterno,$amaterno,$password,$correo,$extra,$facultad){
       $factoria = new UsuarioFactory();
       return $usuario = $factoria->crearUsuario($rut,$nombre,$apaterno,$amaterno,$password,$correo,$extra,$facultad);       
   }
        //============ Competencias ================
        function consultarCompetenciasMalla($id){
            $res = Competencia::getCompetenciasMalla($id);
            $i=0;
            $array=array();
            foreach ($res as $key) {
                $aux = new Competencia();
                $aux->setIdComp($key['ID_COMPETENCIA']);
                $aux->setCate($key['CATEGORIA']);
                $aux->setDesComp($key['DESCRIPCION_DE_COMPETENCIA']);
                $aux->setNomComp($key['NOMBRE_COMPETENCIA']);
                $array[$i] = $aux;
                $i++;
            }
            return $array;
        }

        function consultarCompetenciasNoMalla($id){
            $res = Competencia::getCompetenciasNoMalla($id);
            $i=0;
            $array=array();
            foreach ($res as $key) {
                $aux = new Competencia();
                $aux->setIdComp($key['ID_COMPETENCIA']);
                $aux->setCate($key['CATEGORIA']);
                $aux->setDesComp($key['DESCRIPCION_DE_COMPETENCIA']);
                $aux->setNomComp($key['NOMBRE_COMPETENCIA']);
                $array[$i] = $aux;
                $i++;
            }
            return $array;
        }

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
        //============ Especificacion ================
        function asignarAsignaturaCompetencia($idCompetencia,$idAsignatura,$Nivel){
            $this->especificacion = new Especificacion();
            $this->especificacion->setIdAsignatura($idAsignatura);
            $this->especificacion->setNivelCompetencia($Nivel);
            $this->especificacion->setIdCompetencia($idCompetencia);
            $this->especificacion->getDBEspecificacion()->add($this->especificacion);
        }

        function listarEspecificacionesAsignatura($id){
            $especificaciones = Especificacion::getEspecificacionesAsignatura($id);
            $i=0;
            $array=array();
            foreach ($especificaciones as $especificacion) {
                $nuevaE = new Especificacion();
                $nuevaE->setIdAsignatura($especificacion['ID_ASIGNATURA']);
                $nuevaE->setIdCompetencia($especificacion['ID_COMPETENCIA']);
                $nuevaE->setNivelCompetencia($especificacion['NIVELES_COMPETENCIA']);
                $array[$i] = $nuevaE;
                $i++;
            }
            return $array;
        }

        function quitarEspecificacion($idmalla, $idcompetencia){
            //sacar las asignaturas de la malla
            $asignaturas = Asignatura::getAsignaturasMalla($idmalla);

            foreach ($asignaturas as $asignatura) {
                $this->especificacion = new Especificacion();
                $this->especificacion->setIdCompetencia($idcompetencia);
                $this->especificacion->setIdAsignatura($asignatura['ID_ASIGNATURA']);
                $this->especificacion->getDBEspecificacion()->delete($this->especificacion);
            }

        }

        //============ Asignaturas ================
        function consultarAsignatura($codigo){
            $asignatura = new Asignatura();
            $asignatura->setId($codigo);
            $asignatura->getDBAsignatura()->GetInstance($asignatura);
            return $asignatura;
        }
        
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
        function desasignarCompetenciaMalla($idMalla,$idCompetencia){
            $this->desasignaCompetencia = new PuedeImpartir();
            $this->desasignaCompetencia->setIdMalla($idMalla);
            $this->desasignaCompetencia->setIdCompetencia($idCompetencia);
            $this->desasignaCompetencia->getDBPuede()->delete($this->desasignaCompetencia);
        }
        //============== Mallas ================
        function consultarMalla($id){
            $malla = new Malla();
            $malla->setIdMalla($id);
            $malla->getDBMalla()->GetInstance($malla);
            return $malla;
        }
        
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

        function consultarMallasCompetencia($idCompetencia){
            $mallas = Malla::getMallasCompetencia($idCompetencia);
            $i=0;
            $array=array();
            foreach ($mallas as $malla) {
                $res = new Malla();                
                $res->setIdMalla($malla['ID_MALLA']);
                $res->setPlan($malla['PLAN']);
                $res->setCodCarrera($malla['CODIGO_CARRERA']);
                $res->setNiveles($malla['NIVELES']);
                $array[$i] = $res;
                $i++;
            }
            return $array;
        }

        //============ Alumnos ================
        function consultarAlumno($rut){
            $alumno = new Alumno();
            $alumno->setRut($rut);
            $alumno->getDBalumno()->GetInstance($alumno);
            return $alumno;
        }

        //============ Practicas ==============
        function consultarPractica($id){
            $practica = new Practica();
            $practica->setIdPractica($id);
            $practica->getDBPractica()->GetInstance($practica);
            return $practica;
        }

        //============ Evaluaciones ================ 
        function consultarEvaluacionesPractica($practica){
            $evaluaciones = Evaluacion::getEvaluacionesPractica($practica);
            $arrEvaluaciones = array();
            foreach ($evaluaciones as $key) {
            	$aux = new Evaluacion();
            	$aux->setPractica($key['ID_PRACTICA']);
                if($key['RUT_E']!=NULL){
                    //es empleador
                    $empleador = new Empleador();
                    $empleador->setRut($key['RUT_E']);
                    $empleador->getDBEmpleador()->GetInstance($empleador);                 
                    $aux->setEmpleador($empleador);
                    $aux->setProfesor(NULL);
                }
                if($key['RUT_P']!=NULL){
                    //es profesor
                    $profesor = new Profesor();
                    $profesor->setRut($key['RUT_P']);
                    $profesor->getDBProfesor()->consultarProfesor($profesor);
                    $aux->setProfesor($profesor);
                    $aux->setEmpleador(NULL);
                }                
                $aux->setResultado($key['RESULTADO']);
            	$aux->setFechaEntrega($key['FECHA_ENTREGA']);
            	$aux->setIdEvaluacion($key['ID_EVALUACION']);
            	$aux->setObservacion($key['OBSERVACIONES']);
            	array_push($arrEvaluaciones, $aux);
            }            
            return $arrEvaluaciones;
        }
        
        function crearEvaluacionAcademica($idpractica, $profesor, $resultado){
            $practica = new Practica();
            $practica->setIdPractica($idpractica);

            $evaluacion = new Evaluacion();
            $evaluacion->setPractica($practica);
            $evaluacion->setProfesor($profesor);
            $evaluacion->setEmpleador(null);
            $evaluacion->setResultado($resultado);

            $idevaluacion =  $evaluacion->getDBEvaluacion()->add($evaluacion);
            $evaluacion->setIdEvaluacion($idevaluacion);
            $evaluacion->getDBEvaluacion()->addEvalua($evaluacion);
            return $idevaluacion;
        }

        function crearEvaluacionCompetencia($idevaluacion, $idcompetencia, $observacion, $calificacion){
            $competencia = new Competencia();
            $competencia->setIdComp($idcompetencia);

            $evaluacion = new Evaluacion();
            $evaluacion->setIdEvaluacion($idevaluacion);

            $detalle = new DetalleEvaluacion();
            $detalle->setCompetencia($competencia);
            $detalle->setEvaluacion($evaluacion);
            $detalle->setObservacion($observacion);
            $detalle->setCalificacion($calificacion);

            $evaluacion->getDBEvaluacion()->addDetalle($detalle);
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