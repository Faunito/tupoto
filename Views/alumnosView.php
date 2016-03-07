<?php 
	require_once('View.php');


	class AlumnosView extends View {

		private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }

	    public function output($usuario) {
			$alumnos = $this->controller->listarAlumnos();
			$this->controller->getTemplate()->setData('alumnos', $alumnos);
	    	switch ($usuario) {
	    		case 'Profesor':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/alumnos_profesor.php');
	    			break;
	    		case 'Director':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/alumnos_director.php');
	    			break;
	    		case 'Secretaria':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/alumnos_secretaria.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action['action']) {
	    		case 'nuevo':
	    			
	    			break;
	    		case 'modificar':
	    		
	    			break;
	    		case 'ver':
					$alumno = $this->controller->consultarAlumno($action['param']);
	    			$this->controller->getTemplate()->setData('alumno', $alumno);
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/ver_alumno.php');
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