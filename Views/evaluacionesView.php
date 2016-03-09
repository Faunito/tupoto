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
	    	switch ($action['action']) {
	    		case 'nueva-profesor':
		    		$alumno = $this->controller->consultarAlumno($action['rut']);
		    		$practica = $this->controller->consultarPractica($action['practica']);
	    			$competencias = $this->controller->consultarCompetenciasMalla($alumno->getIdMalla());
	    			$this->controller->getTemplate()->setData('alumno',$alumno);
	    			$this->controller->getTemplate()->setData('practica',$practica);
	    			$this->controller->getTemplate()->setData('competencias',$competencias);

		    		$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/nueva_evaluacion_profesor.php');
	    			break;

	    		case 'nueva-empleador':
	    		$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/nueva_evaluacion_empleador.php');
	    			break;

	    		case 'modificar':	    			
	    			break;

	    		case 'eliminar':
	    			break;	  

	    		case 'ver':
	    			$alumno = $this->controller->consultarAlumno($action['rut']);
	    			$practica = $this->controller->consultarPractica($action['practica']);
	    			$this->controller->getTemplate()->setData('alumno',$alumno);
	    			$this->controller->getTemplate()->setData('practica',$practica);
	    		    $this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_director.php');
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