<?php
require_once ('DBConexion/DBAlumno.php');
require_once ('Persona.php');
//require_once ('Practica.php');
//require_once ('ActividaddCompensacion.php');

class Alumno extends Persona
{
    private $dbalumno;
	private $car;   //carrera
	private $nivAca;//nivel academico
	//private $m_Practica;
	//private $m_ActividaddCompensacion;

	function __construct()
	{
        $this->dbalumno = new DBAlumno();
	}

    //GETTERS
	function getCar()
	{
		return $this->car;
	}

	function getNivAca()
	{
		return $this->nivAca;
	}

	public static function getAlumnos()
	{
        return DBAlumno::getAll();
	}
/*
	function getAlumno()
	{
        return DBAlumno::getAlumno();
	}*/
    //SETTERS
	function setCarrera($newVal)
	{
		$this->carrera = $newVal;
	}

	function setNivAca($newVal)
	{
		$this->nivAca = $newVal;
	}

}

?>