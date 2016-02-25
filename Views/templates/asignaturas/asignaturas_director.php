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
				            <span class="card-title"><strong><h4>Asignaturas</h4></strong></span>
				        </div>
			            <div class="card-content">
			                <div class="row">
			                	<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Nueva asignatura</span>
				              				<p>Ingrese una nueva asignatura para una malla ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn btn-large color_primario" href="nueva_asignatura.php">Registrar<i class="mdi mdi-library-plus right"></i></a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Modificar asignatura</span>
				              				<p>Modifique una asignatura ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario"><i class="material-icons right">edit</i>Modificar</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Ver asignatura</span>
				              				<p>Visualice una asignatura ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario">Ver<i class="mdi mdi-eye right"></i></a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
		              		</div>
			                <div class="row">
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Nuevo programa</span>
				              				<p>Ingrese un nuevo programa para una asignatura ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="nuevo_programa.php"><i class="material-icons right">note_add</i>Registrar</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Modificar programa</span>
				              				<p>Modifique un programa de asignatura ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario"><i class="material-icons right">edit</i>Modificar</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Ver programa</span>
				              				<p>Visualice un programa de asignatura ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario">Ver<i class="mdi mdi-eye right"></i></a>
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