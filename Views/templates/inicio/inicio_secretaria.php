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
								  <a class="ripplelink indigo darken-1" href="<?php echo ROUTES_DIR.'alumnos.php';?>" style="font-size: 30px; margin-left:25%;">ALUMNOS <i class="mdi mdi-school" style="font-size: 100px;"></i></a>
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