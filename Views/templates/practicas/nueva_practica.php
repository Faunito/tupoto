<?php
	$title = "Nueva práctica";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Practica.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">	
			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Ingrese una práctica para el alumno: <?php echo $this->data['alumno']->getNombre().' '.$this->data['alumno']->getApaterno().' '.$this->data['alumno']->getAmaterno();?></h4></strong></span>
				        </div>
			            <div class="card-content">
			            <!-- LOS CAMPOS ID_PRACTICA, ESTADO y INTENTO deben ser automaticos -->
			                <form id="myForm" action="practicas.php?result=nuevo&param=<?php echo $this->data['alumno']->getRut(); ?>" method="POST">
					            <div class="row">
					                <div class=" col s1 offset-s3 input-field">       
					                    <select name="nivel">
								      	<option value="" disabled selected>Nivel</option>
								      	<option value="1">Primera</option>
								    	<option value="2">Segunda</option>
								    </select>
					                </div>
					                <div class=" col s1 input-field">       
					                    <input id="horas" name="horas" type="text" class="validate">
					                    <label for="horas">Horas *</label>
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
		?>
		<script>
			$('.DatePicker').pickadate({
	        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
	        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
	        today: 'Hoy',
	        clear: 'Borrar',
	        close: 'Salir',
	        selectMonths: true,
	        selectYears: 200,
	        format: 'dd-mm-yyyy',
	        firstDay: 1
    	});
		</script>
		<?php
		require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>