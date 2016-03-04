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
	    			$asignaturas=$this->controller->listarAsignaturasLibres();
	    			$this->controller->getTemplate()->setData('asignaturasLibres', '');
	    			$this->controller->getTemplate()->setData('asignaturasLibres',$asignaturas);
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
	    			$malla=$this->controller->consultarMalla($action['param']);
	    			$asignaturas=$this->controller->listarAsignaturasMalla($action['param']);
	    			$niveles=array();
	    			foreach ($asignaturas as $asignatura) {
	    				if(!isset($niveles[$asignatura->getNivel()]))
	    				{
	    					$niveles[$asignatura->getNivel()]=array();
	    				}
	    				array_push($niveles[$asignatura->getNivel()], $asignatura);
	    			}
	    			$this->controller->getTemplate()->setData('malla',$malla);
	    			$this->controller->getTemplate()->setData('niveles',$niveles);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/ver_malla.php');
	    			break;
	    		case 'asignar':
	    			$malla=$this->controller->consultarMalla($action['param']);	
	    			$competenciasMalla = $this->controller->consultarCompetenciasMalla($action['param']);
	    			$competenciasNoMalla = $this->controller->consultarCompetenciasNoMalla($action['param']);
	    			$this->controller->getTemplate()->setData('malla',$malla);
	    			$this->controller->getTemplate()->setData('competenciasMalla', $competenciasMalla);
	    			$this->controller->getTemplate()->setData('competenciasNoMalla', $competenciasNoMalla);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'mallas/asignar_competencia_malla.php');
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
	    			$lvl=0;
	    			foreach ($post as $key => $value) {
	    				if(strcmp($value,'on') == 0){
	    					foreach ($asignaturas as $asignatura) {
								if(strcmp($key,$asignatura->getId()) == 0){
									if($asignatura->getNivel()>$lvl)
									{
										$lvl=$asignatura->getNivel();
									}
									$lista[$i]=$asignatura;
									$i++;
								}
	    					}
	    				}
	    			}
	    			$this->controller->crearMalla($post['codigo'], $post['plan'], $lvl, $lista);
	    			$this->controller->getTemplate()->redirect('mallas.php');
	    			break;
	    		case 'modificar':
	    			$asignaturas=$this->controller->listarAsignaturas();	
	    			$i=0;
	    			$j=0;
	    			$lvl=0;
	    			$listaOn=array();
	    			$listaOff=array();	
	    			foreach ($post as $key => $value) {
	    				if(strcmp($value,'on') == 0){
	    					foreach ($asignaturas as $asignatura) {
								if(strcmp($key,$asignatura->getId()) == 0){
									if($asignatura->getNivel()>$lvl)
									{
										$lvl=$asignatura->getNivel();
									}
									$listaOn[$i]=$asignatura;
									$i++;
		    					}
		    				}
		    				
		    			}
	    			}
	    			foreach ($asignaturas as $asignatura) {
	    				$existe=false;
	    				foreach ($listaOn as $On){	    				
	    				if(strcmp($asignatura->getId(),$On->getId())==0){
	    					$existe=true;
	    					}	    				
	    				}
	    				if(!$existe){
	    					$listaOff[$j]=$asignatura;
	    					$j++;
	    				}
	    			}
	    			$this->controller->modificarMalla($result['param'],$post['codigo'], $post['plan'], $lvl, $listaOn, $listaOff);
	    			$this->controller->getTemplate()->redirect('mallas.php');
	    		
	    			break;
	    		case 'eliminar':
	    			$this->controller->eliminarMalla( $result['param']);
	    			$this->controller->getTemplate()->redirect('mallas.php');	
	    			break;  
	    		case 'asignar':
	    			$competencias=$this->controller->listarCompetencias();
	    			$competenciasMalla=$this->controller->consultarCompetenciasMalla($result['param']);	
	    			$i=0;
	    			$j=0;
	    			foreach ($post as $key => $value) {
	    				if(strcmp($value,'on') == 0){
	    					foreach ($competencias as $competencia) {
								if(strcmp($key,$competencia->getIdComp()) == 0){
									$listaOn[$i]=$competencia;
									$i++;
								}
	    					}
	    				}
	    			}
	    			foreach ($competencias as $competencia) {
	    				$existe=false;
	    				foreach ($listaOn as $On){	    				
	    				if(strcmp($competencia->getIdComp(),$On->getIdComp())==0){
	    					$existe=true;
	    					}	    				
	    				}
	    				if(!$existe){
	    					$listaOff[$j]=$competencia;
	    					$j++;
	    				}
	    			}
	    			$this->controller->asignarCompetenciaMalla($result['param'], $listaOn);
	    			$this->controller->desasignarCompetenciaMalla($result['param'], $listaOff);
	    			$this->controller->getTemplate()->redirect('mallas.php');
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>