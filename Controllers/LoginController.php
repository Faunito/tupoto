<?php
	require_once ('/Config/Constantes.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'DirectorController.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
	//require_once(ROOT_DIR . CONTROLLERS_DIR . 'SecretariaController.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Secretaria.php');

	class LoginController{

		private $usuario;
		private $controller;

		function __construct(){}

		public function login($request){
			if (isset($request['email']) && 
				isset($request['password']) && 
				isset($request['tipoFuncionario'])) {

				switch ($request['tipoFuncionario']) {
					case 'profesor':	
						$this->usuario = new Profesor();
						$this->controller = new ProfesorController($this->usuario);
						if($this->usuario->existeProfe($request['email'], $request['password'],$request['tipoFuncionario'])){	
							$this->usuario->getProfesor($request['email'], $request['password']);
				            $this->iniciarSesion();
				            return true;  
            			}else{
            				return false;
            			}
						break;

					case 'secretaria':
						$this->usuario = new Secretaria();
						//$this->controller = new SecretariaController($this->usuario);
						if($this->usuario->existeSecre($request['email'], $request['password'])){	
							$this->usuario->getSecretaria($request['email'], $request['password']);
				            $this->iniciarSesion();
				            return true;  
            			}else{
            				return false;
            			}
						break;

					case 'director':
						$this->usuario = new Director();
						$this->controller = new DirectorController($this->usuario);
						if($this->usuario->existeDirector($request['email'], $request['password'],$request['tipoFuncionario'])){	
							$this->usuario->getDirector($request['email'], $request['password']);
				            $this->iniciarSesion();
				            return true;  
            			}else{
            				return false;
            			}
						break;

					default:
						return false;
						break;
				}
            	
        	}else{
        		return false;
        	}
		}

		public function logout(){
			session_unset();
			session_destroy();
		}

		private function iniciarSesion(){
	            session_start();
	            $str = serialize($this->controller);
	            $_SESSION['usuario'] = $str;      
	    }
	}
?>