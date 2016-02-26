<?php
	$title = "Competencias";
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
				            <span class="card-title"><strong><h4>Lista de competencias</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="#" method="GET">	      
								<div class="row">
								  <div id="admin" class="col s6 offset-s3">
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
									            <th>Código</th>
									            <th>Modificar</th>
									            <th>Eliminar</th>
									          </tr>
									        </thead>
									        <tbody>
									          <tr>
									            <td>Competencia de tu poto</td>
									            <td>1545</td>
									            <td>
									            	<a class="btn-floating btn-large waves-effect waves-light color_primario"><i class="material-icons">edit</i></a>
												</td>
												<td>
									            	<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></a>
												</td>
									          </tr>
									          <tr>
									            <td>Competencia de tu poto2</td>
									            <td>6262</td>
									            <td>
									            	<a class="btn-floating btn-large waves-effect waves-light color_primario"><i class="material-icons">edit</i></a>
												</td>
												<td>
									            	<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></a>
												</td>
									          </tr>
									          <tr>
									            <td>Competencia de tu poto3</td>
									            <td>2144</td>
									            <td>
									            	<a class="btn-floating btn-large waves-effect waves-light color_primario"><i class="material-icons">edit</i></a>
												</td>
												<td>
									            	<a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></a>
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