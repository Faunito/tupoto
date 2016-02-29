<?php
	$title = "Mallas";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Mallas</h4></strong></span>
				        </div>
			            <div class="card-content">
			                <form id="myForm" action="#" method="POST">
					           <div class="row">
								  <div id="admin" class="col s8 offset-s2">
								    <div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Mallas</span>
								        <div class="actions">
								          <a href="mallas.php?action=nueva" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear Malla</a>
								          <a href="asignaturas.php?action=ver-asignatura" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Listar Asignatura</a>
								          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
								        </div>
								      </div>
								      	<table id="datatable">
									        <thead>
								          <tr>
								            <th>Codigo</th>
								            <th>Plan</th>
								            <th>Niveles</th>
								            <th class="center" style="width: 80px">Modificar</th>
								            <th class="center" style="width: 90px">Eliminar</th>
								            <th class="center" style="width: 200px">Asignar asignaturas</th>
								          </tr>
								        </thead>
								        <tbody>
								        <?php 
								        if(!empty($lista)){
								        foreach ($lista as $key) {
								        	echo '<tr>';
								        	echo '<td>'.$key->getCodCarrera().'</td>';
								    	    echo '<td>'.$key->getPlan().'</td>';
								    	    echo '<td>'.$key->getNiveles().'</td>';
								    	    ?>
								            <td class="center">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Modificar" href="mallas.php?result=consultar&param=<?php echo $key->getIdMalla(); ?>"><i class="material-icons color_primario white-text">edit</i></a>
											</td>
											<td class="center">
								            	<a class="btn-floating waves-effect waves-light red  tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar" href="mallas.php?result=eliminar&param=<?php echo $key->getIdMalla(); ?>"><i class="material-icons  white-text">clear</i></a>
											</td>
											<td class="center">
								            	<a class="btn-floating waves-effect waves-light red  tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar" href="mallas.php?result=modificar&param=<?php echo $key->getIdMalla(); ?>"><i class="mdi mdi-folder-move"></i></a>
											</td>
								          </tr>
								          <?php }} ?>
							        	</tbody>
							      		</table>
							    	</div>
							    </div>
							</div>
					       </form>
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