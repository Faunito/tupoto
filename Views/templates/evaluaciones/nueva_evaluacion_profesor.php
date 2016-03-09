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
					        <div class="col s10 offset-s1">
					        	<h5><strong>Alumno:</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5><strong>Rut:</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5>Todos los factores propuestos a excepción del Nº 12, 13 y 14 deberán ser calificados como:</h5>
					        </div>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s10 offset-s1">
					        	<h5>BUENO – REGULAR – INSATISFACTORIO – NO APLICA</h5>
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s10 offset-s1">
				       		  <table>
						        <thead>
						          <tr>
						              <th style="width: 20%" data-field="id">Competencia</th>
						              <th style="width: 20%" data-field="name">Evaluación externa</th>
						              <th style="width: 20%" data-field="price">Evaluación academica</th>
						              <th style="width: 40%" data-field="price">Observaciones</th>
						          </tr>
						        </thead>
						        <!-- REVIAR LA ALINEACION VERTICAL DE LAS CELDAS -->	
						        <tbody>
						          <tr>
						            <td style="text-align: justify;">
						            	<h6><strong>Competencia 1:</strong></h6>
						            	bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla dsadsad bla bla bla bla bla bla bla bla bla bla 
						            </td>
						            <td>
						            	<!-- ESTO DEBE ESTAR DESHABILITADO PARA EL PROFESOR 
						            		 Y DEBE MOSTRAR LOS VALORES DE LA EVALUACIÓN DEL EMPLEADOR-->
						            	<select name="evaluacion_empleador" disabled>
								      	<option value="" disabled selected>Evaluar</option>
								      	<option value="Bueno">Bueno</option>
								    	<option value="Regular">Regular</option>
								    	<option value="Insatisfactorio">Insatisfactorio</option>	
								    	<option value="No aplica">No aplica</option>	   
								    	</select>
						            </td>
						            <td>
						            	<select name="evaluacion_profesor">
								      	<option value="" disabled selected>Evaluar</option>
								      	<option value="Bueno">Bueno</option>
								    	<option value="Regular">Regular</option>
								    	<option value="Insatisfactorio">Insatisfactorio</option>	
								    	<option value="No aplica">No aplica</option>	   
								    	</select>
						            </td>
						            <td style="text-align: justify;">
						            	observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones observaciones 
						            </td>
						          </tr>
						        </tbody>
						      </table>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5><strong>¿DE ACUERDO AL TRABAJO DESARROLLADO POR EL ALUMNO, USTED APRUEBA O RECHAZA LA PRÁCTICA?</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s2 offset-s2">
					        	<p>
							      <input type="checkbox" id="test5" />
							      <label for="test5">APRUEBA</label>
							    </p>
							    <p> 
					        </div>
					       	<div class="col s2 offset-s4">
					        	<p>
							      <input type="checkbox" id="test5" />
							      <label for="test5">RECHAZA</label>
							    </p>
							    <p> 
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s4 offset-s7">
					        	<h6>Fecha dsadsadsadsadsad</h6>
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