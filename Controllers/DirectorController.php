<?php
//require_once('/Config/Constantes.php');
//require_once (ROOT_DIR . MODELS_DIR . 'Director.php')
require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
require_once(ROOT_DIR . VIEWS_DIR . 'Template.php');
require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
require_once(ROOT_DIR . MODELS_DIR . 'Asignatura.php');
require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');

class DirectorController extends ProfesorController{
    private $dir;
    private $arrayCompetencias;
    private $arrayAsignaturas;
    private $arrayAlumnos;
    private $template;

    function __construct($dir, $template){
        $this->dir = $dir;  
        $this->template = $template;
    }

    //============ Funciones ================
    
        //============ Competencias ================
        function listarCompetencias(){
            $res = Competencia::getCompetencias();
            $i=0;
            foreach ($res as $key) {
                $aux = new Competencia();
                $aux->setIdComp($key['ID_COMPETENCIA']);
                $aux->setCate($key['CATEGORIA']);
                $aux->setDirector($this->dir);
                $aux->setDesComp($key['DESCRIPCION_DE_COMPETENCIA']);
                $aux->setNomComp($key['NOMBRE_COMPETENCIA']);
                $this->arrayCompetencias[$i] = $aux;
                $i++;
            }
            $this->serializar($this);
            return $this->arrayCompetencias;
        }
        
        function listarCompetencia($id){
            $res = Competencia::getCompetencia($id);
            $aux = new Competencia();
            $aux->setIdComp($res['ID_COMPETENCIA']);
            $aux->setCate($res['CATEGORIA']);
            $aux->setDirector($this->dir);
            $aux->setDesComp($res['DESCRIPCION_DE_COMPETENCIA']);
            $aux->setNomComp($res['NOMBRE_COMPETENCIA']);
            return $aux;            
        }
        
        function crearCompetencia($cate,$nomb,$desc){
            $this->dir->crearCompetencia($cate,$nomb,$desc);
        }
        
        function modificarCompetencia($id,$cate,$nomb,$desc){            
            $this->dir->modificarCompetencia($id,$cate,$nomb,$desc); 
        }
       
        function eliminarCompetencia($id){            
            $this->dir->eliminarCompetencia($id); 
        }   

        //============ Asignaturas ================ 
        function listarAsignaturas(){
            $asignaturas = Asignatura::getAsignaturas();
            $i=0;
            foreach ($asignaturas as $asignatura) {
                $nueva = new Asignatura();                
                $nueva->setId($asignatura['ID_ASIGNATURA']);
                $nueva->setCodigo($asignatura['CODIGO_ASIGNATURA']);
                //$nueva->setMalla($asignatura['ID_MALLA']);
                $nueva->setNombre($asignatura['NOMBRE_ASIGNATURA']);
                $nueva->setNivel($asignatura['NIVEL_ASIGNATURA']);
                $nueva->setDirector($this->dir);
                $this->arrayAsignaturas[$i] = $nueva;
                $i++;
            }
            $this->serializar($this);
            return $this->arrayAsignaturas;
        }
        
        function consultarAsignatura($codigo){
            $asignatura = Asignatura::getAsignatura($codigo);
            $nueva = new Asignatura();
            $nueva->setId($asignatura['ID_ASIGNATURA']);
            $nueva->setCodigo($asignatura['CODIGO_ASIGNATURA']);
            //$nueva->setMalla($asignatura['ID_MALLA']);
            $nueva->setNombre($asignatura['NOMBRE_ASIGNATURA']);
            $nueva->setNivel($asignatura['NIVEL_ASIGNATURA']);
            $nueva->setDirector($this->dir);
            return $nueva;            
        }
        
        function crearAsignatura($codigo, $nombre, $nivel){
            $this->dir->crearAsignatura($codigo, $nombre, $nivel);
        }
        
        function modificarAsignatura($id, $codigo, $nombre, $nivel){            
            $this->dir->modificarAsignatura($id, $codigo, $nombre, $nivel); 
        }
       
        function eliminarAsignatura($id){            
            $this->dir->eliminarAsignatura($id);
        } 

        //============ Alumnos ================ 
        function listarAlumnos(){
            $alumnos = Alumno::getAlumnos();
            $i=0;
            foreach ($alumnos as $alumno) {
                $nuevo = new Alumno();                
                $nuevo->setRut($alumno['RUT']);
                $nuevo->setCarrera($alumno['CARRERA']);
                $nuevo->setNivelAcademico($alumno['NIVEL_ACADEMICO']);
                $nuevo->setNombre($alumno['NOMBRE']);
                $nuevo->setApaterno($alumno['APATERNO']);
                $nuevo->setAmaterno($alumno['AMATERNO']);
                $this->arrayAlumnos[$i] = $nuevo;
                $i++;
            }
            $this->serializar($this);
            return $this->arrayAlumnos;
        }

    //============ Getters ================

    function getDirector(){
        return $this->dir;
    }

    function getTemplate(){
        return $this->template;
    }

    //============ Setters ================

    function setDirector(){
        $this->dir = new $newVal;
    }

    //============ Serializacion ==========

    function serializar($controller){
        $str = serialize($controller);
        $_SESSION['usuario'] = $str; 
    }
}