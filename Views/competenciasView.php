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
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nueva':
	    			$competencia = $this->controller->crearCompetencia(	$post['tipoCompetencia'], 
													    				$post['nombre'], 
													    				$post['descripcion']);
	    			$this->controller->crearEvidencia($post['basico'], 1, $competencia);
	    			$this->controller->crearEvidencia($post['medio'], 2, $competencia);
	    			$this->controller->crearEvidencia($post['avanzado'], 3, $competencia);
	    			$this->controller->getTemplate()->redirect('competencias.php?action=ver');
	    			break;
	    		case 'modificar':
	    			$this->controller->modificarCompetencia($result['param'],	
			    											$post['tipoCompetencia'], 
										    				$post['nombre'], 
										    				$post['descripcion']);

	    			$this->controller->modificarEvidencia(	$result['param'], 
										    				$post['basico'], 
										    				1);
	    			$this->controller->modificarEvidencia(	$result['param'], 
										    				$post['medio'], 
										    				2);
	    			$this->controller->modificarEvidencia(	$result['param'], 
										    				$post['avanzado'], 
										    				3);

	    			$this->controller->getTemplate()->redirect('competencias.php?action=ver');		    		
	    			break;
	    		case 'ver':
					
	    			break;
	    		case 'eliminar':
	    			$this->controller->eliminarCompetencia( $result['param']);
	    			$this->controller->getTemplate()->redirect('competencias.php');	
	    			break;
	    		case 'asignar':
	    			$competencia = $this->controller->consultarCompetencia($result['param']);
	    			$mallas = $this->controller->consultarMallasCompetencia($action['param']);
	    			$asignaturas = $this->controller->asignaturasNoRepetidas($mallas);

	    			$evidencias = $this->controller->getEvidenciasCompetencia($result['param']);
	    			//PROBLEMAS CON VARIAS EVIDENCIAS DEL MISMO NIVEL
	    			foreach ($evidencias as $evidencia) {
	    				if($evidencia->getNivel()==1)
	    				{
	    					$this->controller->getTemplate()->setData('basico', $evidencia);
	    				}elseif ($evidencia->getNivel()==2) {
	    					$this->controller->getTemplate()->setData('medio', $evidencia);
	    				}elseif ($evidencia->getNivel()==3) {
	    					$this->controller->getTemplate()->setData('avanzado', $evidencia);
	    				}
	    			}	
	    			$this->controller->getTemplate()->setData('competencia', $competencia);
	    			$this->controller->getTemplate()->setData('asignaturas', $asignaturas);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/asignar_competencia.php');
	    			break;
	    		case 'consultar':	//muestra los datos en el form para modificarlos
	    			$competencia = $this->controller->consultarCompetencia($result['param']);
	    			$evidencias = $this->controller->getEvidenciasCompetencia($competencia->getIdComp());
	    			$this->controller->getTemplate()->setData('competencia', $competencia);
	    			foreach ($evidencias as $evidencia) {
	    				if($evidencia->getNivel() == 1){
	    					$this->controller->getTemplate()->setData('basico', $evidencia);
	    				}elseif ($evidencia->getNivel() == 2) {
	    					$this->controller->getTemplate()->setData('medio', $evidencia);
	    				}elseif ($evidencia->getNivel() == 3) {
	    					$this->controller->getTemplate()->setData('avanzado', $evidencia);
	    				}
	    			}
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/modificar_competencia.php');
	    			break;
	    		case 'mostrar':
	    			$competencia = $this->controller->consultarCompetencia($result['param']);
	    			$evidencias = $this->controller->getEvidenciasCompetencia($competencia->getIdComp());
	    			$this->controller->getTemplate()->setData('competencia', $competencia);
	    			foreach ($evidencias as $evidencia) {
	    				if($evidencia->getNivel() == 1){
	    					$this->controller->getTemplate()->setData('basico', $evidencia);
	    				}elseif ($evidencia->getNivel() == 2) {
	    					$this->controller->getTemplate()->setData('medio', $evidencia);
	    				}elseif ($evidencia->getNivel() == 3) {
	    					$this->controller->getTemplate()->setData('avanzado', $evidencia);
	    				}
	    			}
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/ver_competencia.php');
				case 'cambiar':
					$lista=array();
					$values=array();
					$selects=array();					
					$i=0;
					$j=0;					
					$competencia = $this->controller->consultarCompetencia($result['param']);
					foreach ($post as $key => $value) {
	    				if(strcmp($value,'on') == 0){
	    					$lista[$i]=$key;
	    					$i++;
	    					}
	    			}
	    			foreach ($post as $key => $value) {
	    				if(strcmp($value,'on')!= 0){
	    				$cadena=explode('_',$key);
	    				$valor=$cadena[1];
	    				foreach ($lista as $id) {
	    					if(strcmp($valor,$id)==0){
	    						$this->controller->asignarAsignaturaCompetencia($result['param'],$id,$value);
	    					}
	    				}
	    				}
	    			}
	    			break;
	    		default:
	    			break;
	    	}
	    }

	}
?>