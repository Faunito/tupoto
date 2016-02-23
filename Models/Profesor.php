<?php namespace Models;

require_once ('Funcionario.php');
class Profesor extends Funcionario
{

	var $area;
	var $titulo;
	var $m_EvaluacionPracticaProfesor;
	var $m_Evaluacion;
	var $m_ProgramaCurricular;
	var $bdprofesor;
    private $con;

	public function __construct()
	{
		$con = DBSingleton::getInstance();
	}

	function getProfesor($email)
	{       
        $res = $this -> con -> prepare('SELECT * FROM profesor where EMAIL =: email and PASSWORD =: pass');
        $res -> bindParam(':email',$email,PDO::PARAM_STR);
        $res -> bindParam(':pass',$pass,PDO::PARAM_STR);
        $res -> execute();
        $res1 = $res -> fetchAll(PDO::FETCH_ASSOC);
        return $res1;
            
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