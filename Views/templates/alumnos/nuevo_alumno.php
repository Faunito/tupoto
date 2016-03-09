<?php
	$title = "Mallas";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');
	?>
	<main <main id="sb-site" class="blue-grey lighten-5">
		<div class="container">	
			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Nuevo alumno</h4></strong></span>
				        </div>
			            <div class="card-content">
			                <form id="myForm" action="alumnos.php?result=nuevo" method="POST">
			               		<div class="row">
					                <div class=" col s2 offset-s3 input-field">       
					                    <input id="rut" name="rut" type="text" class="validate">
					                    <label for="rut">Rut *</label>
					                </div>			   
					                <div class=" col s4 input-field">       
					                    <input id="carrera" name="carrera" type="text" class="validate">
					                    <label for="carrera">Carrera *</label>
					                </div> 
					           	</div>
					            <div class="row">
					                <div class=" col s2 offset-s3 input-field">       
					                    <input id="nombre" name="nombre" type="text" class="validate">
					                    <label for="nombre">Nombre *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="apaterno" name="apaterno" type="text" class="validate">
					                    <label for="apaterno">Apellido paterno *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="amaterno" name="amaterno" type="text" class="validate">
					                    <label for="amaterno">Apellido Materno *</label>
					                </div>
					           	</div>
					            <div class="row center">
						            <div class="col s2 offset-s7">
							            <button id="btn" class="btn right waves-effect waves-light color_primario"  type="submit" name="action">Ingresar
							            <i class="material-icons right">send</i>
							            </button>
						            </div>
					            </div>
					       </form>
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