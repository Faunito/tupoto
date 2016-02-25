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
			                	<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="nueva_asignatura.php">Asignaturas<i class="mdi mdi-library-plus right"></i></a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario"><i class="material-icons right">edit</i>Competencias</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario">Evaluaciones<i class="mdi mdi-eye right"></i></a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
		              		</div>
			                <div class="row">
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="nuevo_programa.php"><i class="material-icons right">note_add</i>Mallas</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario"><i class="material-icons right">edit</i>Practicas</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario">Usuarios<i class="mdi mdi-eye right"></i></a>
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