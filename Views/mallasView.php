<?php 
	require_once('View.php');

	class MallasView extends View {    

	    public function __construct() {
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Director':
					include(ROOT_DIR.TEMPLATES_DIR.'mallas/mallas_director.php');
	    			break;
	    	}
	    }

	    public function action($action,$controller){
	    	switch ($action) {
	    		case 'nueva':
	    			$asignaturas=$controller->listarAsignaturas();
					include(ROOT_DIR.TEMPLATES_DIR.'mallas/nueva_malla.php');
	    			break;
	    		case 'modificar':
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


	    public function result($controller, $result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
					//include(ROOT_DIR.TEMPLATES_DIR.'competencias/nueva_competencia.php');
	    			break;
	    		case 'modificar':
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