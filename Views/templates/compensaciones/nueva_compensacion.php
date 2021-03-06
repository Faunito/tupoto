<?php
	$title = "Asignar actividad de compensacion ";
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
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Competencia: <?php echo $this->data['competencia']->getNomComp(); ?></h4></strong></span>
				        </div>
			            <div class="card-content">
			            <form id="myForm" action="competencias.php?result=cambiar&param=<?php echo $this->data['competencia']->getIdComp(); ?>" method="POST">
					       	<div class="row">
					       		<div class="col s121">
					            <div class="card teal white-text" style="padding-top: 1px; padding-bottom: 10px">
					            <span class="card-title" ><strong><h4>Niveles</h4></strong></span>
					            	<div class="card-content" style="padding-top: 0px">
					            		<div class="contenedor">
					            			<div class="card red white-text elemento">
					            			<div class="card-content"> 
					            			<h6>Nivel Básico:</h6>
						            		<p style="text-align: justify;">
						            				<?php echo $this->data['basico']->getDescripcion(); ?>
						            		</p>
					            			</div>
					            			</div>
					            			<div class="card green white-text elemento">
					            			<div class="card-content"> 
					            			<h6>Nivel Medio:</h6>
						            		<p style="text-align: justify;">
						            				<?php echo $this->data['medio']->getDescripcion(); ?>
						            		</p>
					            			</div>
					            			</div>
					            			<div class="card blue white-text elemento">
					            			<div class="card-content"> 
					            			<h6>Nivel Avanzado:</h6>
						            		<p style="text-align: justify;">
						            				<?php echo $this->data['avanzado']->getDescripcion(); ?>					   </p>
					            			</div>
					            			</div>
					            		</div>
							        </div>
							    </div>
							    </div>
					            <div class="row">
						       </div>	
							       <div class="col s2 offset-s5">
						            	<div class="row">
							            	<div class="col s12">
									            <button id="btn" style="margin-top: 20px;" class="btn-large center waves-effect waves-light color_primario"  type="submit">Asignar
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
									            <th class="no-padding" style="width: 20px">Malla</th>
									            <th class="center no-padding" style="width: 150px">Estado</th>
									          	<th class="center" style="width: 100px;">Niveles</th>
									          </tr>
									        </thead>
									        <tbody>
									        <?php 
										        if(!empty($this->data['asignaturas'])){

										        for ($i=0; $i < $this->data['contador']; $i++) { 
										        	echo '<tr>';
										        	echo '<td>'.$this->data['asignaturas'][$i]->getNombre().'</td>';
								    	    		echo '<td class="no-padding">'.$this->data['asignaturas'][$i]->getCodigo().'</td>';
								    	    		echo '<td class="no-padding">'.$this->data['asignaturas'][$i]->getNivel().'</td>';
								    	    		echo '<td class="no-padding">'.$this->data['asignaturas'][$i]->getMalla().'</td>';
								        			?>	
								    	    		<td class="center no-padding">
											      	<div class="switch">
											       	<label>
											       	Quitar
												    <input name="<?php echo $this->data['asignaturas'][$i]->getId(); ?>" id="<?php echo $this->data['asignaturas'][$i]->getId(); ?>" type="checkbox"
												    <?php if($this->data['especificaciones'][$i]->getIdCompetencia() != null) echo 'checked'; ?> >
												    <span class="lever"></span>
												    Agregar
												    </label>
												  </div>											     
												</td>
												<td class="center" style="overflow: visible;">
												<select name="select_<?php echo $this->data['asignaturas'][$i]->getId(); ?>" id="select<?php echo $this->data['asignaturas'][$i]->getId(); ?>">
													<?php 
														switch ($this->data['especificaciones'][$i]->getNivelCompetencia()) {
															case 'Básico':																
														      	echo '<option value="">Ninguno</option>';
														      	echo '<option value="Básico" selected >Básico</option>';
														    	echo '<option value="Intermedio">Intermedio</option>';
														    	echo '<option value="Avanzado">Avanzado</option>	';
																break;
															case 'Intermedio':
																echo '<option value="">Ninguno</option>';
														      	echo '<option value="Básico">Básico</option>';
														    	echo '<option value="Intermedio" selected>Intermedio</option>';
														    	echo '<option value="Avanzado">Avanzado</option>';
																break;
															case 'Avanzado':
																echo '<option value="">Ninguno</option>';
														      	echo '<option value="Básico">Básico</option>';
														    	echo '<option value="Intermedio">Intermedio</option>';
														    	echo '<option value="Avanzado" selected>Avanzado</option>';
																break;
															default:
																echo '<option value="" selected>Ninguno</option>';
														      	echo '<option value="Básico">Básico</option>';
														    	echo '<option value="Intermedio">Intermedio</option>';
														    	echo '<option value="Avanzado">Avanzado</option>';
																break;
														}
													 ?>
											   	</select>				
												</td>
								          </tr>
								          <?php }
								          } ?>
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
        "info":     false,
        "ordering": false
    } );
	});
	</script>
<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

?>