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

<<<<<<< HEAD
    //GETTERS    
=======
    //GETTERS
    function getDBAlumno()
    {
        return $this->dbalumno;
    }
    
>>>>>>> ea4ceda88ea1a6b7020ca9e4a488c701d06b7e65
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