<?php 

	class UsuariosView {    

	    public function __construct() {
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    // 		case 'Profesor':
					// include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/asignaturas_profesor.php');
	    // 			break;
	    		case 'Director':					
					include(ROOT_DIR.TEMPLATES_DIR.'usuarios/usuarios_director.php');
	    			break;
	    	}
	    }

	    public function action($action, $controller){
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

	    public function result($controller, $result, $post){
	    	switch ($result['result']) {
	    		case 'nuevo':
	    			//header('Location: asignaturas.php?action=ver-asignatura');
	    			break;
	    		case 'modificar':
	    			break;
	    		case 'consultar':
					// $asignatura = $controller->consultarAsignatura($result['param']);
	    // 			include(ROOT_DIR.TEMPLATES_DIR.'asignaturas/modificar_asignatura.php');
	    			break;
	    		case 'eliminar':
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>