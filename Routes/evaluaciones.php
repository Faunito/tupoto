<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');

	session_start();
	$profesor = unserialize($_SESSION['usuario']);

	switch (get_class($profesor)) {
		case 'Profesor':
			$controller = new ProfesorController($profesor);
			include(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_profesor.php');
			break;
		case 'Secretaria':
			include(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_secretaria.php');
			break;
		case 'Director':
			include(ROOT_DIR.TEMPLATES_DIR.'evaluaciones/evaluaciones_profesor.php');
			break;
	}
?>