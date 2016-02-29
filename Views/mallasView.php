<?php 
	require_once('View.php');

	class MallasView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	$mallas = $this->controller->listarMallas();
	    	$this->controller->getTemplate()->setData('mallas', $mallas);
	    	switch ($usuario) {
	    		case 'Director':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/mallas_director.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action['action']) {
	    		case 'nueva':
	    			$asignaturas=$this->controller->listarAsignaturas();
	    			$this->controller->getTemplate()->setData('asignaturas',$asignaturas);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/nueva_malla.php');
	    			break;
	    		case 'modificar':
	    			$malla=$this->controller->consultarMalla($action['param']);
	    			$asignaturas=$this->controller->listarAsignaturas();
	    			$this->controller->getTemplate()->setData('malla',$malla);
	    			$this->controller->getTemplate()->setData('asignaturas',$asignaturas);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/modificar_malla.php');
	    			break;
	    		case 'listar':
	    			$mallas=$this->controller->listarMallas();
	    			$this->controller->getTemplate()->setData('mallas',$mallas);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/mallas_director.php');
	    			break;
	    		case 'ver':
	    		
	    			break;
	    			
	    		
	    		default:
	    			break;
	    	}
	    }


	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
	    			$asignaturas=$this->controller->listarAsignaturas();	
	    			$i=0;
	    			foreach ($post as $key => $value) {
	    				if(strcmp($value,'on') == 0){
	    					foreach ($asignaturas as $asignatura) {
								if(strcmp($key,$asignatura->getId()) == 0){
									$lista[$i]=$asignatura;
									$i++;
								}
	    					}
	    				}
	    			}
	    			$this->controller->crearMalla($post['codigo'], $post['plan'], $lista);
	    			$this->controller->getTemplate()->redirect('mallas.php');
	    			break;
	    		case 'modificar':
	    			$asignaturas=$this->controller->listarAsignaturas();	
	    			$i=0;
	    			$j=0;
	    			foreach ($post as $key => $value) {
	    				if(strcmp($value,'on') == 0){
	    					foreach ($asignaturas as $asignatura) {
								if(strcmp($key,$asignatura->getId()) == 0){
									$listaOn[$i]=$asignatura;
									$i++;
								}
	    					}
	    				}
	    				else{
	    					foreach ($asignaturas as $asignatura) {
								if(strcmp($key,$asignatura->getId()) == 0){
									$listaOff[$j]=$asignatura;
									$j++;
								}
	    					}

	    				}
	    			}
	    			$this->controller->modificarMalla($post['codigo'], $post['plan'], $listaOn, $listaOff);
	    			$this->controller->getTemplate()->redirect('mallas.php');
	    		
	    			break;
	    		case 'ver':
	    		
	    			break;
	    		case 'asignar':
	    		
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>