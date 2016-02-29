<?php
	require_once('/Config/Constantes.php');	//Llama al archivo con las constantes, 
										//importante llamarlo primero desde aca para que header.php
										//tome las constantes en los href
	$title = 'Sistema SEP';
	include(ROOT_DIR . TEMPLATES_DIR . 'base/header_inicio.php');	//Llama al header
?>

<main id="sb-site" class="blue-grey lighten-5">
	<div class="container">		
		<!-- contenido del contenido principal -->
		<div class="row center" style="margin-top:100px;">
		    <div class="col s12 m6 offset-m3">
		    	<div class="card  hoverable">
				    <div class="card-content">
				    	<span class="card-title">Ingreso al sistema</span>
						<form method="POST" action="index.php?action=login" id="login">
			                <div class="row">
			                    <div class="input-field col s12 m10 offset-m1">
			                        <input type="text" id="email" class="login-input" name="email" required>
									<label for="email">Email</label>
			                    </div>
			                </div>
			                <div class="row">
			                    <div class="input-field col s12 m10 offset-m1">
			                        <input type="password" id="password" class="login-input" name="password" required>
									<label for="pasword">Contraseña</label>
			                    </div>
			                </div>
			                <div class="row">
			                    <div class="input-field col s12 m10 offset-m1">
			                    	<select name="tipoFuncionario">
								      	<option value="" disabled selected>Elija un tipo</option>
								      	<option value="profesor">Profesor</option>
								    	<option value="secretaria">Secretaria</option>
								    	<option value="director">Director de Carrera</option>								    
								    </select>
			                    <!--    <input type="password" id="pass" class="login-input" name="password" required>
									<label for="pasword">Contraseña</label>-->
									<label >Funcionario</label>
			                    </div>
			                </div>
			                <div class="row">
			                    <div class="col  m10 offset-m1">
			                        <p class="right-align">
			                            <button class="btn btn-large waves-effect waves-light color_primario" type="submit" form="login" name="action">Ingresar</button>
			                        </p>
			                    </div>
			                </div>
			            <!--</form>-->
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
	include(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

?>