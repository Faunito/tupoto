<?php
	$title = "Evaluaciones";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title">
				            <strong><h4 class="left"><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Nueva evaluación</h4></strong>
				            </span>
				        </div>
			            <div class="card-content">     
							<div class="row">
					        <div class="col s12">
					        <div class="card">
					        <div class="card-content"> 
					        <div class="row center">
					        <div class="col s4 offset-s4">
					        <img style="height: 160px; width: 320px;"src="<?php echo RESOURCES_DIR.'img/facultad.png';?>">
					        </div>
					        <div class="col s4">
					        <img style="height: 80px; width: 250px;"src="<?php echo RESOURCES_DIR.'img/unap.png';?>">
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s12">
					        	<h4><strong><U>CONFIDENCIAL</U></strong></h4>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s12">
					        	<h4><strong>FORMULARIO DE EVALUACIÓN DE PRÁCTICA I</strong></h4>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s8 offset-s2">
					        	<h5>INGENIERÍA CIVIL EN COMPUTACIÓN E INFORMÁTICA E INGENIERÍA EJECUCIÓN EN COMPUTACIÓN E INFORMÁTICA</h5>
					        </div>
					        </div>
					        </div>
					        </div>
					        </div>
					        </div>
			            </div>
		          	</div>
		        </div>
		    </div>
		    <!-- fin del contenido del contenido principal -->		    
		</div>	
	</main>
	<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>