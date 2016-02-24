<?php //namespace Views;
	
	require_once ('../Controllers/ControladorUsuarios.php');
     
    
    
	$controladorUsuarios = new ControladorUsuarios();
	$controladorUsuarios->login( $_POST["email"], $_POST["password"],$_POST["tipoFuncionario"]);
    //echo $_SESSION['sesion_usuario'];
	$s = unserialize($_SESSION['usuario']);
    print($s->getNombre());
	/*if($controladorUsuarios->getProfesor() != NULL) $controladorUsuarios->getProfesor();
	else {
        echo "Datos incompletos";
    }*/
?>