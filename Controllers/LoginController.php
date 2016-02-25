<?php
	require_once('/Config/Constantes.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Profesor.php');

	class LoginController{
		private $usuario;

		function __construct(){
		}

		public function login($request){
			if (isset($request['email']) && isset($request['password'])) {
            	//return $this->profesor->existeProfe($request['email'], $request['password']);
				switch ($request['tipoFuncionario']) {
					case 'profesor':
						$this->usuario = new Profesor();
						if($this->usuario->existeProfe($request['email'], $request['password'])){	
							$this->usuario->getProfesor($request['email'], $request['password']);
				            $this->iniciarSesion();
				            return true;  
            			}else{
            				return false;
            			}
						break;

					case 'secretaria':
						echo '<script>window.alert("La secree");</script>';
						break;
					
					default:
						# code...
						break;
				}
            	

        	}else{
        		return false;
        	}
		}

		private function iniciarSesion(){
	            session_start();
	            $str = serialize($this->usuario);
	            $_SESSION['usuario'] = $str;      
	    }

	}


?>