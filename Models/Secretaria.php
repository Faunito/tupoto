<?php 

require_once ('DBSingleton.php');
require_once ('Funcionario.php');
require_once ('Practica.php');
require_once ('Empleador.php');
require_once ('DBConexion/DBSecretaria.php');

class Secretaria extends Funcionario
{
    //VARS
    private $facultad;
    private $telefono;
    private $dbsecretaria;
    //FUNCIONES
    //CONSTRUCTS
    function __construct(){
        $this->dbsecretaria = new DBSecretaria();
    }
    //FUNCTIONS
    
    function existeSecre($email,$pass){
        return $this->dbsecretaria->existeSecre($email,$pass);
    }
    //PRACTICAS
    function registrarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$intento,$nivelPractica,$horas){
        $this->practica = new Practica();
        $this->practica->setAlumno($alumno);
        $this->practica->setDireccion($direccion);
        $this->practica->setEstado($estado);
        $this->practica->setFechaInicio($fechaInicio);
        $this->practica->setFechaTermino($fechaTermino);
        $this->practica->setIntento($intento);
        $this->practica->setNivelPractica($nivelPractica);
        $this->practica->setHoras($horas);
        return $this->practica->getDBPractica()->add($this->practica); 
    } 
    
    function consultarPractica($id){
        $practica = new Practica();
        $practica->setIdPractica($id);
        $practica->getDBPractica()->GetInstance($practica);
        return $practica;
    }
    
    function eliminarPractica($id){
        $this->practica = new Practica();
        $this->practica->setIdPractica($id);
        $this->practica->getDBPractica()->delete($this->practica);
    }
    
    function modificarPractica($id,$direccion,$fechaInicio,$fechaTermino,$nivelPractica,$horas){
        $practica = new Practica();
        $fechaInicio = date ('Y-m-d',strtotime($fechaInicio));
        $fechaTermino = date ('Y-m-d',strtotime($fechaTermino));
        $practica->setIdPractica($id);
        $practica->setDireccion($direccion);
        $practica->setFechaInicio($fechaInicio);
        $practica->setFechaTermino($fechaTermino);
        $practica->setNivelPractica($nivelPractica);
        $practica->setHoras($horas);
        $practica->getDBPractica()->modify($practica);
    }
    //Alumnos
    function modificarAlumno($rut,$nombre,$apaterno,$amaterno){
        $this->alumno = new Alumno();
        $this->alumno->setRut($rut);
        $this->alumno->setNombre($nombre);
        $this->alumno->setApaterno($apaterno);
        $this->alumno->setAmaterno($amaterno);
        $this->alumno->getDBAlumno()->modify($this->alumno);
    }
    
    function eliminarAlumno($rut){
        $this->alumno = new Alumno();
        $this->alumno->setRut($rut);
        $this->alumno->getDBAlumno()->delete($this->alumno);
    }    
    
    function consultarAlumno($rut){
        $alumno = new Alumno();
        $alumno->setRut($rut);
        $alumno->getDBAlumno()->GetInstance($alumno);
        return $alumno;
    }
    
    function registrarAlumno($rut,$carrera,$nombre,$apaterno,$amaterno){
        $alumno = new Alumno();
        $alumno -> setRut($rut);
        $alumno -> setCarrera($carrera);
        $alumno -> setNombre($nombre);
        $alumno -> setApaterno($apaterno);
        $alumno -> setAmaterno($amaterno);
        $alumno -> getDBAlumno() -> add($alumno);
    }

    function consultarCompetenciasEvaluacion($practica, $alumno){  
            $practica->setAlumno($alumno);
            $evaluacion = new Evaluacion();
            $evaluacion->setPractica($practica);     

            $detalle = new DetalleEvaluacion();
            $detalle->setEvaluacion($evaluacion);

            return $detalle->getCompetenciasEvaluacion();
    }

    function crearEvaluacionExterna($idpractica, $rut, $fechaentrega, $resultado, $observaciones){
            $practica = new Practica();
            $practica->setIdPractica($idpractica);

            $empleador = new Empleador();
            $empleador->setRut($rut);

            $evaluacion = new Evaluacion();
            $evaluacion->setPractica($practica);
            $evaluacion->setProfesor(null);
            $evaluacion->setEmpleador($empleador);
            $evaluacion->setResultado($resultado);
            $evaluacion->setObservacion($observaciones);

            $idevaluacion =  $evaluacion->getDBEvaluacion()->add($evaluacion);
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

        function crearEmpleador($rut, $nombre, $apaterno, $amaterno, $empresa, $cargo, $telefono){
            $empleador = new Empleador();
            $empleador->setRut($rut);
            $empleador->setNombre($nombre);
            $empleador->setApaterno($apaterno);
            $empleador->setAmaterno($amaterno);
            $empleador->setNomEmpresa($empresa);
            $empleador->setCelular($telefono);
            $empleador->setFonoFijo(null);
            $empleador->setCantPractica(1);
            $empleador->getDBEmpleador()->add($empleador);
        }
    
    //SETTERS
    function setFacultad($facultad){
        $this -> facultad = $facultad;
    }
    
    function setTelefono($telefono){
        $this -> telefono = $telefono;
    }
    //GETTERS
    function getFacultad(){
        return $this->facultad;
    }
    
    function getTelefono(){
        return $this->telefono;
    }
    
    function getSecretaria($email,$pass){
        $this->setCorreoElectronico($email);
        $this->setPassword($pass);
        $this->dbsecretaria -> GetInstance($this);
    }
    
    function getDBSecretaria(){
        return $this->dbsecretaria;
    }
}
?>