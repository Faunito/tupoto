<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');

	session_start();
	if(isset($_SESSION["usuario"])){

		$usuario = unserialize($_SESSION['usuario']);

		switch (get_class($usuario)) {
			case 'Profesor':
				$controller = new ProfesorController($profesor);
				include(ROOT_DIR.TEMPLATES_DIR.'usuarios/usuarios_director.php');	//director o profesor?
				break;
			default:
				header('Location: inicio.php');
				break;
		}

	}else{
		header('Location: ../index.php');	
	}
?>