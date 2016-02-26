	<?php
	$title = "Inicio";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center" style="margin-top:100px;">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4>Bienvenido a SEP</h4></strong></span>
				        </div>
			            <div class="card-content">
			               <div class="row">			                	
			              		<div class="col s4 offset-s2">
				                	<div class="card hoverable">
				                		<div class="card-content">
             								<a class="waves-effect waves-light btn-large color_primario href="<?php echo ROUTES_DIR.'practicas.php';?>"">Practicas<i class="mdi mdi-file right"></i></a>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
             								<a class="waves-effect waves-light btn-large color_primario" href="<?php echo ROUTES_DIR.'evaluaciones.php';?>">Evaluaciones<i class="mdi mdi-clipboard-text right"></i></a>
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
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>