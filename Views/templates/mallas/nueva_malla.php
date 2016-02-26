<?php
	$title = "Mallas";
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
				            <span class="card-title"><strong><h4>Ingrese una nueva malla</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="#" method="POST">
					            <div class="row center-align">
					                <div class=" col s2 offset-s3 input-field">
					                    <input id="codigo" name="codigo" type="text" class="validate">
					                    <label for="codigo">Codigo *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="plan" name="plan" type="text" class="validate">
					                    <label for="plan">Plan *</label>
					                </div>
								    <div class="col s2">
							            <button id="btn" class="btn-large right waves-effect waves-light color_primario"  type="submit" name="action">Ingresar
							            <i class="material-icons right">send</i>
							            </button>
						            </div>
					            </div>
								<div class="row">
								  <div id="admin" class="col s6 offset-s3">
								    <div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Asignaturas</span>
								        <div class="actions">
								          <a href="#" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear Asignatura</a>
								          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
								        </div>
								      </div>
								      	<table id="datatable">
									        <thead>
									          <tr>
									            <th>Nombre</th>
									            <th>Código</th>
									            <th>Estado</th>
									          </tr>
									        </thead>
									        <tbody>
									          <tr>
									            <td>Evaluacion de tu poto</td>
									            <td>IC105</td>
									            <td><div class="switch">
												    <label>
												      Quitar
												      <input type="checkbox">
												      <span class="lever"></span>
												      Agregar
												    </label>
												  </div>
												</td>
									          </tr>
									          <tr>
									            <td>Generacion de tu poto</td>
									            <td>IC104</td>
									            <td><div class="switch">
												    <label>
												      Quitar
												      <input type="checkbox">
												      <span class="lever"></span>
												      Agregar
												    </label>
												  </div>
												</td>
									          </tr>
									          <tr>
									            <td>Inteligencia de tu poto</td>
									            <td>IC101</td>
									            <td><div class="switch">
												    <label>
												      Quitar
												      <input type="checkbox">
												      <span class="lever"></span>
												      Agregar
												    </label>
												  </div>
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