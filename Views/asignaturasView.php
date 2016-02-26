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

	    public function action($action){
	    	switch ($action) {
	    		case 'nueva-asignatura':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/nueva_asignatura.php');
	    			break;
	    		case 'modificar-asignatura':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/modificar_asignatura.php');
	    			break;
	    		case 'ver-asignatura':
					include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/listar_asignaturas.php');
	    			break;

	    		case 'nuevo-programa':
					include(ROOT_DIR.TEMPLATES_DIR.'asignatura/nuevo_programa.php');
	    			break;
	    		case 'modificar-programa':
					include(ROOT_DIR.TEMPLATES_DIR.'asignatura/modificar_programa.php');
	    			break;
	    		case 'ver-programa':
					include(ROOT_DIR.TEMPLATES_DIR.'asignatura/listar_programas.php');
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	    public function result($controller, $result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
	    			$controller->crearCompetencia(	$post['categoria'], 
								    				$post['nombre'], 
								    				$post['descripcion']);
	    			//TOAST
	    			header('Location: competencias.php');
					//include(ROOT_DIR.TEMPLATES_DIR.'competencias/nueva_competencia.php');
	    			break;
	    		case 'modificar':
		    		$controller->modificarCompetencia(	$post['id'], 
									    				$post['categoria'], 
									    				$post['nombre'], 
									    				$post['descripcion']);
		    		//TOAAAST
		    		header('Location: competencias.php');
					//include(ROOT_DIR.TEMPLATES_DIR.'competencias/competencias_director.php');
	    			break;
	    		case 'ver':
					//include(ROOT_DIR.TEMPLATES_DIR.'competencias/competencias_director.php');
	    			break;
	    		case 'asignar':
					//include(ROOT_DIR.TEMPLATES_DIR.'competencias/competencias_director.php');
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>