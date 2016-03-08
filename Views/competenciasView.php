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
	    			$asignaturasOn=array();
	    			$asignaturasOff=array();
	    			$i=0;
	    			$j=0;
	    			$competencia = $this->controller->consultarCompetencia($result['param']);
	    			$mallas = $this->controller->consultarMallasCompetencia($result['param']);

	    			if(!empty($mallas)){
	    				$asignaturas = $this->controller->asignaturasNoRepetidas($mallas);
	    				$contador = count($asignaturas['asignaturas']);
	    				$this->controller->getTemplate()->setData('contador', $contador);
	    				$this->controller->getTemplate()->setData('asignaturas', $asignaturas['asignaturas']);
	    				$this->controller->getTemplate()->setData('especificaciones', $asignaturas['especificaciones']);
	    			}else{
	    				$asignaturas = array();
	    			}
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
	    			$this->controller->getTemplate()->setData('mallas', $mallas);
	    			$this->controller->getTemplate()->setData('competencia', $competencia);
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

	    			//================== Datos para el grafico =============================
	    			$mallas = $this->controller->consultarMallasCompetencia($result['param']);
	    			$this->controller->getTemplate()->setData('mallas', $mallas);

	    			$graficos = array();
	    			if(!empty($mallas)){
	    				$i = 0;
	    				foreach ($mallas as $malla) {
	    					$graficos[$i] = $this->controller->asignaturasGrafico($malla, $competencia);
	    					$i++;
	    				}
	    				$this->controller->getTemplate()->setData('graficos', $graficos);
	    				//Hacer un for $i por cada grafico, dentro del template
	    				//mostrando $mallas[$i],
	    				//y dentro de otro for $j
	    				//$graficos[$i]['asignaturas'][$j], $graficos[$i]['especificaciones'][$j]

		    			// $contador = count($graficos);	//cantidad de mallas
	    				// for($i = 0; $i < $contador; $i++) {
	    				// 	echo $mallas[$i]->getCodCarrera() . ' - ' . $mallas[$i]->getPlan() . '<br>';
	    				// 	$contadorAsignaturas = count($graficos[$i]['asignaturas']);
	    				// 	for ($j = 0; $j < $contadorAsignaturas; $j++) { 
	    				// 		echo $graficos[$i]['asignaturas'][$j]->getNombre() . ' -> ' . $graficos[$i]['especificaciones'][$j]->getNivelCompetencia() . '<br>';
	    				// 	}
	    				// }
	    			
	    			}



	    			//======================================================================

	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'competencias/ver_competencia.php');
	    			break;
				case 'cambiar':
					$lista=array();
					$values=array();
					$selects=array();					
					$i=0;
					$j=0;	

					$competencia = $this->controller->consultarCompetencia($result['param']);
	    			$mallas = $this->controller->consultarMallasCompetencia($result['param']);	

	    			$this->controller->borraAsignaturasCompetencia($mallas, $competencia);
					
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
	    			$this->controller->getTemplate()->redirect('competencias.php');
	    			break;
	    		default:
	    			break;
	    	}
	    }

	}
?>