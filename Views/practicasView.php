<?php 
	require_once('View.php');

	class PracticasView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Director':					
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practicas/practicas_director.php');
	    			break;
	    		case 'Secretaria':
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practicas/practicas_secretaria.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action['action']) {
	    		case 'nueva':
                    $alumno = $this->controller->consultarAlumno($action['param']);                   
                    $this->controller->getTemplate()->setData('alumno',$alumno);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practicas/nueva_practica.php');
	    			break;
                case 'modificar':
                    $practica = $this->controller->consultarPractica($action['param']);
                    $this->controller->getTemplate()->setData('practica',$practica);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practicas/modificar_practica.php');
                    break;
	    		case 'listar':	
                    $alumno = $this->controller->consultarAlumno($action['param']);
                    $practicas = $this->controller->consultarPracticasAlumno($action['param']);                    
                    $this->controller->getTemplate()->setData('alumno',$alumno);
                    $this->controller->getTemplate()->setData('practicas',$practicas);
	    		    $this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'alumnos/ver_alumno.php');
	    			break;
	    		case 'eliminar':

	    			break;	    		
	    		default:
	    			break;
	    	}
	    }

	    public function result($result, $post){
	    	switch ($result['result']) {
	    		case 'nuevo':
                    $this->controller->ingresarPractica( $result['param'],
                                                         $post['direccion'],
                                                         $estado = 'inicio',
                                                         $post['fecha_inicio'],
                                                         $post['fecha_termino'],
                                                         $intento = '1', 
								    				     $post['nivel'], 
								    				     $post['horas']);
	    			//TOAST
	    			$this->controller->getTemplate()->redirect('alumnos.php');
	    			//$this->controller->getTemplate()->redirect(ROOT_DIR.TEMPLATES_DIR.'alumnos.php);
	    			break;
	    		case 'modificar':
                    $this->controller->modificarPractica( $result['param'],
                                                          $post['direccion'],
                                                          $post['fecha_inicio'],
                                                          $post['fecha_termino'],
								    				      $post['nivel'], 
								    				      $post['horas']);
	    			//TOAST
	    			$this->controller->getTemplate()->redirect('alumnos.php');                
	    			break;
	    		case 'consultar':
                    $practicas = $this->controller->consultarPractica($result['param']);
	    			$this->controller->getTemplate()->setData('practica', $practica);
	    			$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'practica/modificar_practica.php');
                	break;
	    		case 'eliminar':
                    $this->controller->eliminarPractica($result['param']);
					$this->controller->getTemplate()->redirect('alumnos.php');
	    			break;
	    		
	    		default:
	    			break;
	    	}
	    }

	}
?>