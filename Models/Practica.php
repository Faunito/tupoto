<?php
require_once ('DBSingleton.php');
require_once ('DBConexion/DBPractica.php');
require_once ('Alumno.php');
require_once ('Empleador.php');

class Practica{
    
    private $dbpractica;
    private $idPractica;
    private $alumno;
    private $direccion;
    private $estado;
    private $fechaInicio;
    private $fechaTermino;
    private $intento;
    private $nivelPractica;
    private $horas;
  
  public function __construct(){
      $this->dbpractica = new DBPractica();
  }
  
  //GETTERS
  function getDBPractica(){
      return $this->dbpractica;
  }
  
  function getIdPractica(){
      return $this->idPractica;
  }
  
  function getAlumno(){
      return $this->alumno;
  }
  
  function getDireccion(){
      return $this->direccion;
  }
  
  function getEstado(){
      return $this->estado;
  }
  
  function getFechaInicio(){
      return $this->fechaInicio;
  }
  
  function getFechaTermino(){
      return $this->fechaTermino;
  }
  
  function getIntento(){
      return $this->intento;
  }
  
  function getNivelPractica(){
      return $this->nivelPractica;
  }
  
  function getHoras(){
      return $this->horas;
  }
  //SETTERS
  function setIdPractica($newVal){
      $this->idPractica = $newVal;
  }
  
  function setAlumno($newVal){
      $this->alumno = $newVal;
  }
  
  function setDireccion($newVal){
      $this->direccion = $newVal;
  }
  
  function setEstado($newVal){
      $this->estado = $newVal;
  }
  
  function setFechaInicio($newVal){
      $this->fechaInicio = $newVal;
  }
  
  function setFechaTermino($newVal){
      $this->fechaTermino = $newVal;
  }
  
  function setIntento($newVal){
      $this->intento = $newVal;
  }
  
  function setNivelPractica($newVal){
      $this->nivelPractica = $newVal;
  }
  
  function setHoras($newVal){
      $this->horas = $newVal;
  }
}

?>