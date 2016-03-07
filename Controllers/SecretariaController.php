<?php

require_once(ROOT_DIR . VIEWS_DIR . 'Template.php');

class SecretariaController{
    
    private $secretaria;
    private $template;
    private $arrayAlumnos;
    
    function __construct($secretaria, $template){
        $this->secretaria = $secretaria;
        $this->template = $template;
    }

    function getSecretaria(){
        return $this->secretaria;
    }

    function getTemplate(){
        return $this->template;
    }
    //========FUNCTIONS===========
    function ingresarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$intento,$nivelPractica,$horas){
        $this->secretaria->registrarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$fechaFin,$intento,$nivelPractica,$horas);
    }

    //============ Alumnos ================ 
        function listarAlumnos(){
            $alumnos = Alumno::getAlumnos();
            $i=0;
            $array=array();
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
            $this->arrayAlumnos=$array;
            $this->serializar($this);
            return $this->arrayAlumnos;
        }

        function consultarAlumno($rut){
            $alumno = Alumno::consultarAlumno($rut);
            $nuevo = new Alumno();
            $nuevo->setRut($alumno['RUT']);
            $nuevo->setCarrera($alumno['CARRERA']);
            $nuevo->setNivelAcademico($alumno['NIVEL_ACADEMICO']);
            $nuevo->setNombre($alumno['NOMBRE']);
            $nuevo->setApaterno($alumno['APATERNO']);
            $nuevo->setAmaterno($alumno['AMATERNO']);
            return $nuevo;        
        }

    //============ Serializacion ==========
        function serializar($controller){
            $str = serialize($controller);
            $_SESSION['usuario'] = $str; 
        }
    
}
?>