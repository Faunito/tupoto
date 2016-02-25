<?php
require_once ('../Models/Profesor.php');
require_once ('../Models/Secretaria.php');
require_once ('../Models/DirectorDeCarrera.php');
class ControladorUsuarios{
    
    private $user;
    function __construct(){
     
    }
    
    public function login($email,$pass,$tipoFuncionario){
        //llamada al profe solamente por ahora 
        
        switch($tipoFuncionario){
            case "profesor":
            //se instancia la clase profesor
            $profesor = new Profesor();
            $profesor -> getProfesor($email,$pass);
            //var_dump($profesor)
            //crear session
            $this -> crearSesion($profesor);
              
            break;
            
            case 'secretaria':
            $profesor = new Secretaria();
            $profesor -> getSecretaria($email,$pass);
            var_dump($profesor);
            //crear session
            break;
            case 'director':
            $profesor = new DirectorDeCarrera();
            $profesor -> getDirector($email,$pass);
            var_dump($profesor);                    
            //si en profesor existe algo crear seion   
            break;
            default:
            print('Funcionario no especificado');         
        }
              
    }
    
   public function getProfesor()
    {
       return $this->user;
    }
    
    private function crearSesion($profe){
        if(isset($profe)){
            session_start();
            $str = serialize($profe);
            $_SESSION['usuario']=$str;    
        }
        else echo 'no funciono'; //jajajjaj :D       
    }
}