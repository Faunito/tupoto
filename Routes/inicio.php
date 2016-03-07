<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Secretaria.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'DirectorController.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'SecretariaController.php');
	require_once(ROOT_DIR . VIEWS_DIR . 'inicioView.php');

	session_start();
	if(isset($_SESSION["usuario"])){
		$controller = unserialize($_SESSION['usuario']);
		$view = new InicioView($controller);
        switch (get_class($controller)) {
            case 'ProfesorController':
                $view->output(get_class($controller->getProfesor()));
                break;
            case 'DirectorController':
                $view->output(get_class($controller->getDirector()));
                break;
            case 'SecretariaController':
                $view->output(get_class($controller->getSecretaria()));
                break;  
        }

	}else{
		header('Location: ../index.php');
	}
	
?>
