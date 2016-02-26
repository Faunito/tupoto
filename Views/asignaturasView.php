<?php 

	class AsignaturasView {    

	    public function __construct() {
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Profesor':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/asignaturas_profesor.php');
	    			break;
	    		case 'Director':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/asignaturas_director.php');
	    			break;
	    	}
	    }

	    public function action($action, $controller){
	    	switch ($action) {
	    		case 'nueva-asignatura':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/nueva_asignatura.php');
	    			break;
	    		case 'modificar-asignatura':
	    			//$asignatura = $controller->consultarAsignatura();
					//include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/modificar_asignatura.php');
	    			break;
	    		case 'ver-asignatura':
	    			$asignaturas = $controller->listarAsignaturas();
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/listar_asignaturas.php');
	    			break;

	    		case 'nuevo-programa':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/nuevo_programa.php');
	    			break;
	    		case 'modificar-programa':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/modificar_programa.php');
	    			break;
	    		case 'ver-programa':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/listar_programas.php');
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	    public function result($controller, $result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
	    			$controller->crearAsignatura(	$post['codigo'], 
								    				$post['nombre'], 
								    				$post['nivel']);
	    			//TOAST
	    			header('Location: asignaturas.php?action=ver-asignatura');
	    			break;
	    		case 'modificar':
		    		$controller->modificarAsignatura(	$result['param'], 
									    				$post['codigo'], 
									    				$post['nombre'], 
									    				$post['nivel']);
		    		//TOAAAST
		    		header('Location: asignaturas.php?action=ver-asignatura');
	    			break;
	    		case 'consultar':
					$asignatura = $controller->consultarAsignatura($result['param']);
	    			include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/modificar_asignatura.php');
	    			break;
	    		case 'eliminar':
					$controller->eliminarAsignatura($result['param']);
					header('Location: asignaturas.php?action=ver-asignatura');	
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>