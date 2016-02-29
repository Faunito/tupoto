<?php 
	require_once('View.php');

	class EvaluacionesView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Director':					
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_director.php');
	    			break;
	    		case 'Profesor':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones__profesor.php');
	    			break;
	    		case 'Secretaria':					
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_secretaria.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action) {
	    		case 'nuevo':
	    			break;
	    		case 'modificar':	    			
	    			break;
	    		case 'eliminar':
	    			break;	    		
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nuevo':

	    			break;
	    		case 'modificar':
	    			break;
	    		case 'consultar':
	    		
	    			break;
	    		case 'eliminar':
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>