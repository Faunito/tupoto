<?php
	require_once('/Config/Constantes.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'LoginController.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'LoginView.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$usuario = unserialize($_SESSION['usuario']);
	}else{
		$usuario = null;
	}
	
	$controller = new LoginController();

	if (isset($_GET['action'])) {
		if($controller->{$_GET['action']}($_POST)){		
		//profe existe, hacer la cuestion de sesiones		
			header('Location: ' . ROUTES_DIR . 'inicio.php');
		}else{
			//No existe el profesor
		}													
	}

	$view = new LoginView();
	$view->output();

?>