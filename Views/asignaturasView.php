<?php 
	require_once('View.php');

	class AsignaturasView extends View {

		private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Profesor':	    	
	    			$asignaturas = $this->controller->listarAsignaturasProfesor($this->controller->getProfesor());
	    			$this->controller->getTemplate()->setData('asignaturas', $asignaturas);
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'asignaturas/asignaturas_profesor.php');
	    			break;
	    		case 'Director':
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action) {
	    		case 'nueva-asignatura':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'asignaturas/nueva_asignatura.php');
	    			break;
	    		case 'modificar-asignatura':
	    		
	    			break;
	    		case 'ver-asignatura':
	    			$asignaturas = $this->controller->listarAsignaturas();
	    			$this->controller->getTemplate()->setData('asignaturas', $asignaturas);
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'asignaturas/listar_asignaturas.php');
	    			break;

	    		case 'nuevo-programa':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'asignaturas/nuevo_programa.php');
	    			break;
	    		case 'modificar-programa':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'asignaturas/modificar_programa.php');
	    			break;
	    		case 'ver-programa':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'asignaturas/listar_programas.php');
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
	    			$this->controller->crearAsignatura(	$post['codigo'], 
								    				$post['nombre'], 
								    				$post['nivel']);
	    			//TOAST
	    			$this->controller->getTemplate()->redirect('asignaturas.php?action=ver-asignatura');
	    			break;
	    		case 'modificar':
		    		$this->controller->modificarAsignatura(	$result['param'], 
										    				$post['codigo'], 
										    				$post['nombre'], 
										    				$post['nive']);
		    		//TOAAAST
		    		$this->controller->getTemplate()->redirect('asignaturas.php?action=ver-asignatura');
	    			break;
	    		case 'consultar':
	    			$asignatura = $this->controller->consultarAsignatura($result['param']);
	    			$this->controller->getTemplate()->setData('asignatura', $asignatura);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'asignaturas/modificar_asignatura.php');
	    			break;
	    		case 'eliminar':
					$this->controller->eliminarAsignatura($result['param']);
					$this->controller->getTemplate()->redirect('asignaturas.php?action=ver-asignatura');	
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>