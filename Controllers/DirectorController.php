<?php
    //require_once('/Config/Constantes.php');
    //require_once (ROOT_DIR . MODELS_DIR . 'Director.php')
    require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
    
    class DirectorController extends ProfesorController{
        private $dir;

        function __construct($dir){
            $this->dir = $dir;  
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