<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Secretaria.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'evaluacionesView.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'DirectorController.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
	//require_once(ROOT_DIR . CONTROLLERS_DIR . 'SecretariaController.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$view = new EvaluacionesView();
		$controller = unserialize($_SESSION['usuario']);

		switch (get_class($controller)) {
			case 'DirectorController':
				router($controller, $view, get_class($controller->getDirector()));
				break;
			case 'ProfesorController':
				router($controller, $view, get_class($controller->getProfesor()));
				break;
			case 'SecretariaController':
				router($controller, $view, get_class($controller->getSecretaria()));
				break;
		}

	}else{
		header('Location: ../index.php');	
	}

	function router($controller, $view, $usuario){
		if (isset($_GET['action'])) {
			$view->action($_GET['action'], $controller);		
		}elseif (isset($_GET['result'])){
			$view->result($controller, $_GET, $_POST);
		}else{
			$view->output($usuario);
		}
	}
?>