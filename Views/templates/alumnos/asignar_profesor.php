<?php
	$title = "Profesores";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
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
				            <span class="card-title">
				            <strong><h4 class="left"><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Asignar profesor a <?php echo $this->data['alumno']->getNombre().' '.$this->data['alumno']->getApaterno().' '.$this->data['alumno']->getAmaterno();?></h4></strong>
				            </span>
				        </div>
			            <div class="card-content">  
						  <form id="myForm" action="alumnos.php?result=asignar-profesor&param=<?php echo $this->data['alumno']->getRut(); ?>" method="POST"> 
						  <div class="row">
							<div class="col s2 offset-s5">
					        	<button class="btn btn-large waves-effect waves-light color_primario" type="submit" form="myForm" name="action">Asignar</button>
					        </div>
							</div> 
							<div class="row">
							  <div id="admin" class="col s8 offset-s2">
							    <div class="card material-table">
							      <div class="table-header">
							        <span class="table-title">Profesores</span>
							        <div class="actions">				
							          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
							        </div>
							      </div>
							      	<table id="data">
								        <thead>
								          <tr>
								            <th style="width: 120px;">Rut</th>
								            <th class="no-padding">Nombre</th>
								            <th class="no-padding">Apellido paterno</th>
								            <th class="no-padding">Apellido materno</th>
								            <th class="center no-padding" style="width: 120px;">Asignar</th>
								          </tr>
								        </thead>
								        <tbody>
								        <?php 
								        if(!empty($this->data['profesores'])){
								        foreach ($this->data['profesores'] as $persona) {
								        	echo '<tr>';
								        	echo '<td>'.$persona->getRut().'</td>';
								    	    echo '<td class="no-padding">'.$persona->getNombre().'</td>';
								    	    echo '<td class="no-padding">'.$persona->getApaterno().'</td>';
								    	    echo '<td class="no-padding">'.$persona->getAmaterno().'</td>';
								    	    ?>
											<td class="center no-padding">
								            	<p>
											      <input type="checkbox" name="<?php echo $persona->getRut(); ?>" id="asignar_<?php echo $persona->getRut(); ?>" />
											      <label for="asignar_<?php echo $persona->getRut(); ?>">Asignar</label>
											    </p>
											</td>
								          </tr>
								          <?php }} ?>
							        	</tbody>
						      		</table>
						      		</form>
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
    $('#data').DataTable( {
    	"sSearchPlaceholder": "Ingrese palabra clave",
        "paging":   false,
        "info":     false
    } );
	} );
	</script>
<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>