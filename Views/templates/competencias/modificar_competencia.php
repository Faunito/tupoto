<?php
	$title = "Competencias";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12 m12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Modifique una competencia</h4></strong></span>
				        </div>
			            <div class="card-content">
							<form id="myForm" action="competencias.php?result=modificar&param=<?php echo $this->data['competencia']->getIdComp(); ?>" method="POST">


							<div class="row">
				            	<div class="row">
					            	<h5 class="center" style="padding-left: 10px">Competencia</h5>
					            </div>
				            <div class="col s6 offset-s3">
					            <div class="card">
									<div class="card-content">
										<div class="row">
		<!-- SELECT Tipo competencia -->
        <div class=" col s4 input-field">
        	<select name="tipoCompetencia">
		      	<option value="" disabled>Elija un tipo</option>
		      	<option value="Generica"
	      	<?php 
		      	if(strcmp($this->data['competencia']->getCate(), 'Generica') == 0){
		      		echo 'selected'; 
		      	}
	      	?>
		      	>Genérica</option>
		    	<option value="Especifica"
			<?php 
		      	if(strcmp($this->data['competencia']->getCate(), 'Especifica') == 0){
		      		echo 'selected'; 
		      	}
	      	?>
		    	>Específica</option>
		    </select>
			<label >Tipo de competencia</label>
        </div>
											<!-- Nombre -->
							                <div class=" col s8 input-field">       
							                    <input id="nombre" name="nombre" type="text" class="validate" value="<?php echo $this->data['competencia']->getNomComp(); ?>">
							                    <label for="nombre">Nombre *</label>
							                </div>

								        </div>
										<!-- Descripcion -->
								        <div class="row">
								            <div class=" col s12 input-field">
							                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="1000"><?php echo $this->data['competencia']->getDesComp(); ?></textarea>
			        							<label for="descripcion">Descripción</label>
							                </div>
							            </div>

							        </div>
						        </div>
						    </div>
						</div>

						<div class="row">
						    <div class="col s12">
						    	<div class="row">
				            	<h5 class="center" style="padding-left: 20px">Evidencia</h5>
				            	</div>
									<!-- Basico -->
					            	<div class=" col s4 ">
						            	<div class="card">
							            	<div class="card-content">
										        <div class="row">
									                <div class=" col s12 ">       
									                    <h6 class="center">Nivel Básico:</h6>
									                </div>
									            </div>
									            <div class="row">
										            <div class=" col s12 input-field">      
									                    <textarea id="basico" name="basico" class="materialize-textarea" length="1000"><?php echo $this->data['basico']->getDescripcion(); ?></textarea>
					        							<label for="basico">Descripción</label>
									                </div>
										      	</div> 
										    </div>
									   	</div>
						            </div>						            
									<!-- Medio -->
						            <div class=" col s4 ">
						            	<div class="card">
							            	<div class="card-content">
										        <div class="row">
									                <div class=" col s12 ">       
									                    <h6 class="center">Nivel Medio:</h6>
									                </div>
									            </div>
									            <div class="row">
										            <div class=" col s12 input-field">      
									                    <textarea id="medio" name="medio" class="materialize-textarea" length="1000"><?php echo $this->data['medio']->getDescripcion(); ?></textarea>
					        							<label for="medio">Descripción</label>
									                </div>
										      	</div> 
										    </div>
									   	</div>
						            </div>
									<!-- Avanzado -->
						            <div class=" col s4 ">
						            	<div class="card">
							            	<div class="card-content">
										        <div class="row">
									                <div class=" col s12 ">       
									                    <h6 class="center">Nivel Avanzado:</h6>
									                </div>
									            </div>
									            <div class="row">
										            <div class=" col s12 input-field">      
									                    <textarea id="avanzado" name="avanzado" class="materialize-textarea" length="1000"><?php echo $this->data['avanzado']->getDescripcion(); ?></textarea>
					        							<label for="avanzado">Descripción</label>
									                </div>
										      	</div> 
										    </div>
									   	</div>
						            </div>

					            </div>
			            	</div>
							<!-- Submit -->
			            	<div class="row">
					            <div class="col s2 offset-s5">
						            <button id="btn" class="btn right waves-effect waves-light color_primario"  type="submit" >Ingresar
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




