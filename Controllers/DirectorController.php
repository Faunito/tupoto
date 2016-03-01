<?php
//require_once('/Config/Constantes.php');
//require_once (ROOT_DIR . MODELS_DIR . 'Director.php')
require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
require_once(ROOT_DIR . VIEWS_DIR . 'Template.php');
require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
require_once(ROOT_DIR . MODELS_DIR . 'Asignatura.php');
require_once(ROOT_DIR . MODELS_DIR . 'Malla.php');
require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');

class DirectorController extends ProfesorController{
    private $dir;
    private $arrayCompetencias;
    private $arrayAsignaturas;
    private $arrayMallas;
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
            $array=array();
            foreach ($res as $key) {
                $aux = new Competencia();
                $aux->setIdComp($key['ID_COMPETENCIA']);
                $aux->setCate($key['CATEGORIA']);
                $aux->setDirector($this->dir);
                $aux->setDesComp($key['DESCRIPCION_DE_COMPETENCIA']);
                $aux->setNomComp($key['NOMBRE_COMPETENCIA']);
                $array[$i] = $aux;
                $i++;
            }
            $this->arrayCompetencias = $array;
            $this->serializar($this);
            return $this->arrayCompetencias;
        }
        
        function consultarCompetencia($id){
            $competencia = $this->dir->consultarCompetencia($id);
            return $competencia;
        }
        
        function crearCompetencia($cate,$nomb,$desc){
            return $this->dir->crearCompetencia($cate,$nomb,$desc);
        }
        
        function modificarCompetencia($id,$cate,$nomb,$desc){            
            $this->dir->modificarCompetencia($id,$cate,$nomb,$desc); 
        }
       
        function eliminarCompetencia($id){            
            $this->dir->eliminarCompetencia($id); 
        }   

        //============ Evidencias ============
        function getEvidenciasCompetencia($idCompetencia){
            $evidencias = Evidencia::getEvidenciasCompetencia($idCompetencia);
            $i=0;
            $array=array();
            foreach ($evidencias as $evidencia) {
                $aux = new Evidencia();
                $aux->setIdEvidencia($evidencia['ID_EVIDENCIA']);
                $aux->setDescripcion($evidencia['DESCRIPCION_EVIDENCIA']);
                $aux->setNivel($evidencia['NIVEL_EVIDENCIA']);
                $array[$i] = $aux;
                $i++;
            }
            return $array;
        }

        function consultarEvidencia($id){
            $evidencia = $this->dir->consultarEvidencia($id);
            return $evidencia;
        }

        function crearEvidencia($descripcion, $nivel, $idCompetencia){
            $this->dir->crearEvidencia($descripcion, $nivel, $idCompetencia);
        }

        function modificarEvidencia($idCompetencia, $descripcion, $nivel){            
            $this->dir->modificarEvidencia($idCompetencia, $descripcion, $nivel); 
        }
       
        function eliminarEvidencia($id){            
            $this->dir->eliminarEvidencia($id); 
        }
        
        //============ Especificacion de evidencias ================
        function crearEspecificcion($idAsignatura,$idCompetencia,$nivelCompetencia){
           $this->dir->crearEspecificacion($idEspecificacion,$idCompetencia,$nivelCompetencia,$descripcion); 
        }
        
        function modificarEspecificacion($idAsignatura,$idCompetencia,$nivelCompetencia){            
            $this->dir->modificarEspecificacion($idAsignatura,$idCompetencia,$nivelCompetencia); 
        }
       
        function eliminarEspecificacion($idAsignatura,$idCompetencia){            
            $this->dir->eliminarEvidencia($idAsignatura,$idCompetencia); 
        }
        
        function listarEspecificacion($idAsignatura){
            $this->dir->listarEspecificacion($idAsignatura);
        }

        //============ Mallas ================ 
        function ConsultarMalla($id){
            $malla = Malla::getMalla($id);
            $nueva = new Malla();                
            $nueva->setIdMalla($malla['ID_MALLA']);
            $nueva->setPlan($malla['PLAN']);
            $nueva->setCodCarrera($malla['CODIGO_CARRERA']);
            $nueva->setNiveles($malla['NIVELES']);
            return $nueva;
        }

        function listarMallas(){
            $mallas = Malla::getMallas();
            $i=0;
            foreach ($mallas as $malla) {
                $nueva = new Malla();                
                $nueva->setIdMalla($malla['ID_MALLA']);
                $nueva->setPlan($malla['PLAN']);
                $nueva->setCodCarrera($malla['CODIGO_CARRERA']);
                $nueva->setNiveles($malla['NIVELES']);
                $array[$i] = $nueva;
                $i++;
            }
            $this->arrayMallas = $array;
            $this->serializar($this);
            return $this->arrayMallas;
        }
        
        function eliminarMalla($id){            
            $this->dir->eliminarMalla($id); 
        }   

        function crearMalla($codigo, $plan, $lvl, $asignaturas){
            $this->dir->crearMalla($codigo, $plan, $lvl, $asignaturas);
        }
         function modificarMalla($id, $codigo, $plan, $lvl, $listaOn, $listaOff){
            $this->dir->modificarMalla($id, $codigo, $plan, $lvl, $listaOn, $listaOff);
        }

        //============ Asignaturas ================ 
        function listarAsignaturas(){
            $asignaturas = Asignatura::getAsignaturas();
            $i=0;
            $array=array();
            foreach ($asignaturas as $asignatura) {
                $nueva = new Asignatura();                
                $nueva->setId($asignatura['ID_ASIGNATURA']);
                $nueva->setCodigo($asignatura['CODIGO_ASIGNATURA']);
                $nueva->setMalla($asignatura['ID_MALLA']);
                $nueva->setNombre($asignatura['NOMBRE_ASIGNATURA']);
                $nueva->setNivel($asignatura['NIVEL_ASIGNATURA']);
                $nueva->setDirector($this->dir);
                $array[$i] = $nueva;
                $i++;
            }
            $this->arrayAsignaturas = $array;
            $this->serializar($this);
            return $this->arrayAsignaturas;
        }

        function listarAsignaturasLibres(){
            $asignaturas = Asignatura::getAsignaturas();
            $i=0;
            $libres=array();
            foreach ($asignaturas as $asignatura) {
                if(!isset($asignatura['ID_MALLA'])){
                    $nueva = new Asignatura();                
                    $nueva->setId($asignatura['ID_ASIGNATURA']);
                    $nueva->setCodigo($asignatura['CODIGO_ASIGNATURA']);
                    $nueva->setMalla($asignatura['ID_MALLA']);
                    $nueva->setNombre($asignatura['NOMBRE_ASIGNATURA']);
                    $nueva->setNivel($asignatura['NIVEL_ASIGNATURA']);
                    $nueva->setDirector($this->dir);
                    $libres[$i] = $nueva;
                    $i++;                    
                }
            }
            return $libres;
        }

         function listarAsignaturasMalla($id){
            $asignaturas = Asignatura::getAsignaturasMalla($id);
            $i=0;
            $array=array();
            foreach ($asignaturas as $asignatura) {
                $nueva = new Asignatura();                
                $nueva->setId($asignatura['ID_ASIGNATURA']);
                $nueva->setCodigo($asignatura['CODIGO_ASIGNATURA']);
                $nueva->setMalla($asignatura['ID_MALLA']);
                $nueva->setNombre($asignatura['NOMBRE_ASIGNATURA']);
                $nueva->setNivel($asignatura['NIVEL_ASIGNATURA']);
                $nueva->setDirector($this->dir);
                $array[$i] = $nueva;
                $i++;
            }
            return $array;
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