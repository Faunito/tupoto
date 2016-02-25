<?php
	require_once('../Config/Constantes.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	require_once(ROOT_DIR . CONTROLLERS_DIR . 'ProfesorController.php');

	session_start();
	$profesor = unserialize($_SESSION['usuario']);

	switch (get_class($profesor)) {
		case 'Profesor':
			$controller = new ProfesorController($profesor);
			//renderizar la vista que corresponde al profe
			break;
		case 'Secretaria':
			break;
	}



	//========================== VISTA ===================================
	$title = "Inicio";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');

	echo '<h1>BIENVENIDOS AMIGOS</h1>';	//Falta la vista del gato naranjo

	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    

?>