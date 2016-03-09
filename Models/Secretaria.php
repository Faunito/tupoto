<?php 

require_once ('DBSingleton.php');
require_once ('Funcionario.php');
require_once ('Practica.php');
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
    
    //SETTERS
    function setFacultad($facultad){
        $this -> facultad = $facultad;
    }
    
    function setTelefono($telefono){
        $this -> telefono = $telefono;
    }
    //GETTERS
    function getFacultad(){
        return $facultad;
    }
    
    function getTelefono(){
        return $telefono;
    }
    
    function getSecretaria($email,$pass){
        $this->setCorreoElectronico($email);
        $this->setPassword($pass);
        $this->dbsecretaria -> GetInstance($this);
    }
}
?>