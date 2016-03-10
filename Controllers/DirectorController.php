<?php
//require_once('/Config/Constantes.php');
//require_once (ROOT_DIR . MODELS_DIR . 'Director.php')
require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
require_once(ROOT_DIR . VIEWS_DIR . 'Template.php');
require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
require_once(ROOT_DIR . MODELS_DIR . 'Asignatura.php');
require_once(ROOT_DIR . MODELS_DIR . 'Malla.php');
require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');
require_once(ROOT_DIR . MODELS_DIR . 'Persona.php');

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

        function asignaturasGrafico($malla, $competencia){
            $asignaturas = Asignatura::getAsignaturasGrafico($malla, $competencia);
            $i=0;
            $array = array();
            $array['asignaturas'] = array();
            $array['especificaciones'] = array();
            foreach ($asignaturas as $asignatura) {
                $nueva = new Asignatura();                
                $nueva->setId($asignatura['ID_ASIGNATURA']);
                $nueva->setCodigo($asignatura['CODIGO_ASIGNATURA']);
                $nueva->setMalla($asignatura['ID_MALLA']);
                $nueva->setNombre($asignatura['NOMBRE_ASIGNATURA']);
                $nueva->setNivel($asignatura['NIVEL_ASIGNATURA']);
                $nueva->setDirector($this->dir);
                $array['asignaturas'][$i] = $nueva;

                $nuevaE = new Especificacion();
                $nuevaE->setIdAsignatura($asignatura['ID_ASIGNATURA']);
                $nuevaE->setIdCompetencia($competencia->getIdComp());
                $nuevaE->setNivelCompetencia($asignatura['NIVELES_COMPETENCIA']);
                $array['especificaciones'][$i] = $nuevaE;

                $i++;
            }
            return $array;
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
        
        function asignarAsignaturaCompetencia($idCompetencia,$idAsignatura,$Nivel){
            $this->dir->asignarAsignaturaCompetencia($idCompetencia,$idAsignatura,$Nivel);
        }
        //============ Mallas Puede_Impartir Competencias ================
        function consultarCompetenciasMalla($idMalla){
            $competencias=$this->dir->consultarCompetenciasMalla($idMalla);
            return $competencias;
        }

        function consultarCompetenciasNoMalla($idMalla){
            $competencias=$this->dir->consultarCompetenciasNoMalla($idMalla);
            return $competencias;
        }

        function asignarCompetenciaMalla($idMalla,$lista){
            foreach ($lista as $competencia) {
                $this->dir->asignarCompetenciaMalla($idMalla,$competencia->getIdComp());           
            }
        }

        function desasignarCompetenciaMalla($idMalla,$lista){
            foreach ($lista as $competencia) {
                $this->dir->desasignarCompetenciaMalla($idMalla,$competencia->getIdComp());           
            }
        }           
        //============ Mallas ================ 

        function consultarMalla($id){
            $malla = $this->dir->consultarMalla($id);
            return $malla;
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
            if(isset($array)){
                $this->arrayMallas = $array;
                $this->serializar($this);
                return $this->arrayMallas;    
            }
            //return $this->arrayMallas;
        }
        
        function consultarMallasCompetencia($idCompetencia){
            $mallas=$this->dir->consultarMallasCompetencia($idCompetencia);
            return $mallas;
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

        function listarAsignaturasCompetencia($id){
            $especificaciones = Especificacion::getAsignaturasCompetencia($id);
            $i=0;
            $array=array();
            foreach ($especificaciones as $especificacion) {
                $nueva = new Especificacion();                
                $nueva->setIdAsignatura($especificacion['ID_ASIGNATURA']);
                $nueva->setIdCompetencia($especificacion['ID_COMPETENCIA']);
                $nueva->setNivelCompetencia($especificacion['NIVELES_COMPETENCIA']);
                $array[$i] = $nueva;
                $i++;
            }
            return $array;
        }
        
        function consultarAsignatura($codigo){
            $asignatura = $this->dir->consultarAsignatura($codigo);            
            return $asignatura;            
        }


        function asignaturasNoRepetidas($mallas){
            $asignaturas = Asignatura::asignaturasNoRepetidas($mallas);
            $i=0;
            $array = array();
            $array['asignaturas'] = array();
            $array['especificaciones'] = array();
            foreach ($asignaturas as $asignatura) {
                $nueva = new Asignatura();                
                $nueva->setId($asignatura['ID_ASIGNATURA']);
                $nueva->setCodigo($asignatura['CODIGO_ASIGNATURA']);
                $nueva->setMalla($asignatura['ID_MALLA']);
                $nueva->setNombre($asignatura['NOMBRE_ASIGNATURA']);
                $nueva->setNivel($asignatura['NIVEL_ASIGNATURA']);
                $nueva->setDirector($this->dir);
                $array['asignaturas'][$i] = $nueva;

                $nuevaE = new Especificacion();
                $nuevaE->setIdAsignatura($asignatura['ID_ASIGNATURA']);
                $nuevaE->setIdCompetencia($asignatura['ID_COMPETENCIA']);
                $nuevaE->setNivelCompetencia($asignatura['NIVELES_COMPETENCIA']);
                $array['especificaciones'][$i] = $nuevaE;

                $i++;
            }
            return $array;
        }        

        function borraAsignaturasCompetencia($mallas, $competencia){
            Asignatura::borraAsignaturasCompetencia($mallas, $competencia);
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

        function consultarAlumno($rut){
            $alumno = $this->dir->consultarAlumno($rut);
            return $alumno;
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

        //============ Practicas ================ 
        function consultarPractica($id){
            $practica = $this->dir->consultarPractica($id);
            return $practica;
        }

        //============ Evaluaciones ================ 
        function crearEvaluacionAcademica($idpractica, $profesor, $resultado){
            return $this->dir->crearEvaluacionAcademica($idpractica, $profesor, $resultado);
        }

        function crearEvaluacionCompetencia($idevaluacion, $idcompetencia, $observacion, $calificacion){
            $this->dir->crearEvaluacionCompetencia($idevaluacion, $idcompetencia, $observacion, $calificacion);
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