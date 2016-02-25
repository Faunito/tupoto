<?php 
	require_once('Profesor.php');

    session_start();
	$s = unserialize($_SESSION['usuario']);
    print($s->getNombre());

?>