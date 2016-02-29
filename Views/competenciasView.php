<?php 
	require_once('View.php');

	class CompetenciasView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	$competencias = $this->controller->listarCompetencias();
	    	$this->controller->getTemplate()->setData('competencias', $competencias);
	    	switch ($usuario) {
	    		case 'Profesor':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/competencias_profesor.php');
	    			break;
	    		case 'Director':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/listar_competencias.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action) {
	    		case 'nueva':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/nueva_competencia.php');
	    			break;
	    		case 'modificar':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/modificar_competencia.php');
	    			break;
	    		case 'ver':
	    			$competencias = $this->controller->listarCompetencias();
	    			$this->controller->getTemplate()->setData('competencias', $competencias);
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/listar_competencias.php');
	    			break;
	    		case 'asignar':
					
	    			break;	    		
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
	    			$this->controller->crearCompetencia(	$post['categoria'], 
										    				$post['nombre'], 
										    				$post['descripcion']);
	    			$this->controller->getTemplate()->redirect('competencias.php?action=ver');
	    			break;
	    		case 'modificar':
	    			$this->controller->modificarCompetencia($result['param'],	
			    											$post['categoria'], 
										    				$post['nombre'], 
										    				$post['descripcion']);
	    			$this->controller->getTemplate()->redirect('competencias.php?action=ver');		    		
	    			break;
	    		case 'ver':
					
	    			break;
	    		case 'eliminar':
	    			$this->controller->eliminarCompetencia( $result['param']);
	    			$this->controller->getTemplate()->redirect('competencias.php');	
	    			break;
	    		case 'asignar':

	    			break;
	    		case 'consultar':
	    			$competencia = $this->controller->listarCompetencia($result['param']);
	    			$this->controller->getTemplate()->setData('competencia', $competencia);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/modificar_competencia.php');
	    			break;
	    		default:
	    			break;
	    	}
	    }

	}
?>