<?php
	$title = "Competencias";
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
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Competencia: <?php echo $this->data['competencia']->getNomComp(); ?></h4></strong></span>
				        </div>
			            <div class="card-content">
			            <form id="myForm" action="mallas.php?result=nueva" method="POST">
					       	<div class="row">
					       		<div class="col s9">
					            <div class="card teal darken-3 white-text">
					            	<div class="card-content">
					            	<div class="row">
						            	<div class="col s4">
						            		<div class="row">
						            			<div class="col s12">
						            				<h6>Nivel Básico:</h6>
						            				<p style="text-align: justify;">
						            				<?php echo $this->data['basico']->getDescripcion(); ?>
						            				</p>
						            			</div>
								            </div>
							            </div>
							            <div class="col s4">
						            		<div class="row">
						            			<div class="col s12">
						            				<h6>Nivel Medio:</h6>
						            				<p style="text-align: justify;">
						            				<?php echo $this->data['medio']->getDescripcion(); ?>
						            				</p>
						            			</div>
								            </div>
							            </div>
							            <div class="col s4">
						            		<div class="row">
						            			<div class="col s12">
						            				<h6>Nivel Avanzado:</h6>
						            				<p style="text-align: justify;">
						            				<?php echo $this->data['avanzado']->getDescripcion(); ?>
						            				</p>
						            			</div>							            		
								            </div>
							            </div>
							        </div>
							        </div>
							    </div>
							    </div>
					            <div class="col s3">
					            	<div class="row">
						            	<div class="col s12">
								            <button id="btn" style="margin-top: 20px;" class="btn-large center waves-effect waves-light color_primario"  type="submit" name="action">Asignar
								            <i class="material-icons right">send</i>
								            </button>
						            	</div>
						            </div>
					            </div>
						       </div>	
					           <div class="row">
								  <div id="admin" class="col s12">
								    <div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Asignaturas a asociar</span>
								        <div class="actions">
								          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
								        </div>
								      </div>
								      <table id="data">
									        <thead>
									          <tr>
									            <th style="width: 250px">Nombre</th>
									            <th class="no-padding" style="width: 100px">Código</th>
									            <th class="no-padding" style="width: 20px">Nivel</th>
									            <th class="center no-padding" style="width: 150px">Estado</th>
									          	<th class="center no-padding" style="width: 70px">Niveles</th>
									          	<th class="center no-padding" style="width: 70px"></th>
									          	<th class="center no-padding" style="width: 90px;"></th>
									          </tr>
									        </thead>
									        <tbody>
									        <?php 
										        if(!empty($this->data['asignaturas'])){
										        foreach ($this->data['asignaturas'] as $asignatura) {
										        	echo '<tr>';
										        	echo '<td>'.$asignatura->getNombre().'</td>';
								    	    		echo '<td class="no-padding">'.$asignatura->getCodigo().'</td>';
								    	    		echo '<td class="no-padding">'.$asignatura->getNivel().'</td>';
								        			?>	
								    	    		<td class="center no-padding">
											      	<div class="switch">
											       	<label>
											       	Quitar
												    <input name="<?php echo $asignatura->getId(); ?>" type="checkbox">
												    <span class="lever"></span>
												    Agregar
												    </label>
												  </div>											     
												</td>
												<td class="center no-padding">
													<input name="<?php echo $asignatura->getId(); ?>" type="radio" id="basico_<?php echo $asignatura->getId(); ?>" /> 
													<label for="basico_<?php echo $asignatura->getId(); ?>">Básico</label>  
												</td>
												<td class="center no-padding">
													<input name="<?php echo $asignatura->getId(); ?>" type="radio" id="medio_<?php echo $asignatura->getId(); ?>" /> 
													<label for="medio_<?php echo $asignatura->getId(); ?>">Medio</label>  
												</td>
												<td class="center no-padding">
													<input name="<?php echo $asignatura->getId(); ?>" type="radio" id="avanzado_<?php echo $asignatura->getId(); ?>" /> 
													<label for="avanzado_<?php echo $asignatura->getId(); ?>">Avanzado</label>
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