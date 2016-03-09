<?php
	$title = "Asignar competencias";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
	<div class="container">
			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card  hoverable">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Asigne competencias a la malla <?php echo $this->data['malla']->getCodCarrera(); ?>, del plan <?php echo $this->data['malla']->getPlan(); ?></h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="mallas.php?result=asignar&param=<?php echo $this->data['malla']->getIdMalla(); ?>" method="POST">
					            <div class="col s2 offset-s5" style="margin-bottom: 20px;">
						            <button id="btn" class="btn-large right waves-effect waves-light color_primario"  type="submit" name="action">Asignar
						            	<i class="material-icons right">send</i>
						            </button>
								</div>
								<div class="row">
								  <div id="admin" class="col s8 offset-s2">
								    <div class="card material-table">
									      <div class="table-header">
									        <span class="table-title">Competencias</span>
									        <div class="actions">
									          <a href="competencias.php?action=nueva" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear Competencia</a>
									          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
									        </div>
									      </div>
								      	<table id="data">
									        <thead>
									          <tr>
									             <th>Nombre</th>
								            	<th class="no-padding" style="width: 100px">Categoria</th>
									            <th class="center" style="width: 180px">Estado</th>
									          </tr>
									        </thead>
									        <tbody>
									           <?php 
										        if(!empty($this->data['competenciasMalla'])){
										        foreach ($this->data['competenciasMalla'] as $key) {
										        	echo '<tr>';
										        	echo '<td>'.$key->getNomComp().'</td>';
										    	    echo '<td class="no-padding">'.$key->getCate().'</td>';
										    	    ?>
									            <td class="center">
											       <div class="switch">
											       	<label>
											       	Quitar
												    <input id="<?php echo $key->getIdComp(); ?>" checked name="<?php echo $key->getIdComp(); ?>" type="checkbox">
												    <span class="lever"></span>
												    Agregar
												    </label>
												  </div>
																								     
												</td>
									          </tr>
									          <?php }} ?>
									          <?php 
										        if(!empty($this->data['competenciasNoMalla'])){
										        foreach ($this->data['competenciasNoMalla'] as $key) {
										        	echo '<tr>';
										        	echo '<td>'.$key->getNomComp().'</td>';
										    	    echo '<td class="no-padding">'.$key->getCate().'</td>';
										    	    ?>
									            <td class="center">
											       <div class="switch">
											       	<label>
											       	Quitar
												    <input id="<?php echo $key->getIdComp(); ?>" name="<?php echo $key->getIdComp(); ?>" type="checkbox">
												    <span class="lever"></span>
												    Agregar
												    </label>
												  </div>
																								     
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
        "info":     false,
        "ordering": false 
    } );
	} );
	</script>
<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

?>