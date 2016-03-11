<?php //namespace Models;
require_once ('DBSingleton.php');
require_once ('Funcionario.php');
require_once ('DBConexion/DBProfesor.php');

class Profesor extends Funcionario
{
    //propias
	private $tipoProfesor;
    private $facultad;
    private $alumno;
    //para funciones negocios
    private $m_EvaluacionPracticaProfesor;
	private $m_Evaluacion;
	private $m_ProgramaCurricular;    
	private $dbprofesor;

	public function __construct(){
		$this->dbprofesor = new DBProfesor();
	}    

    function existeProfe($email,$pass,$tipo){
        return $this->dbprofesor->existeProfesor($email,$pass,$tipo);
    }  	

	function GenerarCuadroComparativo($Competencia, $PracticaEmpleador){

	}
    
	function nuevaEvaluacionProfesor($rutAlumno){

	}
    public static function getProfesores()
    {
        return DBProfesor::getAll();
    }

    function consultarProfesor($rut)
    {
        return DBProfesor::consultarProfesor($rut);
    }
    //SETTERS	
    function setFacultad($facultad){
        $this->facultad = $facultad;
    }
    
    function setTipoProfesor($tipoProfesor){
        $this->tipoProfesor = $tipoProfesor;
    }   

    function setAlumno($alumno){
        array_push($this->alumno,$alumno);
    }  
    //GETTERS
    function getTipoProfesor(){
        return $this->tipoProfesor;
    }
    
    function getFacultad(){
        return $this->facultad;
    }   
    
    function getProfesor($email,$pass){  
        $this->setCorreoElectronico($email);
        $this->setPassword($pass);
        $this->dbprofesor->GetInstance($this);
	}
    
    function getDBProfesor(){
        return $this->dbprofesor;
    }

}

?>