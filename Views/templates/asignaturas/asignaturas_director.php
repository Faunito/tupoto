<?php
	$title = "Asignaturas";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	?>
<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Asignaturas</h4></strong></span>
				        </div>
			            <div class="card-content">
			                <div class="row">
			                	<div class="col s4 offset-s2">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Nueva asignatura</span>
				              				<p>Ingrese una nueva asignatura para una malla ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="asignaturas.php?action=nueva-asignatura">Registrar<i class="mdi mdi-folder-plus right"></i></a>
            								</div>
				              			</div>
				              		</div>
				              	</div>
				              	<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Ver asignatura</span>
				              				<p>Liste todas las asignaturas ya existentes, aqui podrá modificarlas y/o eliminarlas</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="asignaturas.php?action=ver-asignatura">Ver<i class="mdi mdi-eye right"></i></a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
		              		</div>
			                <div class="row">
			              		<div class="col s4 offset-s2">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Nuevo programa</span>
				              				<p>Ingrese un nuevo programa para una asignatura ya existente en el sistema</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="asignaturas.php?action=nuevo-programa"><i class="material-icons right">note_add</i>Registrar</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Ver programa</span>
				              				<p>Liste todos los programas ya existentes, aqui podrá modificarlos y/o eliminarlos</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="asignaturas.php?action=ver-programa">Ver<i class="mdi mdi-eye right"></i></a>
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