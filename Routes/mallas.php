<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'mallasView.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'DirectorController.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$controller = unserialize($_SESSION['usuario']);
		$view = new MallasView($controller);

		switch (get_class($controller)) {
			case 'DirectorController':
				router($view, get_class($controller->getDirector()));
				break;
			default:
				header('Location: inicio.php');
				break;
		}

	}else{
		header('Location: ../index.php');	
	}

	function router($view, $usuario){
		if (isset($_GET['action'])) {
			$view->action($_GET['action']);		
		}elseif (isset($_GET['result'])){
			$view->result($_GET, $_POST);
		}else{
			$view->output($usuario);
		}
	}
?>