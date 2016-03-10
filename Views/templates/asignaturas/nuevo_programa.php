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
				            <strong><h4 class="left"><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Nuevo programa</h4></strong>
				            </span>
				        </div>
			            <div class="card-content">     
							<div class="row">
					        <div class="col s12">
					        <div class="card">
					        <div class="card-content"> 
					        <form id="myForm" action="evaluaciones.php?result=nueva-empleador" method="POST">
					        <div class="row center">
					        <div class="col s12">
					        <img style="height: 120px; width: 360px;"src="<?php echo RESOURCES_DIR.'img/unap.png';?>">
					        </div>
					        </div>
					        <div class="row center">
					        <div class="col s12">
					        	<h4><strong>PROGRAMA DE ASIGNATURA</strong></h4>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s1 offset-s1">
					        <h5><strong>1.</strong></h5>
					        </div>
					        <div class="col s10">
					        	<h5><strong>IDENTIFICACION</strong></h5>
					        </div>
					        </div>
					       	<div class="row">
				                <div class=" col s4 offset-s2 input-field">       
				                    <input id="facultad" name="facultad" type="text" class="validate">
				                    <label for="facultad">Facultad *</label>
				                </div>	
				                <div class=" col s4 input-field">       
				                    <input id="carrera" name="carrera" type="text" class="validate">
				                    <label for="carrera">Carrera *</label>
				                </div>
					        </div>
					        <div class="row">
				                <div class=" col s4 offset-s2 input-field">       
				                    <input id="requisito" name="requisito" type="text" class="validate">
				                    <label for="requisito">Requisito *</label>
				                </div>	
				                <div class=" col s4 input-field">       
				                    <input id="horas_teoricas" name="horas_teoricas" type="text" class="validate">
				                    <label for="horas_teoricas">Horas teóricas *</label>
				                </div>	
					        </div>
					        <div class="row">
				                <div class=" col s4 offset-s2 input-field">       
				                    <input id="horas_lab" name="horas_lab" type="text" class="validate">
				                    <label for="horas_lab">Horas de laboratorio *</label>
				                </div>	
				                <div class=" col s4 input-field">       
				                    <input id="horas_ayudantia" name="horas_ayudantia" type="text" class="validate">
				                    <label for="horas_ayudantia">Horas de ayudantia *</label>
				                </div>
					        </div>
					        <div class="row">
					        <div class="col s1 offset-s1">
					        <h5><strong>2.</strong></h5>
					        </div>
					        <div class="col s10">
					        	<h5><strong>DESCRIPCIÓN DEL CURSO</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s9 offset-s2">
					        	<div class=" col s12 input-field" style="margin-top: 0">      
						            <textarea id="departamento" name="departamento" class="materialize-textarea" length="1000"></textarea>
						        </div>					        </div>
					        </div>	
					        <div class="row">
					        <div class="col s1 offset-s1">
					        <h5><strong>3.</strong></h5>
					        </div>
					        <div class="col s10">
					        	<h5><strong>OBJETIVOS GENERALES DE LA ASIGNATURA</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s9 offset-s2">
					        	<div class=" col s12 input-field" style="margin-top: 0">      
						            <textarea id="departamento" name="departamento" class="materialize-textarea" length="1000"></textarea>
						        </div>					        </div>
					        </div>
					        <div class="row">
					        <div class="col s1 offset-s1">
					        <h5><strong>4.</strong></h5>
					        </div>
					        <div class="col s10">
					        	<h5><strong>UNIDADES</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s8 offset-s2">
					        	<div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Unidades</span>
								        <div class="actions">					
								        	<a href="asignaturas.php?action=nueva-unidad" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear unidad</a>	    
								        </div>
								      </div>
								      	<table id="" class="tabla">
									        <thead>
									          <tr>
									            <th>Nombre</th>
									            <th class="no-padding" style="width: 20%">Cantidad de items</th>
									            <th class="center no-padding" style="width: 60px">Modificar</th>
								            	<th class="center no-padding" style="width: 60px">Eliminar</th>
									          </tr>
									        </thead>
									        <tbody>
									        <?php 
										        if(!empty($this->data['asignaturas'])){
										        foreach ($this->data['asignaturas'] as $asignatura) {
										        	echo '<tr>';
										        	echo '<td>'.$asignatura->getNombre().'</td>';
								    	    		echo '<td class="no-padding">'.$asignatura->getCodigo().'</td>';
								        	?>								        	
									            <td class="center no-padding">
									            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Modificar" href="asignaturas.php?result=consultar-unidad&param=<?php echo $asignatura->getId(); ?>"><i class="material-icons color_primario white-text">edit</i></a>
												</td>
												<td class="center no-padding">
									            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar" href="asignaturas.php?result=eliminar-unidad&param=<?php echo $asignatura->getId(); ?>"><i class="material-icons red white-text">clear</i></a>
												</td>
									          </tr>
								          	<?php }} ?>									          
								        	</tbody>
							      		</table>
							    	</div>
							</div>
							</div>
					        <div class="row">
					        <div class="col s1 offset-s1">
					        <h5><strong>5.</strong></h5>
					        </div>
					        <div class="col s10">
					        	<h5><strong>METODOLOGÍA</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s9 offset-s2">
					        	<div class=" col s12 input-field" style="margin-top: 0">      
						            <textarea id="departamento" name="departamento" class="materialize-textarea" length="1000"></textarea>
						        </div>					        </div>
					        </div>
					        <div class="row">
					        <div class="col s1 offset-s1">
					        <h5><strong>6.</strong></h5>
					        </div>
					        <div class="col s10">
					        	<h5><strong>EVALUACIÓN</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s9 offset-s2">
					        	<div class=" col s12 input-field" style="margin-top: 0">      
						            <textarea id="departamento" name="departamento" class="materialize-textarea" length="1000"></textarea>
						        </div>					        </div>
					        </div>
					        <div class="row">
					        <div class="col s1 offset-s1">
					        <h5><strong>7.</strong></h5>
					        </div>
					        <div class="col s10">
					        	<h5><strong>BIBLIOGRAFÍA</strong></h5>
					        </div>
					        </div>
					        <div class="row">
					        <div class="col s8 offset-s2">
					        	<div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Bibliografia</span>
								        <div class="actions">					
								        	<a href="asignaturas.php?action=nueva-unidad" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear bibliografia</a>	    
								        </div>
								      </div>
								      	<table id="" class="tabla">
									        <thead>
									          <tr>
									            <th>Nombre</th>
									            <th class="no-padding" style="width: 20%">Cantidad de items</th>
									            <th class="center no-padding" style="width: 60px">Modificar</th>
								            	<th class="center no-padding" style="width: 60px">Eliminar</th>
									          </tr>
									        </thead>
									        <tbody>
									        <?php 
										        if(!empty($this->data['asignaturas'])){
										        foreach ($this->data['asignaturas'] as $asignatura) {
										        	echo '<tr>';
										        	echo '<td>'.$asignatura->getNombre().'</td>';
								    	    		echo '<td class="no-padding">'.$asignatura->getCodigo().'</td>';
								        	?>								        	
									            <td class="center no-padding">
									            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Modificar" href="asignaturas.php?result=consultar-unidad&param=<?php echo $asignatura->getId(); ?>"><i class="material-icons color_primario white-text">edit</i></a>
												</td>
												<td class="center no-padding">
									            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar" href="asignaturas.php?result=eliminar-unidad&param=<?php echo $asignatura->getId(); ?>"><i class="material-icons red white-text">clear</i></a>
												</td>
									          </tr>
								          	<?php }} ?>									          
								        	</tbody>
							      		</table>
							    	</div>
							</div>
							</div>			        					        
					        <div class="row">	
					        <div class="col s2 offset-s5">
					        	<button class="btn btn-large waves-effect waves-light color_primario" type="submit" form="login" name="action">Ingresar</button>
					        </div>
					        </div>
					        </form>
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
	?>
	<script>
	$(document).ready(function() {
    $('table.tabla').DataTable( {
    	"sSearchPlaceholder": "Ingrese palabra clave",
        "paging":   false,
        "info":     false
    } );
	} );
	</script>
	<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>