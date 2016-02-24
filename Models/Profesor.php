<?php //namespace Models;
require_once ('DBSingleton.php');
require_once ('Funcionario.php');
class Profesor extends Funcionario
{

	private $area;
	private $titulo;
	private $m_EvaluacionPracticaProfesor;
	private $m_Evaluacion;
	private $m_ProgramaCurricular;
	private $bdprofesor;
    private $con;

	public function __construct()
	{
		$aux = DBSingleton::getInstance();
        $this->con = $aux->getDB();
	}

	function existeProfesor($email,$pass){
		$res = $this->con->prepare('SELECT count(*) FROM profesor where EMAIL =:email and PASSWORD =:pass');
        $res->bindParam(':email',$email,PDO::PARAM_STR);
        $res->bindParam(':pass',$pass,PDO::PARAM_STR);
        $res->execute();
        $res1 = $res->fetchColumn();
        return $res1 == 1 ? true : false;
	}

	function getProfesor($email,$pass)
	{       
        $res = $this->con->prepare('SELECT * FROM profesor where EMAIL =:email and PASSWORD =:pass');
        $res->bindParam(':email',$email,PDO::PARAM_STR);
        $res->bindParam(':pass',$pass,PDO::PARAM_STR);
        $res->execute();
        $res1 = $res->fetchAll(PDO::FETCH_ASSOC);
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