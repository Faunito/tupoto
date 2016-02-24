<?php
	require_once('/Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'LoginController.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'LoginView.php');
	
	$profesor = new Profesor();
	$controller = new LoginController($profesor);

	if (isset($_GET['action'])) {
		if($controller->{$_GET['action']}($_POST)){				//Llama a la funcion 'login' del controlador, 
			header('Location: ' . ROUTES_DIR . 'inicio.php');		//que viene por parametro de $_GET en el form
		}else{
			//No existe el profesor
		}													
	}

	$view = new LoginView($profesor);
	$view->output();

?>