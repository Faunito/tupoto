<?php //namespace Models;
require_once ('DBSingleton.php');
require_once ('Funcionario.php');
require_once ('DBConexion/DBProfesor.php');
class Profesor extends Funcionario
{
    //propias
	private $tipoProfesor;
    private $facultad;
    //para funciones negocios
    private $m_EvaluacionPracticaProfesor;
	private $m_Evaluacion;
	private $m_ProgramaCurricular;    
	var $dbprofesor;
    //CONSTRUCTS
	public function __construct()
	{
		$this -> dbprofesor = new DBProfesor();
	}    
    //FUNCTIONS
	function generarCuadroComparativo($Competencia, $PracticaEmpleador)
	{
	}
    
	function nuevaEvaluacionProfesor($rutAlumno)
	{
	}

    //SETTERS	
    function setFacultad($facultad){
        $this -> facultad = $facultad;
    }
    
    function setTipoProfesor($tipoProfesor){
        $this -> tipoProfesor = $tipoProfesor;
    }   
    //GETTERS
    function getTipoProfesor(){
        return $this->tipoProfesor;
    }
    
    function getFacultad(){
        return $this -> facultad;
    }   
    
    function getProfesor($email,$pass)
	{       
        $this -> setCorreoElectronico($email);
        $this -> setPassword($pass);
        $this -> dbprofesor -> GetInstance($this);
	}

}

?>