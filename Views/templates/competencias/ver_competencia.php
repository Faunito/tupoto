<?php
	$title = "Competencias";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
		<div class="row margen-top">
			<div class="col s10 offset-s1">
				<div class="card">
					<div class="card-image">
			          	<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				        <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Competencia</h4></strong></span>
				    </div>
					<div class="card-content">
						<div style="margin-bottom: 0%;" class="row">
							<div class="col s3">
								<div style="height: 22%; font-size: 18px;" class="z-depth-2 card teal darken-3 white-text">
									<div  class="card-content center">
										<h7>Competencia</h7>
									</div>
								</div>
							</div>
							<div class="col s9">
								<div class="col s12">
									<div style="height: 10%;" class="z-depth-2 card teal darken-3 white-text">
										<div class="card-content center">
											<h7 style="font-size: 18px;">Detalle por nivel</h7>
											<p class=center>
											Se le entrena en clase y en la evaluación se le demanda evidencias de producto para que:
											</p>
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 10%; margin-top: 0%; font-size: 18px;" class="z-depth-2 card teal darken-3 white-text">
										<div  class="card-content center">
										Inicial
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 10%; margin-top: 0%; font-size: 18px;" class="z-depth-2 card teal darken-3 white-text">
										<div class="card-content center">
										Intermedio
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 10%; margin-top: 0%; font-size: 18px;" class="z-depth-2 card teal darken-3 white-text">
										<div class="card-content center">
										Avanzado
										</div>
									</div>
								</div>
							</div>
						</div>
						<div style="margin-top: 0%;" class="row">
							<div class="col s3">
								<div style="height: 50%;" class="z-depth-2 card teal darken-3 white-text">
									<div  class="card-content">
										<h6 style="font-size: 18px;">Soluciones informáticas (DISSOL)</h6>
										<p>
										Diseña, construye e integra soluciones tecnológicas considerando elementos de software, hardware, telecomunicaciones y automatización, para agregar valor a las organizaciones públicas y privadas, y a través de éstas a la sociedad.
										</p>
									</div>
								</div>
							</div>
							<div class="col s9">
								<div class="col s4">
									<div style="height: 50%;" class="z-depth-2 card teal darken-3 white-text">
										<div  class="card-content">
											<p>
											Construya algoritmos utilizando un lenguaje de programación.
											Implemente medios de comunicación entre dispositivos digitales.
											Realice un levantamiento de requerimientos
											</p>
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 50%;" class="z-depth-2 card teal darken-3 white-text">
										<div  class="card-content">
											<p>
											Implemente una solucióninformática con metodologías orientadas a objetos o estructurados a partir de un diseño.
											Diseñar un sistema de comunicaciones utilizando protocolos y hardware apropiado.
											</p>
										</div>
									</div>
								</div>
								<div  class="col s4">
									<div style="height: 50%;" class="z-depth-2 card teal darken-3 white-text">
										<div  class="card-content">
											<p>
											Realice un diseño e implementación de sistemas de software orientados a objetos o estructurado, utilizando un proceso de desarrollo de software.
											Realice un diseño e implementación de sistemas de software de apoyo a la toma de decisiones.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>			      
					</div>
				</div>
			</div>
		</div>
	</main>


	<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
	?>
	<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');
    ?>