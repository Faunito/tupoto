<?php
	$title = "Asignaturas";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

		<!-- contenido del contenido principal -->
			<div class="row center" style="margin-top:100px;">
	        	<div class="col s12 m12">
	          		<div class="card">
			          	<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4>Evaluaciones</h4></strong></span>
				        </div>
	          			<div class="card-content">
	          		    	<div class="row">
			              		<div class="col s4 offset-s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Ver evaluación</span>
				              				<p>Visualice una evaluación ya existente en el sistema</p>
				              				<div class="card-action">
	         									<a class="waves-effect waves-light btn color_primario">Visualizar<i class="mdi mdi-eye right"></i></a>
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
	</main>
		<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>