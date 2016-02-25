<?php
	require_once('/Config/Constantes.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'LoginController.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'loginView.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		header('Location: ' . ROUTES_DIR . 'inicio.php');
	}
	
	$controller = new LoginController();

	if (isset($_GET['action'])) {
		if($controller->{$_GET['action']}($_POST)){	
			header('Location: ' . ROUTES_DIR . 'inicio.php');
		}else{
			//No existe el profesor
		}													
	}else{
		$view = new LoginView();
		$view->output();		
	}


?>