<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Secretaria.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'evaluacionesView.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'DirectorController.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'SecretariaController.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$controller = unserialize($_SESSION['usuario']);
		$view = new EvaluacionesView($controller);

		switch (get_class($controller)) {
			case 'DirectorController':
				router($view, get_class($controller->getDirector()));
				break;
			case 'ProfesorController':
				router($view, get_class($controller->getProfesor()));
				break;
			case 'SecretariaController':
				router($view, get_class($controller->getSecretaria()));
				break;
		}

	}else{
		header('Location: ../index.php');	
	}

	function router($view, $usuario){
		if (isset($_GET['action'])) {
			$view->action($_GET);		
		}elseif (isset($_GET['result'])){
			$view->result($_GET, $_POST);
		}else{
			$view->output($usuario);
		}
	}
?>