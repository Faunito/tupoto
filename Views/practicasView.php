<?php 
	require_once('View.php');

	class PracticasView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Director':					
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practicas/practicas_director.php');
	    			break;
	    		case 'Secretaria':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practicas/practicas_secretaria.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action['action']) {
	    		case 'nueva':
                    $alumno = $this->controller->consultarAlumno($action['param']);                   
                    $this->controller->getTemplate()->setData('alumno',$alumno);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practicas/nueva_practica.php');
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