<?php
	$title = "Evaluaciones";
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
							  	<div class="card">
							  		<div class="card-content">
							  			<div class="row">
							  				<div class="col s4">

							  				</div>
							  			</div>
							  		</div>
							  	</div>
							    <div class="card material-table">
							      <div class="table-header">
							        <span class="table-title">Lista de evaluaciones</span>
							        <div class="actions">	
							       		<a href="evaluaciones.php?action=nueva-empleador" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear evaluación</a>	
							          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
							        </div>
							      </div>
							      	<table id="datatable">
								        <thead>
								          <tr>
                                            <th style="width: 100px;">Nivel</th>	
								            <th class="no-padding" style="width: 100px;">Estado</th>
								            <th class="no-padding" style="width: 100px;">Fecha inicio</th>
								            <th class="no-padding" style="width: 100px;">Fecha Termino</th>
                                            <th class="no-padding" style="width: 100px;">Duración</th>
								            <th class="no-padding" style="width: 60px;">Intento</th>
								            <th class="center no-padding" style="width: 60px">Ver</th>
								          </tr>
								        </thead>
								        <tbody>
								        <?php 
								        if(!empty($this->data['evaluaciones'])){
								        foreach ($this->data['evaluaciones'] as $evaluacion) {
								        	echo '<tr>';
								        	echo '<td>'.$evaluacion->getIdEvaluacion().'</td>';
								    	    echo '<td class="no-padding">'.$evaluacion->getEstado().'</td>';
								    	    echo '<td class="no-padding">'.$evaluacion->getFechaEntrega().'</td>';
								    	    echo '<td class="no-padding">'.$evaluacion->getResultado().'</td>';
                                            echo '<td class="no-padding">'.$evaluacion->getHoras().'</td>';
                                            echo '<td class="no-padding">'.$evaluacion->getIntento().'</td>';
								    	    ?>
								            <td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Ver alumno" href="evaluacions.php?action=ver&param=<?php echo $evaluacion->getIdEvaluacion(); ?>"><i class="mdi mdi-eye white-text right"></i></a>
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