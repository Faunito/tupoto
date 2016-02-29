<?php
require_once ('DBConexion/DBAlumno.php');
require_once ('Persona.php');
//require_once ('Practica.php');
//require_once ('ActividaddCompensacion.php');

class Alumno extends Persona
{
    private $dbalumno;
	private $carrera;   //carrera
	private $nivelAcademico;//nivel academico
	//private $m_Practica;
	//private $m_ActividaddCompensacion;

	function __construct()
	{
        $this->dbalumno = new DBAlumno();
	}

    //GETTERS
	function getCarrera()
	{
		return $this->carrera;
	}

	function getNivelAcademico()
	{
		return $this->nivAcademico;
	}

	public static function getAlumnos()
	{
        return DBAlumno::getAll();
	}

    //SETTERS
	function setCarrera($carrera)
	{
		$this->carrera = $carrera;
	}

	function setNivelAcademico($nivel)
	{
		$this->nivelAcademico = $nivel;
	}

}

?>