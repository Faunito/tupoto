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
    //============ Practicas ================
    function ingresarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$intento,$nivelPractica,$horas){
        $fechaInicio = date ('Y-m-d',strtotime($fechaInicio));
        $fechaTermino = date ('Y-m-d',strtotime($fechaTermino));
        $this->secretaria->registrarPractica($alumno,$direccion,$estado,$fechaInicio,$fechaTermino,$intento,$nivelPractica,$horas);
    }
    
    function consultarPracticasAlumno($rut){
            $practicas = Practica::getPracticasAlumno($rut);
            $i=0;
            $array=array();
            foreach ($practicas as $practica) {
                $nueva = new Practica();
                $nueva->setIdPractica($practica['ID_PRACTICA']);
                $nueva->setAlumno($practica['RUT']);
                $nueva->setDireccion($practica['DIRECCION_PRACTICA']);
                $nueva->setEstado($practica['ESTADO']);
                $nueva->setFechaInicio($practica['FECHA_INICIO']);
                $nueva->setFechaTermino($practica['FECHA_TERMINO']);
                $nueva->setIntento($practica['INTENTO']);
                $nueva->setNivelPractica($practica['NIVEL_PRACTICA']);
                $nueva->setHoras($practica['HORAS']);
                $array[$i]=$nueva;
                $i++;
            }
            $this->arrayPracticas=$array;
            $this->serializar($this);
            return $this->arrayPracticas;
        }
        
    function consultarPractica($id){
        $practica = $this->secretaria->consultarPractica($id);        
        return $practica;
    }
    
    function modificarPractica($id,$direccion,$fechaInicio,$fechaTermino,$nivelPractica,$horas){
        $this->secretaria->modificarPractica($id,$direccion,$fechaInicio,$fechaTermino,$nivelPractica,$horas);
    }
    
    function eliminarPractica($id){
             $this->secretaria->eliminarPractica($id);
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
            $alumno = $this->secretaria->consultarAlumno($rut);            
            return $alumno;
        }
        
        function registrarAlumno($rut,$carrera,$nombre,$apaterno,$amaterno){
            $this->secretaria->registrarAlumno($rut,$carrera,$nombre,$apaterno,$amaterno);
        }
        
        function modificarAlumno($rut,$nombre,$apaterno,$amaterno){
            $this->secretaria->modificarAlumno($rut,$nombre,$apaterno,$amaterno);
        }
        
        function eliminarAlumno($rut){
             $this->secretaria->eliminarAlumno($rut);
        }

    //============ Serializacion ==========
        function serializar($controller){
            $str = serialize($controller);
            $_SESSION['usuario'] = $str; 
        }
    
}
?>