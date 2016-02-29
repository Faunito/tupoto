<?php 
	require_once('View.php');

	class MallasView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Director':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/mallas_director.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action) {
	    		case 'nueva':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/nueva_malla.php');
	    			break;
	    		case 'modificar':
	    		
	    			break;
	    		case 'ver':
	    		
	    			break;
	    		case 'asignar':
	    		
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
	    		
	    			break;
	    		case 'modificar':
	    		
	    			break;
	    		case 'ver':
	    		
	    			break;
	    		case 'asignar':
	    		
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>