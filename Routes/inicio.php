<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	//require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'inicioView.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$view = new InicioView();
		$usuario = unserialize($_SESSION['usuario']);
		$view->output(get_class($usuario));

		// switch (get_class($usuario)) {
		// 	case 'Profesor':
		// 		$controller = new ProfesorController($usuario);
		// 		break;
		// 	case 'Secretaria':
		// 		//$controller = new SecretariaController($usuario);
		// 		break;
		// 	case 'Director':
		// 		//$controller = new DirectorController($usuario);
		// 		break;
		// }

	}else{
		header('Location: ../index.php');	
	}
	
?>
