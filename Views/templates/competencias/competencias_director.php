<?php
	$title = "Competencias";
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
				            <span class="card-title"><strong><h4>Competencias</h4></strong></span>
				        </div>
			            <div class="card-content">
			                <div class="row">
			                	<div class="col s4 offset-s2">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Nueva competencia</span>
				              				<p>Ingrese una nueva competencia para una malla ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="competencias.php?action=nueva">Registrar<i class="mdi  mdi-bookmark-plus right"></i></a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Modificar competencia</span>
				              				<p>Modifique una competencia ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="competencias.php?action=modificar"><i class="material-icons right">edit</i>Modificar</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              	</div>
			              	<div class="row">
			              		<div class="col s4 offset-s2">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Ver competencia</span>
				              				<p>Cree una nueva asignatura para una malla ya existente</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="competencias.php?action=ver">Ver<i class="mdi mdi-eye right"></i></a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
					            <div class="row">
				              		<div class="col s4">
					                	<div class="card hoverable">
					                		<div class="card-content">
					              				<span class="card-title">Asignar competencia a malla</span>
					              				<p>Asigne una o mas competencias a una malla ya existente en el sistema</p>
					              				<div class="card-action">
		         									<a class="waves-effect waves-light btn color_primario" href="competencias.php?action=asignar">Asignar<i class="mdi mdi-import right"></i></a>
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
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>