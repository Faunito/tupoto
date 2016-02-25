<?php
    require_once(/Config/Constantes.php);
    require_once (ROOT_DIR . MODELS_DIR . 'Director.php')
    
    class DirectorController extends ProfesorController{
        private $dir;

        function __construct(){

        }
        
        function crearCompetencia($id,$cate,$nomb,$desc){            
            $this->dir->crearCompetencia($id,$cate,$nomb,$desc); 
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