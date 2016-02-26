<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'mallasView.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$view = new MallasView();
		$usuario = unserialize($_SESSION['usuario']);

		switch (get_class($usuario)) {
			case 'Director':
				include(ROOT_DIR.TEMPLATES_DIR.'mallas/mallas_director.php');
				router($controller, $view, get_class($usuario));
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
			$view->action($_GET['action']);		
		}elseif (isset($_GET['result'])){
			$view->result($_GET, $_POST);
		}else{
			$view->output($usuario);
		}
	}
?>