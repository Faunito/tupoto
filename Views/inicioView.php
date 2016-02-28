<?php 
	require_once('View.php');

	class InicioView extends View {    

	    public function __construct() {
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Profesor':
					include(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_profesor.php');
	    			break;
	    		case 'Secretaria':
					include(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_secretaria.php');
	    			break;
	    		case 'Director':
					include(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_director.php');
	    			break;
	    	}
	    }

	    public function action($action, $controller){}
		public function result($controller, $result, $post){}

	}
?>