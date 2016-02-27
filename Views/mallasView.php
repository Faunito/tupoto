<?php 

	class MallasView {    

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

	    public function result($controller,$action,$post){
	    	switch ($action['result']) {
	    		case 'nueva':	
	    			$codigos=array();
	    			$asignaturas=$controller->listarAsignaturas();
	    			foreach ($post as $key => $value) {
	    				if(strcmp($value,'on')==0){
	    					array_push($codigos,$key);
	    					}
	    				}
	    			var_dump($codigos);
	    				
	    			//$controller->crearMalla(		$post[],
	    			//								$post['codigo'], 
					//			    				$post['plan']);
	    			//TOAST
	    			//header('Location: mallas.php?action=ver');
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