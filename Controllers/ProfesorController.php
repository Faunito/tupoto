<?php

require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
require_once(ROOT_DIR . VIEWS_DIR . 'Template.php');
require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
require_once(ROOT_DIR . MODELS_DIR . 'Asignatura.php');
require_once(ROOT_DIR . MODELS_DIR . 'Malla.php');
require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');
	
class ProfesorController{
    private $profesor;
    private $template;
    private $arrayAlumnos;

	function __construct($profesor, $template){
        $this->profesor = $profesor;
		$this->template = $template;
	}

 //============ Functions ==========
    //============ Alumnos ================
    function listarAlumnos(){
        $alumnos = Alumno::getAlumnosAsoc($this->getProfesor()->getRut());
        $i=0;
        $array = array();
        foreach ($alumnos as $alumno) {
            $nuevo = new Alumno();                
            $nuevo->setRut($alumno['RUT']);
            $nuevo->setCarrera($alumno['CARRERA']);
            $nuevo->setNivelAcademico($alumno['NIVEL_ACADEMICO']);
            $nuevo->setNombre($alumno['NOMBRE']);
            $nuevo->setApaterno($alumno['APATERNO']);
            $nuevo->setAmaterno($alumno['AMATERNO']);
            $array[$i] = $nuevo;
            $i++;
        }
        $this->arrayAlumnos = $array;        
        $this->serializar($this);
        return $this->arrayAlumnos;
    }

    function listarAsignaturasProfesor($profesor){
        $asignaturas = Asignatura::listarAsignaturasProfesor($profesor);
        $i=0;
        $array = array();
        foreach ($asignaturas as $asignatura) {
            $nuevo = new Asignatura();                
            $nuevo->setId($asignatura['ID_ASIGNATURA']);
            $nuevo->setMalla($asignatura['ID_MALLA']);
            $nuevo->setNivel($asignatura['ID_PROGRAMA']);
            $nuevo->setCodigo($asignatura['CODIGO_ASIGNATURA']);
            $nuevo->setNombre($asignatura['NOMBRE_ASIGNATURA']);
            $nuevo->setNivel($asignatura['NIVEL_ASIGNATURA']);
            $array[$i] = $nuevo;
            $i++;
        }
        $this->arrayAsignaturas = $array;        
        $this->serializar($this);
        return $this->arrayAsignaturas;
    }
    //============ Setters ==========
    
    //============ Getters ==========
    function getProfesor(){
        return $this->profesor;
    }
    
    function getTemplate(){
        return $this->template;
    }
	//============ Serializacion ==========

    function serializar($controller){
        $str = serialize($controller);
        $_SESSION['usuario'] = $str; 
    }
}
?>