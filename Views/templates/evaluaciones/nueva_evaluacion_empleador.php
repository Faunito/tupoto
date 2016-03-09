<?php
	$title = "Evaluaciones";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title">
				            <strong><h4 class="left"><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Nueva evaluación</h4></strong>
				            </span>
				        </div>
			            <div class="card-content">     
							<div class="row">
					        <div class="col s12">
					        <div class="card">
					        <div class="card-content"> 
					        <div class="row center">
					        <div class="col s4 offset-s4">
					        <img style="height: 160px; width: 320px;"src="<?php echo RESOURCES_DIR.'img/facultad.png';?>">
					        </div>
					        <div class="col s4">
					        <img style="height: 80px; width: 250px;"src="<?php echo RESOURCES_DIR.'img/unap.png';?>">
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s12">
					        	<h4><strong><U>CONFIDENCIAL</U></strong></h4>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s12">
					        	<h4><strong>FORMULARIO DE EVALUACIÓN DE PRÁCTICA I</strong></h4>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s10 offset-s1">
					        	<h5>INGENIERÍA CIVIL EN COMPUTACIÓN E INFORMÁTICA E INGENIERÍA EJECUCIÓN EN COMPUTACIÓN E INFORMÁTICA</h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s5 offset-s1">
					        	<h5><strong>Alumno:</strong></h5> <!-- LO TENEMOS -->
					        </div>
					        <div class="col s5">
					        	<h5><strong>Rut:</strong></h5> <!-- LO TENEMOS -->
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5><strong>Carrera:</strong></h5> <!-- LO TENEMOS -->
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s4 offset-s1" style="width: 27%">
					        	<h5><strong>Empresa o institución:</strong></h5> <!-- HAY QUE GUARDARLO -->
					        </div>												<!-- PARA EL EMPLEADOR -->
					        <div class="col s6 input-field no-padding" style="width: 53%; margin-top: 0; height: 30">
					       	<input id="telefono" name="telefono" type="text" class="validate">
					        </div>										         
					        </div>
					        <div class="row">				
					        <div class="col s10 offset-s1" style="width: 25%">
					        	<h5><strong>Nombre jefe directo:</strong></h5> <!--NO SE DONDE SE GUARDA-->
					        </div>
					        <div class="col s6 input-field no-padding" style="width: 55%; margin-top: 0; height: 30">
					       	<input id="telefono" name="telefono" type="text" class="validate">
					        </div>										         
					        </div>
					        <div class="row">
					        <div class="col s5 offset-s1">
					        	<h5><strong>Cargo:</strong></h5> <!--NO SE DONDE SE GUARDA-->
					        </div>
					        <div class="col s2" style="width: 12%"> 
					        <h5><strong>Telefono:</strong></h5> <!-- HAY QUE GUARDARLO -->
					        </div>								<!-- PARA EL EMPLEADOR -->
					        <div class="col s3 input-field no-padding" style="width: 25%; margin-top: 0; height: 30">
					        	<input id="telefono" name="telefono" type="text" class="validate">
					        </div>									
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5><strong>Dirección:</strong></h5> <!-- LO TENEMOS -->
					        </div>
					        </div>					        
					        <div class="row">
					        <div class="col s5 offset-s1">
					        	<h5><strong>Fecha de inicio:</strong></h5> <!-- LO TENEMOS -->
					        </div>
					        <div class="col s5">
					        	<h5><strong>Fecha de termino:</strong></h5> <!-- LO TENEMOS -->
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5><strong>Numero de horas:</strong></h5> <!-- LO TENEMOS -->
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1" style="text-align: justify;">
					        	<h5>
					        	Este formulario deberá ser llenado por la o las personas a cargo del estudiante en práctica y entregar en sobre sellado con timbre al alumno ó enviarlo a la Dirección de la Carrera de ICCI.
					        	</h5>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s10 offset-s1">
					        	<h5>Todos los factores deberán ser calificados como:</h5>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s10 offset-s1">
					        	<h6>BUENO – REGULAR – INSATISFACTORIO – NO APLICA</h6>
					        </div>
					        </div>
					        <div class="row"> <!-- REPETIR POR CADA COMPETENCIA -->
					        <div class="col s8 offset-s1">
					        	<h5><strong>1. COMPETENCIA 1:</strong></h5>
					        </div>
					        <div class="col s2">
						        <select name="evaluacion_competencia1">
							      	<option value="" disabled selected>Evaluar</option>
							      	<option value="Bueno">Bueno</option>
							    	<option value="Regular">Regular</option>
							    	<option value="Insatisfactorio">Insatisfactorio</option>	
							    	<option value="No aplica">No aplica</option>	   
						    	</select>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<p>
					        	descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok descripcion competencia 1 ok 
					        	</p>
					       	</div>
					        </div> <!-- HASTA ACA POR CADA COMPETENCIA-->
					        <div class="row" style="margin-bottom: 0">
					        <div class="col s10 offset-s1">
					        	<h5 style="margin-bottom: 0"><strong>DEPARTAMENTO O SECCIÓN  EN LAS CUALES DESARROLLO SU PRÁCTICA Y LABORES REALIZADAS:</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<div class=" col s12 input-field" style="margin-top: 0">      
						            <textarea id="departamento" name="departamento" class="materialize-textarea" length="1000"></textarea>
						        </div>					        </div>
					        </div>
					        <div class="row"  style="margin-bottom: 0">
					        <div class="col s10 offset-s1">
					        	<h5 style="margin-bottom: 0"><strong>OBSERVACIONES Y/O COMENTARIOS:</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<div class=" col s12 input-field" style="margin-top: 0">      
						            <textarea id="observacion" name="observacion" class="materialize-textarea" length="1000"></textarea>
						        </div>					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5><strong>¿DE ACUERDO AL TRABAJO DESARROLLADO POR EL ALUMNO, USTED APRUEBA O RECHAZA LA PRÁCTICA?</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s2 offset-s2">
					        	<p>
							      <input type="checkbox" id="aprueba" />
							      <label for="aprueba">APRUEBA</label>
							    </p>
							    <p> 
					        </div>
					       	<div class="col s2 offset-s4">
					        	<p>
							      <input type="checkbox" id="rechaza" />
							      <label for="rechaza">RECHAZA</label>
							    </p>
							    <p> 
					        </div>
					        </div>					        
					        <div class="row">	
					        <div class="col s2 offset-s5">
					        	<button class="btn btn-large waves-effect waves-light color_primario" type="submit" form="login" name="action">Ingresar</button>
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
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>