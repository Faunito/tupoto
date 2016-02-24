<?php 
	require_once('/Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');

	class LoginView {

	    private $profesor;	    

	    public function __construct(Profesor $profesor) {
	        $this->profesor = $profesor;
	    }	    

	    public function output() {
	        include(ROOT_DIR . TEMPLATES_DIR . 'login_template.php');
	    }

	}
?>