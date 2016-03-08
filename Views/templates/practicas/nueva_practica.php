<?php
	$title = "Mallas";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Practica.php');
	?>
	<main class="blue-grey lighten-5">
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
			            <!-- LOS CAMPOS ID_PRACTICA, ESTADO y INTENTO deben ser automaticos -->
			                <form id="myForm" action="#" method="POST">
			               		<div class="row">
					                 <div class="input-field col s4 offset-s3">
			                    	        <input id="alumno" name="alumno" type="text" class="validate" disabled value='<?php echo $this->data['alumno']->getNombre().' '.$this->data['alumno']->getApaterno().' '.$this->data['alumno']->getAmaterno();?>'>
									        <label for='alumno'>Alumno</label>
			                    	</div>	

					                <div class=" col s2 input-field">       
					                    <input id="horas" name="horas" type="text" class="validate">
					                    <label for="horas">Horas *</label>
					                </div>			               
					           	</div>
					            <div class="row">
					                <div class=" col s2 offset-s3 input-field">       
					                    <input id="nivel" name="nivel" type="text" class="validate">
					                    <label for="nivel">Nivel de práctica *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="fecha_inicio" name="fecha_inicio" type="text" class="datepicker">
					                    <label for="fecha_inicio">Fecha inicio *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="fecha_termino" name="fecha_termino" type="text" class="datepicker">
					                    <label for="fecha_termino">Fecha termino *</label>
					                </div>
					           	</div>
					           	<div class="row">
					                <div class=" col s6 offset-s3 input-field">       
					                    <input id="direccion" name="direccion" type="text" class="validate">
					                    <label for="direccion">Dirección *</label>
					                </div>					               
					            </div>

					            <div class="row center">
						            <div class="col s2 offset-s6">
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