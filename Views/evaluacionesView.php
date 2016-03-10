<?php 
	require_once('View.php');

	class EvaluacionesView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Director':					
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_director.php');
	    			break;
	    		case 'Profesor':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones__profesor.php');
	    			break;
	    		case 'Secretaria':					
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_secretaria.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action['action']) {
	    		case 'nueva-profesor':
		    		$alumno = $this->controller->consultarAlumno($action['rut']);
		    		$practica = $this->controller->consultarPractica($action['practica']);
	    			$competencias = $this->controller->consultarCompetenciasMalla($alumno->getIdMalla());
	    			$this->controller->getTemplate()->setData('alumno',$alumno);
	    			$this->controller->getTemplate()->setData('practica',$practica);
	    			$this->controller->getTemplate()->setData('competencias',$competencias);

		    		$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/nueva_evaluacion_profesor.php');
	    			break;

	    		case 'nueva-empleador':
	    		$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/nueva_evaluacion_empleador.php');
	    			break;

	    		case 'modificar':	    			
	    			break;

	    		case 'eliminar':
	    			break;	  

	    		case 'ver':
	    			$alumno = $this->controller->consultarAlumno($action['rut']);
	    			$practica = $this->controller->consultarPractica($action['practica']);
	    			$this->controller->getTemplate()->setData('alumno',$alumno);
	    			$this->controller->getTemplate()->setData('practica',$practica);
	    		    $this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_director.php');
	    			break;
	    		case 'listar':
	    			$alumno = $this->controller->consultarAlumno($action['param']);
	    			$practicas = $this->controller->consultarPracticasAlumno($action['param']);
	    			$this->controller->getTemplate()->setData('alumno',$alumno);
	    			$this->controller->getTemplate()->setData('practicas',$practicas);
	    		    $this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_secretaria.php');
	    			break;		 		
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nueva-profesor':	//al llenar y enviar el programa
	    		$observaciones = array();
	    		$id_observaciones = array();
	    		$evaluaciones = array();
	    		$id_evaluaciones = array();
	    		$i = 0;
	    		$j = 0;

	    		foreach ($post as $key => $value) {

	    			if( strcmp($key, 'listo') == 0 ){	//pesca el radio button
	    				$resultado = $value;    				

	    			}else{
	    				$evaluacion = explode('_', $key);

	    				if( strcmp($evaluacion[0], 'observacion') == 0 ){	//pesca la observacion
	    					$observaciones[$i] = $value;
	    					$id_observaciones[$i] = $evaluacion[1];
	    					$i++;

	    				}elseif( strcmp($evaluacion[0], 'evaluacion') == 0 ){	//pesca la evaluacion
	    					$evaluaciones[$j] = $value;
	    					$id_evaluaciones[$j] = $evaluacion[1];
	    					$j++;

	    				}

	    			}

	    		}

				switch (get_class($this->controller)) {
					case 'DirectorController':
						$idevaluacion = $this->controller->crearEvaluacionAcademica($result['practica'], $this->controller->getDirector(), $resultado);
						break;
					case 'ProfesorController':
						$idevaluacion = $this->controller->crearEvaluacionAcademica($result['practica'], $this->controller->getProfesor(), $resultado);
						break;
				}

	    		$contador_eva = count($id_evaluaciones);
	    		$contador_obs = count($id_observaciones);
	    		for ($i = 0; $i < $contador_eva; $i++) { 
	    			for ($j = 0; $j < $contador_obs; $j++) { 
		    			if( $id_evaluaciones[$i] == $id_observaciones[$j] ){ //encuentra una eva con nota y obs
		    				//enviar datos a detalle_de_evaluacion
		    				$this->controller->crearEvaluacionCompetencia(
					    						$idevaluacion,
					    						$id_evaluaciones[$i], 
					    						$observaciones[$j], 
					    						$evaluaciones[$i]
					    					);
		    			}	    				
	    			}
	    		}

	    		$this->controller->getTemplate()->redirect('evaluaciones.php?action=ver&rut='. $result['rut'] .'&practica='. $result['practica'] .'');

	    			break;
	    		case 'modificar':
	    			break;
	    		case 'consultar':
	    		
	    			break;
	    		case 'eliminar':
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>