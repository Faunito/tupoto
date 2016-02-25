<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$usuario = unserialize($_SESSION['usuario']);
	}else{
		header('Location: index.php');	
	}

	switch (get_class($usuario)) {
		case 'Profesor':
			$controller = new ProfesorController($usuario);
			include(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_profesor.php');
			break;
		case 'Secretaria':
			include(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_secretaria.php');
			break;
		case 'Director':
			include(ROOT_DIR.TEMPLATES_DIR.'inicio/inicio_director.php');
			break;
	}
?>
