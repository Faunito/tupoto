<?php 
	require_once('View.php');

	class InicioView extends View {

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }		    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Profesor':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_profesor.php');
	    			break;
	    		case 'Secretaria':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_secretaria.php');
	    			break;
	    		case 'Director':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_director.php');
	    			break;
	    	}
	    }

	    public function action($action){}
		public function result($result, $post){}

	}
?>