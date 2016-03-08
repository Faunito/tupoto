<?php
	$title = "Competencias";
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
	require_once(ROOT_DIR . MODELS_DIR . 'Competencia.php');
	?>
	<main id="sb-site" class="blue-grey lighten-5">
	<link rel="stylesheet" href="<?php echo RESOURCES_DIR ?>css/jquery.jqplot.css">
		<div class="row margen-top">
			<div class="col s10 offset-s1">
				<div class="card">
					<div class="card-image">
			          	<img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
				        <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Competencia</h4></strong></span>
				    </div>
					<div class="card-content">
						<div class="row">
					    	<div style="margin-bottom: 0%;" class="row">
							<div class="col s3">
								<div style="height: 22%; font-size: 18px;" class="z-depth-2 card teal white-text">
									<div  class="card-content center">
										<h7><?php echo $this->data['competencia']->getNomComp(); ?></h7>
									</div>
								</div>
							</div>
							<div class="col s9">
								<div class="col s12">
									<div style="height: 10%;" class="z-depth-2 card red white-text">
										<div class="card-content center">
											<h7 style="font-size: 18px;">Detalle por nivel</h7>
											<p class=center>
											Se le entrena en clase y en la evaluación se le demanda evidencias de producto para que:
											</p>
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 10%; margin-top: 0%; font-size: 18px;" class="z-depth-2 card amber white-text">
										<div  class="card-content center">
										Inicial
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 10%; margin-top: 0%; font-size: 18px;" class="z-depth-2 card green white-text">
										<div class="card-content center">
										Intermedio
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 10%; margin-top: 0%; font-size: 18px;" class="z-depth-2 card blue white-text">
										<div class="card-content center">
										Avanzado
										</div>
									</div>
								</div>
							</div>
						</div>
						<div style="margin-top: 0%;" class="row">
							<div class="col s3">
								<div style="height: 50%;" class="z-depth-2 card cyan darken-1 white-text">
									<div  class="card-content">
										<h6 style="font-size: 18px;">Descripción de competencia:</h6>
										<p>
										<?php echo $this->data['competencia']->getDesComp(); ?>
										</p>
									</div>
								</div>
							</div>
							<div class="col s9">
								<div class="col s4">
									<div style="height: 50%;" class="z-depth-2 card orange white-text">
										<div  class="card-content">
											<p>
											<?php echo $this->data['basico']->getDescripcion(); ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col s4">
									<div style="height: 50%;" class="z-depth-2 card green darken-2 white-text">
										<div  class="card-content">
											<p>
											<?php echo $this->data['medio']->getDescripcion(); ?>
											</p>
										</div>
									</div>
								</div>
								<div  class="col s4">
									<div style="height: 50%;" class="z-depth-2 card indigo white-text">
										<div  class="card-content">
											<p>
											<?php echo $this->data['avanzado']->getDescripcion(); ?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					    </div>
					  	</div>
					</div>
					<div class="card">
						<div class="card-content">
							<div id="Grafic"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?php 
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
	?>
	<script src="<?php echo RESOURCES_DIR ?>js/jquery.jqplot.js"></script>
	<script src="<?php echo RESOURCES_DIR ?>js/jqplot.bubbleRenderer.js"></script>

	<?php 

	$nivel_academico = $this->data['mallas'][1]->getNiveles();
	$semestres = array();
	$semestres['basico'] = array();
	$semestres['intermedio'] = array();
	$semestres['avanzado'] = array();

	for ($i = 0; $i < $nivel_academico; $i++) { 
		$semestres['basico'][$i] = 0;
		$semestres['intermedio'][$i] = 0;
		$semestres['avanzado'][$i] = 0;
	}

	$contador = count($this->data['graficos'][1]['asignaturas']);

	for ($i = 0; $i < $nivel_academico; $i++) {

		for ($j = 0; $j < count($this->data['graficos'][1]['asignaturas']); $j++) { 
			if( $this->data['graficos'][1]['asignaturas'][$j]->getNivel() == ($i+1) ){
				switch ($this->data['graficos'][1]['especificaciones'][$j]->getNivelCompetencia()) {
					case 'Básico':
						$semestres['basico'][$i]++;
						break;
					case 'Intermedio':
						$semestres['intermedio'][$i]++;
						break;
					case 'Avanzado':
						$semestres['avanzado'][$i]++;
						break;
				}	
			}
		}
	}

	foreach ($semestres as $semestre) {
		foreach ($semestre as $key) {
			echo $key . '<br>';
		}
		echo '<br>';
	}

	?>

	<script>
	$(document).ready(function(){


    var arr = [	
    			[10,	10, 	20], 
			    [15, 	15, 	20], 
			    [8, 	4, 		20], 
			    [6, 	2, 		10], 
			    [5, 	15, 	21], 
			    [1, 	2, 		20], 
			    [2, 	13, 	5 ]
			  ];
     
    plot1c = $.jqplot('Grafic',[arr],{
        title: 'GRÁFICO DE LA COMPETENCIA: <?php echo $this->data['competencia']->getNomComp(); ?>',
        seriesDefaults:{
            renderer: $.jqplot.BubbleRenderer
        	}              
    	});
	});
	</script>
	
	<?php
	require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');
    ?>