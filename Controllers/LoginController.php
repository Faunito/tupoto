<?php
	require_once('/Config/Constantes.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Secretaria.php');

	class LoginController{

		private $usuario;

		function __construct(){}

		public function login($request){
			if (isset($request['email']) && 
				isset($request['password']) && 
				isset($request['tipoFuncionario'])) {

				switch ($request['tipoFuncionario']) {
					case 'profesor':	
						$this->usuario = new Profesor();
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
	            $str = serialize($this->usuario);
	            $_SESSION['usuario'] = $str;      
	    }
	}
?>