<?php
require_once ('DBConexion/DBAlumno.php');
require_once ('Persona.php');
//require_once ('Practica.php');
//require_once ('Actividad.php');

class Alumno extends Persona
{
    private $dbalumno;
	private $carrera;   //carrera
	private $nivelAcademico;//nivel academico
	private $malla;
	private $profesor;
	//private $m_Practica;
	//private $m_ActividaddCompensacion;

	function __construct()
	{
        $this->dbalumno = new DBAlumno();
	}


    //GETTERS
    function getDBAlumno()
    {
        return $this->dbalumno;
    }
    
	function getCarrera()
	{
		return $this->carrera;
	}

	function getNivelAcademico()
	{
		return $this->nivAcademico;
	}

	function getIdMalla(){
		return $this->malla;
	}

	//===

	public static function getAlumnos()
	{
        return DBAlumno::getAll();
	}

	function consultarAlumno($rut)
	{
        return DBAlumno::consultarAlumno($rut);
	}
    
    public static function getAlumnosAsoc($rutProfesor)
	{
        return DBAlumno::getAllAsoc($rutProfesor);
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

	function setIdMalla($malla){
		$this->malla = $malla;
	}

	function setProfesor($profesor){
        array_push($this->profesor,$profesor);
    }  
}

?>