<?php 

	class CompetenciasView {    

	    public function __construct() {
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Profesor':
					include(ROOT_DIR.TEMPLATES_DIR.'competencias/competencias_profesor.php');
	    			break;
	    		case 'Director':
					include(ROOT_DIR.TEMPLATES_DIR.'competencias/competencias_director.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action) {
	    		case 'nueva':
					include(ROOT_DIR.TEMPLATES_DIR.'competencias/nueva_competencia.php');
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
	    			$controller->crearCompetencia(	$post['categoria'], 
								    				$post['nombre'], 
								    				$post['descripcion']);
	    			//TOAST
	    			header('Location: competencias.php');
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