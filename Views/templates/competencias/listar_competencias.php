<?php
	$title = "Competencias";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
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
				            <strong><h4 class="left"><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Lista de competencias</h4></strong>
				            </span>
				        </div>
			            <div class="card-content">     
							<div class="row">
							  <div id="admin" class="col s8 offset-s2">
							    <div class="card material-table">
							      <div class="table-header">
							        <span class="table-title">Competencias</span>
							        <div class="actions">						<a href="competencias.php?action=nueva" class="modal-trigger waves-effect btn-flat nopadding"><i class="    material-icons right">add_circle</i>Crear competencia</a>		        
							          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
							        </div>
							      </div>
							      	<table id="datatable">
								        <thead>
								          <tr>
								            <th>Nombre</th>
								            <th class="no-padding" style="width: 100px">Categoria</th>
								            <th class="center no-padding" style="width: 60px">Modificar</th>
								            <th class="center no-padding" style="width: 60">Eliminar</th>
								          </tr>
								        </thead>
								        <tbody>
								        <?php 
								        if(!empty($this->data['competencias'])){
								        foreach ($this->data['competencias'] as $key) {
								        	echo '<tr>';
								        	echo '<td>'.$key->getNomComp().'</td>';
								    	    echo '<td class="no-padding">'.$key->getCate().'</td>';
								    	    ?>
								            <td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Modificar" href="competencias.php?result=consultar&param=<?php echo $key->getIdComp(); ?>"><i class="material-icons color_primario white-text">edit</i></a>
											</td>
											<td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light red  tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar" href="competencias.php?result=eliminar&param=<?php echo $key->getIdComp(); ?>"><i class="material-icons  white-text">clear</i></a>
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