<?php
	$title = "Practicas";
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
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Modifique una practica</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="practicas.php?result=modificar&param=<?php echo $this->data['practica']->getId(); ?>" method="POST">
                                <div class="row">					                
					                <div class=" col s1 input-field">       
					                    <input id="horas" name="horas" type="text" class="validate" value='<?php echo $this->data['practica']->getHoras;?>'>
					                    <label for="horas">Horas *</label>
					                </div>	
					                <div class=" col s2 input-field">       
					                    <input id="fecha_inicio" name="fecha_inicio" type="text" class="datepicker" value='<?php echo $this->data['practica']->getFechaInicio();?>'>
					                    <label for="fecha_inicio">Fecha inicio *</label>
					                </div>
					                <div class=" col s2 input-field">       
					                    <input id="fecha_termino" name="fecha_termino" type="text" class="datepicker" value='<?php echo $this->data['practica']->getFechaTermino();?>'>
					                    <label for="fecha_termino">Fecha termino *</label>
					                </div>
					           	</div>
					           	<div class="row">
					                <div class=" col s6 offset-s3 input-field">       
					                    <input id="direccion" name="direccion" type="text" class="validate" value='value='<?php echo $this->data['practica']->getDireccion();?>'>
					                    <label for="direccion">Dirección *</label>
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