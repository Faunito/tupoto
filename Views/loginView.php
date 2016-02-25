<?php 
	require_once('/Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');

	class LoginView {    

	    public function __construct() {
	    }	    

	    public function output() {
	        include(ROOT_DIR . TEMPLATES_DIR . 'login_template.php');
	    }

	}
?>