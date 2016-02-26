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
				            <span class="card-title"><strong><h4>Lista de asignaturas</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="#" method="GET">	      
								<div class="row">
								  <div id="admin" class="col s10 offset-s1">
								    <div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Asignaturas</span>
								        <div class="actions">								        
								          	<a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
								        </div>
								      </div>
								      	<table id="datatable">
									        <thead>
									          <tr>
									            <th>Nombre</th>
									            <th>Código</th>
									            <th>Nivel</th>
									            <th>Modificar</th>
									            <th>Eliminar</th>
									          </tr>
									        </thead>
									        <tbody>
									          <tr>
									            <td>Inteligencia de tu poto</td>
									            <td>IC101</td>
									            <td>2</td>
									            <td>
									            	<a class="btn-floating waves-effect waves-light"><i class="material-icons color_primario">edit</i></a>
												</td>
												<td>
									            	<a class="btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a>
												</td>
									          </tr>
									          <tr>
									            <td>Gneración de tu poto2</td>
									            <td>IC104</td>
									            <td>4</td>
									            <td>
									            	<a class="btn-floating waves-effect waves-light color_primario"><i class="material-icons">edit</i></a>
												</td>
												<td>
									            	<a class="btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a>
												</td>
									          </tr>
									          <tr>
									            <td>Programación de tu poto3</td>
									            <td>IC114</td>
									            <td>1</td>
									            <td>
									            	<a class="btn-floating waves-effect waves-light color_primario"><i class="material-icons">edit</i></a>
												</td>
												<td>
									            	<a class="btn-floating waves-effect waves-light red"><i class="material-icons">clear</i></a>
												</td>
									          </tr>
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