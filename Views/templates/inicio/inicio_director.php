	<?php
	$title = "Inicio";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header_inicio.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4>Bienvenido a SEP</h4></strong></span>
				        </div>
						<div class="card-content">        
							<div class="wrapper">
								<div class="row">
								  <a class="ripplelink red darken-2" href="mallas.php?action=listar" style="font-size: 30px;">		MALLAS <i class="mdi mdi-table-large" style="font-size: 100px;"></i></a>
								  <a class="ripplelink green darken-2" href="<?php echo ROUTES_DIR.'competencias.php';?>" style="font-size: 30px;">COMPETENCIAS <i class="mdi mdi-book" style="font-size: 100px;"></i></a>
								</div>
								<div class="row">
								  <a class="ripplelink indigo darken-1" href="<?php echo ROUTES_DIR.'alumnos.php';?>" style="font-size: 30px;">ALUMNOS <i class="mdi mdi-school" style="font-size: 100px;"></i></a>
								  <a class="ripplelink orange darken-2" href="<?php echo ROUTES_DIR.'usuarios.php';?>" style="font-size: 30px;">USUARIOS <i class="mdi mdi-account-multiple" style="font-size: 100px;"></i></a>
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