<?php //namespace Models;
require_once ('DBSingleton.php');
require_once ('Funcionario.php');
require_once ('DBConexion/DBProfesor.php');
class Profesor extends Funcionario
{

	var $area;
	var $titulo;
	var $m_EvaluacionPracticaProfesor;
	var $m_Evaluacion;
	var $m_ProgramaCurricular;
	var $bdprofesor;
	var $dbprofesor;
    private $con;

	public function __construct()
	{
		$this -> dbprofesor = new DBProfesor();
	}

	function getProfesor($email,$pass)
	{       
        $this -> setcorreoElectronico($email);
        $this -> setpassword($pass);
        $this -> dbprofesor -> GetIntance($this);
	}

	function GenerarCuadroComparativo($Competencia, $PracticaEmpleador)
	{
	}

	function getarea()
	{
		return $this->area;
	}

	function gettitulo()
	{
		return $this->titulo;
	}
    
	function nuevaEvaluacionProfesor($rutAlumno)
	{
	}

	function setarea($newVal)
	{
		$this->area = $newVal;
	}

	function settitulo($newVal)
	{
		$this->titulo = $newVal;
	}

}

?>