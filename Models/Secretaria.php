<?php 

require_once ('DBSingleton.php');
require_once ('Funcionario.php');
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
    
    function registrarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$intento,$nivelPractica,$horas){
        $this->practica = new Practica();
        $this->practica->setAlumno($alumno);
        $this->practica->setDireccion($direccion);
        $this->practica->setEstado($estado);
        $this->practica->setFechaInicio($fechaInicio);
        $this->practica->setTermino($fechaTermino);
        $this->practica->setIntento($intento);
        $this->practica->setNivelPracica($nivelPractica);
        $this->practica->setHoras($horas);
        return $this->practica->getDBPractica()->add($this->practica); 
    } 
    
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
        $this->ssecretariactronico($email);
        $this->setPassword($pass);
        $this->dbsecretaria -> GetInstance($this);
    }
}
?>