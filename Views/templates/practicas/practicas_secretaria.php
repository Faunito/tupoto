<?php
	$title = "Prácticas";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_secretaria.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Prácticas</h4></strong></span>
				        </div>
			            <div class="card-content">
			                <div class="row">
			                	<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Nueva práctica</span>
				              				<p>Ingrese una nueva práctica profesional</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario" href="buscar_alumno.php"><i class="material-icons right">note_add</i>Registrar</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Modificar práctica</span>
				              				<p>Modifique una práctica ya existente</p>
				              				<div class="card-action">
             									<a class="waves-effect waves-light btn color_primario"><i class="material-icons right">edit</i>Modificar</a>
            								</div>
				              			</div>
				              		</div>
			              		</div>
			              		<div class="col s4">
				                	<div class="card hoverable">
				                		<div class="card-content">
				              				<span class="card-title">Ver práctica</span>
				              				<p>Visualice una práctica ya existente</p>
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