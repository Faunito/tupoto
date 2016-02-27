<?php
	$title = "Asignaturas";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center" style="margin-top:100px;">
		        <div class="col s12 m12">
		          	<div class="card  hoverable">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="<?php echo ROUTES_DIR.'asignaturas.php';?>"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Lista de asignaturas</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="#" method="GET">	      
								<div class="row">
								  <div id="admin" class="col s8 offset-s2">
								    <div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Asignaturas</span>
								        <div class="actions">					<a href="asignaturas.php?action=nueva-asignatura" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear asignatura</a>	        
								          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
								        </div>
								      </div>
								      	<table id="datatable">
									        <thead>
									          <tr>
									            <th>Nombre</th>
									            <th style="width: 140px">Código</th>
									            <th style="width: 120px">Nivel</th>
									            <th class="center" style="width: 120px">Modificar</th>
								            <th class="center" style="width: 80">Eliminar</th>
									          </tr>
									        </thead>
									        <tbody>
									        <?php 
										        if(!empty($asignaturas)){
										        foreach ($asignaturas as $asignatura) {
										        	echo '<tr>';
										        	echo '<td>'.$asignatura->getNombre().'</td>';
								    	    		echo '<td>'.$asignatura->getCodigo().'</td>';
								    	    		echo '<td>'.$asignatura->getNivel().'</td>';
								        	?>
									            <td class="center">
									            	<a class="btn-floating waves-effect waves-light" href="asignaturas.php?result=consultar&param=<?php echo $asignatura->getId(); ?>"><i class="material-icons color_primario white-text">edit</i></a>
												</td>
												<td class="center">
									            	<a class="btn-floating waves-effect waves-light red" href="asignaturas.php?result=eliminar&param=<?php echo $asignatura->getId(); ?>"><i class="material-icons white-text">clear</i></a>
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