<?php
	$title = "Alumnos";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Alumno.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title">
				            <strong><h4 class="left"><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Lista de alumnos</h4></strong>
				            </span>
				        </div>
			            <div class="card-content">     
							<div class="row">
							  <div id="admin" class="col s10 offset-s1">
							    <div class="card material-table">
							      <div class="table-header">
							        <span class="table-title">Alumnos</span>
							        <div class="actions">	
							      		<a href="alumnos.php?action=nuevo" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Ingresar Alumno</a>			
							          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
							        </div>
							      </div>
							      	<table id="datatable">
								        <thead>
								          <tr>
								            <th style="width: 120px;">Rut</th>
								            <th class="no-padding">Nombre</th>
								            <th class="no-padding">Apellido paterno</th>
								            <th class="no-padding">Apellido materno</th>
								            <th class="center no-padding" style="width: 60px;">Práctica</th>
								            <th class="center no-padding" style="width: 60px;">Ver</th>
								            <th class="center no-padding" style="width: 60px;">Modificar</th>
								            <th class="center no-padding" style="width: 60px;">Eliminar</th>
								          </tr>
								        </thead>
								        <tbody>
								        <?php 
								        if(!empty($this->data['alumnos'])){
								        foreach ($this->data['alumnos'] as $persona) {
								        	echo '<tr>';
								        	echo '<td>'.$persona->getRut().'</td>';
								    	    echo '<td class="no-padding">'.$persona->getNombre().'</td>';
								    	    echo '<td class="no-padding">'.$persona->getApaterno().'</td>';
								    	    echo '<td class="no-padding">'.$persona->getAmaterno().'</td>';
								    	    ?>
								    	    <td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Ingresar práctica" href="practicas.php?action=nueva&param=<?php echo $persona->getRut(); ?>"><i class="material-icons orange white-text">note_add</i></a>
											</td>
								    	    <td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Ver alumno" href="alumnos.php?action=ver&param=<?php echo $persona->getRut(); ?>"><i class="mdi mdi-eye white-text right"></i></a>
											</td>
								            <td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Modificar" href="alumnos.php?action=modificar&param=<?php echo $persona->getRut(); ?>"><i class="material-icons color_primario white-text">edit</i></a>
											</td>
											<td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light red  tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar" href="alumnos	.php?result=eliminar&param=<?php echo $persona->getRut(); ?>"><i class="material-icons  white-text">clear</i></a>
											</td>
								          </tr>
								          <?php }} ?>
							        	</tbody>
						      		</table>
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