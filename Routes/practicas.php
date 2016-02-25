<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');

	session_start();
	if(isset($_SESSION["usuario"])){

		$usuario = unserialize($_SESSION['usuario']);

		switch (get_class($usuario)) {
			case 'Secretaria':
				include(ROOT_DIR.TEMPLATES_DIR.'practicas/practicas_secretaria.php');
				break;
			case 'Director':
				include(ROOT_DIR.TEMPLATES_DIR.'practicas/practicas_director.php');
				break;
			default:
				header('Location: inicio.php');
				break;
		}

	}else{
		header('Location: ../index.php');	
	}
?>