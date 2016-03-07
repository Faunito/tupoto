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
				            <strong><h4 class="left"><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a><?php echo $this->data['alumno']->getNombre().' ';
				            	  echo $this->data['alumno']->getApaterno().' ';
				            	  echo $this->data['alumno']->getAmaterno(); ?> </h4></strong>
				            </span>
				        </div>
			            <div class="card-content">     
							<div class="row">
							  <div id="admin" class="col s10 offset-s1">
							  	<h6 style="text-align: left; font-size:20px; ">Rut: <?php echo $this->data['alumno']->getRut(); ?></h6>
							  	<h6 style="text-align: left; font-size:20px; margin-bottom: 20px;">Carrera: <?php echo $this->data['alumno']->getCarrera();?></h6>
							    <div class="card material-table">
							      <div class="table-header">
							        <span class="table-title">Lista de prácticas</span>
							        <div class="actions">				
							          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
							        </div>
							      </div>
							      	<table id="datatable">
								        <thead>
								          <tr>
								            <th style="width: 60px;">Id</th>
								            <th class="no-padding" style="width: 100px;">Estado</th>
								            <th class="no-padding" style="width: 100px;">Fecha inicio</th>
								            <th class="no-padding" style="width: 100px;">Fecha Termino</th>
								            <th class="no-padding" style="width: 60px;">Intento</th>
								            <th class="center no-padding" style="width: 60px;">Evaluaciones</th>
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