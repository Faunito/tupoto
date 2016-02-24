<?php
	require_once('/Config/Constantes.php');
	require_once (ROOT_DIR . MODELS_DIR . 'Profesor.php');

	class LoginController{
		private $profesor;

		function __construct(Profesor $profesor){
			$this->profesor = $profesor;
		}

		public function login($request){
			if (isset($request['email']) && isset($request['password'])) {
            	return $this->profesor->existeProfesor($request['email'], $request['password']);
        	}else{
        		return false;
        	}
		}

	}


?>