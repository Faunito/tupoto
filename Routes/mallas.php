<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'mallasView.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'DirectorController.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$view = new MallasView();
		$controller = unserialize($_SESSION['usuario']);

		switch (get_class($controller)) {
			case 'DirectorController':
				router($controller, $view, get_class($controller->getDirector()));
				break;
			default:
				header('Location: inicio.php');
				break;
		}

	}else{
		header('Location: ../index.php');	
	}

	function router($controller, $view, $usuario){
		if (isset($_GET['action'])) {
			$view->action($_GET['action'],$controller);		
		}elseif (isset($_GET['result'])){
			$view->result($controller,$_GET, $_POST);
		}else{
			$view->output($usuario);
		}
	}
?>