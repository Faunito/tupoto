<?php
    //require_once('/Config/Constantes.php');
    //require_once (ROOT_DIR . MODELS_DIR . 'Director.php')
    require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
    require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
    
    class DirectorController extends ProfesorController{
        private $dir;
        private $arrayComp;

        function __construct($dir){
            $this->dir = $dir;  
        }
        
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
                $this->arrayComp[$i] = $aux;
                $i++;
            }
            return $this->arrayComp;
        }
        
        function listarCompetencia($var){
            $res = Competencia::getCompetencia();
            $aux = new Competencia();
            $aux->setIdComp($var['ID_COMPETENCIA']);
            $aux->setCate($var['CATEGORIA']);
            $aux->setDirector($this->dir);
            $aux->setDesComp($var['DESCRIPCION_DE_COMPETENCIA']);
            $aux->setNomComp($var['NOMBRE_COMPETENCIA']);
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

        //GETTERS
        function getDirector(){
            return $this->dir;
        }

        //SETTERS
        function setDirector(){
            $this->dir = new $newVal;
        }
    }