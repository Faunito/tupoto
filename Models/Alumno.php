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
	//private $m_Practica;
	//private $m_ActividaddCompensacion;

	function __construct()
	{
        $this->dbalumno = new DBAlumno();
	}

    //GETTERS
    fuction getDBAlumno()
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
    
    public function getDBAlumno(){
        return $this->dbalumno;
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