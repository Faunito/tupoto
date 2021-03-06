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
		          	<div class="card  hoverable">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Modificar malla</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="mallas.php?result=modificar&param=<?php echo $this->data['malla']->getIdMalla(); ?>" method="POST">
					            <div class="row center-align">
					                <div class=" col s2 offset-s3 input-field">
					                    <input id="codigo" name="codigo" value="<?php echo $this->data['malla']->getCodCarrera(); ?>" type="text" class="validate">
					                    <label for="codigo">Codigo *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="plan" name="plan" value="<?php echo $this->data['malla']->getPlan(); ?>" type="text" class="validate">
					                    <label for="plan">Plan *</label>
					                </div>
								    <div class="col s2">
							            <button id="btn" class="btn-large right waves-effect waves-light color_primario"  type="submit" name="action">Ingresar
							            <i class="material-icons right">send</i>
							            </button>
						            </div>
					            </div>
								<div class="row">
								  <div class="row">
								  <div id="admin" class="col s10 offset-s1">
								    <div class="card material-table">
								      <div class="table-header">
								        <span class="table-title">Asignaturas</span>
								        <div class="actions">
								          <a href="asignaturas.php?action=nueva" class="modal-trigger waves-effect btn-flat nopadding"><i class="material-icons right">add_circle</i>Crear Asignatura</a>
								          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
								        </div>
								      </div>
								      	<table id="data">
									        <thead>
									          <tr>
									            <th>Nombre</th>
									            <th class="no-padding" style="width: 80px">Código</th>
									            <th class="no-padding" style="width: 50px">Nivel</th>
									            <th class="center" style="width: 180px">Estado</th>
									          </tr>
									        </thead>
									        <tbody>
           <?php 
	        if(!empty($this->data['asignaturas'])){
	        	foreach ($this->data['asignaturas'] as $asignatura) 
	        	{
	        		if(empty($asignatura->getMalla()) || $asignatura->getMalla() == $this->data['malla']->getIdMalla() ){
	        			echo '<tr>';
	        	echo '<td>'.$asignatura->getNombre().'</td>';
	    	    echo '<td class="no-padding">'.$asignatura->getCodigo().'</td>';
	    	    echo '<td class="no-padding">'.$asignatura->getNivel().'</td>';
	    	    ?>
            <td class="center">
		       <div class="switch">
		       	<label>
		       	Quitar
			    <input id="<?php echo $asignatura->getId(); ?>" <?php if(!empty($asignatura->getMalla()) && $asignatura->getMalla() == $this->data['malla']->getIdMalla()){ echo 'checked';} ?> name="<?php echo $asignatura->getId(); ?>" type="checkbox">
			    <span class="lever"></span>
			    Agregar
			    </label>
			  </div>									     
			</td>
          </tr>
          <?php }} }?>
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