<?php
	$title = "Usuarios";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">
			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Lista de usuarios</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="#" method="GET">	      
								<div class="row">
								  <div id="admin" class="col s6 offset-s3">
								    <div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Usuarios</span>
								        <div class="actions">	
								        	<a href="usuarios.php?action=nuevo" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Registrar Usuario</a>	
								          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
								        </div>
								      </div>
								      	<table id="datatable">
									        <thead>
									          <tr>
									            <th class="no-padding" style="width: 80px">Nombre</th>
									            <th class="no-padding" style="width: 80px">Email</th>
									            <th class="no-padding" style="width: 80px">Facultad</th>
                                                <th class="no-padding" style="width: 80px">Modificar</th>
                                                <th class="no-padding" style="width: 80px">Eliminar</th>
									          </tr>
									        </thead>
									        <tbody>
									        <?php 
										        if(!empty($this->data['usuarios'])){
										        foreach ($this->data['usuarios'] as $usuario) {
										        	echo '<tr>';
										        	echo '<td>'.$usuario->getNombre().' '.$usuario->getApaterno().' '.$usuario->getAmaterno().'</td>';
								    	    		echo '<td class="no-padding">'.$usuario->getEmail().'</td>';
								    	    		echo '<td class="no-padding">'.$usuario->getFacultad().'</td>';
								        		?>								        	
									          	<td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Modificar" href="usuarios.php?action=modificar&param=<?php echo $usuario->getRut(); ?>"><i class="mdi mdi-file-document white-text right"></i></a>
												</td>
                                                <td class="center no-padding">
								            	<a class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar" href="usuarios.php?action=eliminar&param=<?php echo $usuario->getRut(); ?>"><i class="mdi mdi-eye white-text right"></i></a>
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
		require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
		require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>