<?php 

	class InicioView {    

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

	    //

	}
?>