<?php //namespace Controllers;

require_once ('../Models/Profesor.php');

class ControladorUsuarios{
	var $user;
    
    function __construct(){
     
    }

	public function getProfesor()
	{
       return $this -> user;
	}

	public function login($email,$pass,$tipoFuncionario)
	{
		//llamada al profe solamente por haora        
		if($tipoFuncionario == 'profesor'){
			//se instancia la clase profesor
			$user = new Profesor();
			$res = $user -> getProfesor($email,$pass);
            print($res -> NOMBRE);
            print($res -> APATERNO);
            print($res -> AMATERNO);
            print($res -> FACULTAD);            
                                                  
		}/*
		else{
            if($tipoFuncionario == 'secretaria'){
                $user = new Secretaria();
         
            }          
		}*/
	}
}