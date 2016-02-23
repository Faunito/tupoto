<?php 
	
	require_once ('../Controllers/ControladorUsuarios.php');    

	$controladorUsuarios = new ControladorUsuarios();
	$controladorUsuarios->login( $_POST["email"], $_POST["password"],$_POST["tipoFuncionario"]);
	//echo $_SESSION['sesion_usuario'];
	
	if($controladorUsuarios->getProfesor() != NULL) $controladorUsuarios->getProfesor()->toString;
	else {
        echo "Datos incompletos";
    }
?>