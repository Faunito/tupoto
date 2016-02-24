<?php //namespace Controllers;

require_once ('../Models/Profesor.php');
require_once ('../Models/Secretaria.php');
require_once ('../Models/DirectorDeCarrera.php');

class ControladorUsuarios{
	var $user;
    
    function __construct(){
     
    }
    
	public function login($email,$pass,$tipoFuncionario)
	{
		//llamada al profe solamente por ahora 
        
        switch($tipoFuncionario){
            case "profesor":
            //se instancia la clase profesor
			$user = new Profesor();
			$user -> getProfesor($email,$pass);
            //var_dump($user)
            //crear session
            $this -> crearSesion($user);  
            break;
            
            case 'secretaria':
            $user = new Secretaria();
            $user -> getSecretaria($email,$pass);
            var_dump($user);
            //crear session
            break;
            case 'director':
            $user = new DirectorDeCarrera();
            $user -> getDirector($email,$pass);
            var_dump($user);                    
            //si en user existe algo crear seion   
            break;
            default:
            print('Funcionario no especificado');         
        }
              
	}
    
   public function getProfesor()
	{
       return $this -> user;
	}
    
    private function crearSesion($ob){
        if(isset($ob)){
            session_start();
            $str = serialize($ob);
            $_SESSION['usuario']=$str;    
        }
        else echo 'no funciono';        
    }
}