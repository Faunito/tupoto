<?php 
	if(isset($_SESSION["usuario"])){
		$usuario = unserialize($_SESSION['usuario']);
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="<?php echo RESOURCES_DIR ?>css/slidebars.min.css">
	<link rel="stylesheet" href="<?php echo RESOURCES_DIR ?>css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo RESOURCES_DIR ?>css/estilo.css">
	<link rel="stylesheet" href="<?php echo RESOURCES_DIR ?>css/dataTable.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="//cdn.materialdesignicons.com/1.2.65/css/materialdesignicons.min.css">
</head>
<body> 
	<header class="navbar-fixed">
        <nav>
            <div class="nav-wrapper color_primario">
                <a href="#" class="brand-logo center">Sistema laravel facilito</a>
				<ul class="right">
				<?php 
					if(isset($usuario)){
						echo '<li><a href="../index.php?action=logout"><i class="material-icons right">power_settings_new</i>' . $usuario->getNombre() . ' ' . $usuario->getAPaterno() . '</a></li>';
					} /*else{
						echo '<li><a href="index.php"><i class="material-icons right">vpn_key</i>Ingresar</a></li>';
					}*/
				?>
			    	
			    </ul>
            </div>
        </nav>			
    </header>