<?php
	$title = "Competencias";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="container">		

			<!-- contenido del contenido principal -->
			<div class="row center margen-top">
		        <div class="col s12">
		          	<div class="card">
		          		<div class="card-image">
			          		<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				            <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Ingrese nueva competencia</h4></strong></span>
				        </div>
			            <div class="card-content">
			            <form id="myForm" action="competencias.php?result=nueva" method="POST">
				            <div class="row">
				            	<div class="row">
					            	<h5 class="center" style="padding-left: 10px">Competencia</h5>
					            </div>
				            <div class="col s6 offset-s3">
					            <div class="card">
									<div class="card-content">
						            	
										<div class="row">
							                <div class=" col s4 input-field">
							                    <input id="categoria" name="categoria" type="text" class="validate">
							                    <label for="categoria">Categoria *</label>
							                </div>
							                <div class=" col s8 input-field">       
							                    <input id="nombre" name="nombre" type="text" class="validate">
							                    <label for="nombre">Nombre *</label>
							                </div>
								        </div>
								        <div class="row">
								            <div class=" col s12 input-field">      
							                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="1000"></textarea>
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
									                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="1000"></textarea>
					        							<label for="descripcion">Descripción</label>
									                </div>
										      	</div> 
										    </div>
									   	</div>
						            </div>
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
									                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="1000"></textarea>
					        							<label for="descripcion">Descripción</label>
									                </div>
										      	</div> 
										    </div>
									   	</div>
						            </div>
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
									                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="1000"></textarea>
					        							<label for="descripcion">Descripción</label>
									                </div>
										      	</div> 
										    </div>
									   	</div>
						            </div>
					            </div>
			            	</div>
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
		    <!-- fin del contenido del contenido principal -->
		    
		</div>	
	</main>
	<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>