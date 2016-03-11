<?php 
	require_once('View.php');

	class UsuariosView extends View {    

	    private $controller;    

	    public function __construct($controller) {
	    	$this->controller = $controller;
	    }	    

	    public function output($usuario) {
	    	switch ($usuario) {
	    		case 'Director':					
					$this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'usuarios/usuarios_director.php');
	    			break;
	    	}
	    }

	    public function action($action){
	    	switch ($action) {
	    		case 'nuevo':
                    $this->controller->getTemplate()->load(ROOT_DIR.TEMPLATES_DIR.'usuarios/nuevo_usuario.php');
	    			break;
	    		case 'modificar':	

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
                if($post['funcionario']==1){
                    $this->controller->crearUsuario($post['rut'], 
								    				$post['nombre'], 
								    				$post['apaterno'],
                                                    $post['amaterno'],
                                                    $post['password'],
                                                    $post['correo'],
                                                    $post['tipoProfesor'],
                                                    $post['facultad']);
                }
                elseif($post['funcionario']==2){
                    $this->controller->crearUsuario($post['rut'], 
								    				$post['nombre'], 
								    				$post['apaterno'],
                                                    $post['amaterno'],
                                                    $post['password'],
                                                    $post['correo'],
                                                    $post['fonoFijo'],
                                                    $post['facultad']);
                }
                    
	    			//TOAST
	    			$this->controller->getTemplate()->redirect('usuarios.php');
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