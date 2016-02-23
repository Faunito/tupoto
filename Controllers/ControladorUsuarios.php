<?php namespace Controllers;

require_once ('../Models/Profesor.php');

class ControladorUsuarios{
	var $user;
    
    function __construct(){
     
    }

	public function getProfesor()
	{
       return $user;
	}

	public function login($email,$pass,$tipoFuncionario)
	{
		//llamada al profe solamente por haora
        echo 'entrar a login';
		if($tipoFuncionario == 'profesor'){
			//se instancia la clase profesor
            echo 'hola login';
            echo $tipoFuncionario;
			$user = new Profesor();
			$res = $user -> getProfesor($email,$pass);
            echo $res;
            echo 'chao login';
             
		}/*
		else{
            if($tipoFuncionario == 'secretaria'){
                $user = new Secretaria();
         
            }          
		}*/
	}
}