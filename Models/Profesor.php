<?php //namespace Models;
require_once ('DBSingleton.php');
require_once ('Funcionario.php');
require_once ('DBConexion/DBProfesor.php');
class Profesor extends Funcionario
{
    //propias
	private $area;
	private $titulo;
	private $tipoProfesor;
    private $email;
    private $rut;
    private $nombre;
    private $apaterno;
    private $amaterno;
    //para funciones negocios
    var $m_EvaluacionPracticaProfesor;
	var $m_Evaluacion;
	var $m_ProgramaCurricular;
    
    
	var $bdprofesor;
	var $dbprofesor;
    private $con;
    //CONSTRUCTS
	public function __construct()
	{
		$this -> dbprofesor = new DBProfesor();
	}    
    //FUNCTIONS
	function GenerarCuadroComparativo($Competencia, $PracticaEmpleador)
	{
	}
    
	function nuevaEvaluacionProfesor($rutAlumno)
	{
	}

    //SETTERS
	function setArea($area)
	{
		$this->area = $area;
	}

	function setTitulo($titulo)
	{
		$this->titulo = $titulo;
	}
    
    function setTipoProfesor($tipoProfesor){
        $this -> tipoProfesor = $tipoProfesor;
    }   
        
    function setEmail($email){
        $this -> email =  $email;
    }
    
    function setFacultad($facultad){
        $this -> facultad = $facultad;
    }
    
    function setApaterno($apaterno){
        $this -> apaterno = $apaterno;
    }
    
    function setAmaterno($amaterno){
        $this -> amaterno = $amaterno;
    }
    
    function setRut($rut){
        $this -> rut = $rut;
    }    
    //GETTERS
    function getTipoProfesor(){
        return $this->tipoProfesor;
    }
    
    function getArea()
	{
		return $this->area;
	}

	function getTitulo()
	{
		return $this->titulo;
	}
    
    function getEmail(){
        return $this -> email;
    }
    
    function getFacultad(){
        return $this -> facultad;
    }
    
    function getApaterno(){
        return $this->apaterno;
    }
    
    function getAmaterno(){
        return $this -> amaterno;
    }
    
    function getNombre(){
        return $this -> nombre;
    }    
    
    function getProfesor($email,$pass)
	{       
        $this -> setcorreoElectronico($email);
        $this -> setpassword($pass);
        $this -> dbprofesor -> GetInstance($this);
	}

}

?>