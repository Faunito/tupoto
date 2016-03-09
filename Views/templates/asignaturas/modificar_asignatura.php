<?php
	$title = "Modificar asignatura";
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
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Modifique una asignatura</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="asignaturas.php?result=modificar&param=<?php echo $this->data['asignatura']->getId(); ?>" method="POST">
					            <div class="row">
					                <div class=" col s2 offset-s4 input-field">
					                    <input id="codigo" name="codigo" type="text" class="validate" value="<?php echo $this->data['asignatura']->getCodigo(); ?>">
					                    <label for="codigo">Codigo *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="nivel" name="nivel" type="text" class="validate" value="<?php echo $this->data['asignatura']->getNivel(); ?>">
					                    <label for="nivel">Nivel *</label>
					                </div>
					            </div>
					            <div class="row">
					               <div class=" col s4 offset-s4 input-field">       
					                    <input id="nombre" name="nombre" type="text" class="validate" value="<?php echo $this->data['asignatura']->getNombre(); ?>">
					                    <label for="nombre">Nombre *</label>
					                </div>
					            </div>
					            <div class="row center">
						            <div class="col s2 offset-s6">
							            <button id="btn" class="btn right waves-effect waves-light color_primario"  type="submit" name="action">Modificar
							            <i class="material-icons right">send</i>
							            </button>
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