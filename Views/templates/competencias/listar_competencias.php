<?php
	$title = "Competencias";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center" style="margin-top:100px;">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4>Lista de competencias</h4></strong></span>
				        </div>
			            <div class="card-content">     
							<div class="row">
							  <div id="admin" class="col s10 offset-s1">
							    <div class="card material-table">
							      <div class="table-header">
							        <span class="table-title">Competencias</span>
							        <div class="actions">								        
							          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
							        </div>
							      </div>
							      	<table id="datatable">
								        <thead>
								          <tr>
								            <th>Nombre</th>
								            <th>Categoria</th>
								            <th>Modificar</th>
								            <th>Eliminar</th>
								          </tr>
								        </thead>
								        <tbody>
								        <?php 
								        foreach ($lista as $key) {
								        	echo '<tr>';
								        	echo '<td>'.$key->getNomComp().'</td>';
								    	    echo '<td>'.$key->getCate().'</td>';
								    	    ?>
								            <td>
								            	<a class="btn-floating waves-effect waves-light" href="competencias.php?result=modificar&param=<?php echo $key->getIdComp(); ?>"><i class="material-icons color_primario">edit</i></a>
											</td>
											<td>
								            	<a class="btn-floating waves-effect waves-light red" href="competencias.php?result=modificar&param=<?php echo $key->getIdComp(); ?>"><i class="material-icons">clear</i></a>
											</td>
								          </tr>
								          <?php } ?>
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
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>