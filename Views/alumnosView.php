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
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/nuevo_alumno.php');
	    			break;
	    		case 'modificar':
                    $alumno = $this->controller->consultarAlumno($action['param']);
                    $this->controller->getTemplate()->setData('alumno',$alumno);
	    		    $this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/modificar_alumno.php');                    
	    			break;
	    		case 'ver':
					$alumno = $this->controller->consultarAlumno($action['param']);
	    			$this->controller->getTemplate()->setData('alumno', $alumno);
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/ver_alumno.php');
	    			break;
	    		case 'asignar-profesor':
	    			$alumno = $this->controller->consultarAlumno($action['param']);
	    			$profesores = $this->controller->listarProfesores();
	    			$this->controller->getTemplate()->setData('profesores', $profesores);
	    			$this->controller->getTemplate()->setData('alumno', $alumno);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/asignar_profesor.php');
	    			break;
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nuevo':
                    $this->controller->registrarAlumno(	$post['rut'], 
								    				    $post['carrera'], 
								    				    $post['nombre'],
                                                        $post['apaterno'],
                                                        $post['amaterno']);
	    			//TOAST
	    			$this->controller->getTemplate()->redirect('alumnos.php');

	    			break;
	    		case 'modificar':
                    $this->controller->modificarAlumno(	$result['param'], 
								    				    $post['nombre'],
                                                        $post['apaterno'],
                                                        $post['amaterno']); 
                    $this->controller->getTemplate()->redirect('alumnos.php');
	    			break;
	    		case 'consultar':
                    $alumno = $this->controller->consultarAlumno($result['param']);
	    			$this->controller->getTemplate()->setData('alumno', $alumno);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/<modific></modific>ar_alumno.php');
	    			break;
	    		case 'eliminar':
	    			$this->controller->eliminarAlumno($result['param']);
					$this->controller->getTemplate()->redirect('alumnos.php');
	    			break;
	    		case 'asignar-profesor':
	    			$alumno = $this->controller->consultarAlumno($result['param']);
	    			$profesor = $this->controller->consultarProfesor($result['param']);
	    			$this->controller->asignarProfesorAlumno($alumno,$profesor);
	    			$this->controller->getTemplate()->redirect('alumnos.php');
	    			break;
	    		default:
	    			break;
	    	}
	    }

	}
?>