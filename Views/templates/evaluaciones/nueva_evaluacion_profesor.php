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
					        	<h5><strong>
					        		Alumno: <?php echo 	$this->data['alumno']->getNombre() . ' ' .
					        							$this->data['alumno']->getApaterno() . ' ' .
					        							$this->data['alumno']->getAmaterno();  ?>
					        	</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s10 offset-s1">
					        	<h5><strong>Rut: <?php echo $this->data['alumno']->getRut(); ?></strong></h5>
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
					        <div class="row center">
					        <div class="col s10 offset-s1">

				       		  <table>

						        <thead>
						          <tr>
						              <th style="width:20%;" data-field="id">Competencia</th>
						              <th class="center" style="width:17%;" data-field="name">Evaluación externa</th>
						              <th class="center" style="width:17%;" data-field="price">Evaluación academica</th>
						              <th style="width:46%;" data-field="price">Observaciones</th>
						          </tr>
						        </thead>

						        <tbody>
						        <?php
						        foreach ($this->data['competencias'] as $competencia) {
						        	echo '<tr>';

						        	echo '<td style="text-align: justify;">';
						        	echo '<h6><strong>' . $competencia->getNomComp() . '</strong></h6>';
						        	echo $competencia->getDesComp();
						        	echo '</td>';

						        	echo '<td><input name="em" type="text" value="Bueno"><label for="em">Evaluación empleador</label></td>';

						        	echo '</tr>';
						        }
						          <tr>
						            
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
						            <td>
						            	 <div class=" col s12 input-field">      
						                    <textarea id="observacion" name="basico" class="materialize-textarea" length="1000"></textarea>
		        							<label for="observacion">Observación</label>
						                </div> 
						            </td>
						          </tr>
						          ?>
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