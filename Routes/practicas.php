<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Secretaria.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'practicasView.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'DirectorController.php');
	//require_once(ROOT_DIR . CONTROLLERS_DIR . 'SecretariaController.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$controller = unserialize($_SESSION['usuario']);
		$view = new PracticasView($controller);

		switch (get_class($controller)) {
			case 'DirectorController':
				router($view, get_class($controller->getDirector()));
				break;
			case 'SecretariaController':
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