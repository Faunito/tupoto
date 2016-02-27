<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Secretaria.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'inicioView.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$view = new InicioView();
		$usuario = unserialize($_SESSION['usuario']);
		$view->output(get_class($usuario));

	}else{
		header('Location: ../index.php');	
	}
	
?>
