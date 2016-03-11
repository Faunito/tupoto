<?php
	$title = "Nueva práctica";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Secretaria.php');
    require_once(ROOT_DIR . MODELS_DIR . 'Profesor.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">	
			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Nuevo Usuario</h4></strong></span>
				        </div>
			            <div class="card-content">
			                <form id="myForm" action="usuarios.php?result=nuevo" method="POST">
					            <div class="row">
					                <div class=" col s3 offset-s2 input-field">       
					                    <select name="funcionario" id='funcionario'>
    								      	<option value="" disabled selected>Funcionario</option>
    								      	<option value="1">Profesor</option>
    								    	<option value="2">Secretaria</option>
								        </select>
					                </div>
                                    <!--crear elementos-->
                                    <div id='1' class='row'>
                                        <div class=" col s2 input-field"><select name="tipoProfesor" id="tipoProfesor"><option value="" disabled selected>Cargo</option><option value="profesor">Profesor</option><option value="director">Director</option></select></div>
                                        <div id='2'>
                                        <div class="col s2 input-field"><input id="carrera" name="carrera" type="text" class="validate"><label for="carrera">Carrera*</label></div>
                                        </div>                                        
                                    </div>
                                    <div id='3' class='row'>
                                        <div id="2" class=" col s2 input-field"><input id="fonoFijo" name="fonoFijo" type="text" class="validate"><label for="fonoFijo">Teléfono Fijo*</label></div>
                                    </div>
                                    <!---->
                                    <!--datos en comun-->
                                <div class='row'>
                                    <div class='col s3 offset-s2 input-field'>
                                        <input id='rut' name='rut' type='text' class='validate'>
                                        <label for='rut'>Rut *</label>
                                    </div>
                                </div>
                                <div class='row'>
					                <div class=" col s2 offset-s2 input-field">       
					                    <input id="nombre" name="nombre" type="text" class="validate">
					                    <label for="nombre">Nombre *</label>
					                </div>	
					                <div class=" col s2 input-field">       
					                    <input id="apaterno" name="apaterno" type="text" class="validate">
					                    <label for="apaterno">Apellido Paterno*</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="amaterno" name="amaterno" type="text" class="validate">
					                    <label for="amaterno">Apellido Materno*</label>
					                </div>
					           	</div>
					           	<div class="row">
					                <div class=" col s2 offset-s2 input-field">       
					                    <input id="password" name="password" type="password" class="validate">
					                    <label for="password">Contraseña *</label>
					                </div>					               
                                    <div class=" col s2 input-field">       
					                    <input id="correo" name="correo" type="email" class="validate">
					                    <label for="correo">Correo Electrónico *</label>
					                </div>
                                    <div class=" col s2 input-field">       
					                    <input id="facultad" name="facultad" type="text" class="validate">
					                    <label for="facultad">Facultad *</label>
					                </div>
					            </div>
					            <div class="row center">
						            <div class="col s2 offset-s6">
							            <button id="btn" class="btn right waves-effect waves-light color_primario"  type="submit" name="action">Registrar
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
            $('#3').hide();
            $('#1').hide();
            $('#funcionario').on('change', function() {
                var tipoFunc = this.value ;
                if(tipoFunc==1){
                    $('#3').hide();
                    $('#1').show();
                }
                $('#tipoProfesor').material_select();
                if(tipoFunc==2){
                    $('#1').hide();
                    $('#3').show();
                }
            });
		</script>
		<?php
		require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>