<?php
  $title = "Malla " . $this->data['malla']->getCodCarrera() . " - Plan " . $this->data['malla']->getPlan();
  require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
  require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
  ?>
<main id="sb-site" class="blue-grey lighten-5" style="padding: 30px">
  <link rel="stylesheet" href="<?php echo RESOURCES_DIR ?>css/malla.css">

<!--Conveniciones-->
  <div class="card">
    <div class="card-image">
      <img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
      <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Malla <?php echo $this->data['malla']->getCodCarrera(); ?></h4></strong></span>
    </div>
  <div class="card-content center">
  <?php
    foreach ($this->data['niveles'] as $niveles) {
      echo '<div class="semestre">';
      echo '<h1>Semestre '.$niveles[0]->getNivel().'</h1>';
      foreach ($niveles as $nivel) {
            echo '<div class="materia CB" id="'.$nivel->getCodigo().'">';
            echo '<header>'.$nivel->getCodigo().'</header>';
            echo '<section>'.$nivel->getNombre().'</section>';
            echo '</div>';
        }
        echo '</div>';
    } ?>      
    </div>
  </div>
  <?php foreach ($this->data['competencias'] as $competencia) { ?>
  <div class="card">
    <div class="card-content">
      <div class="row">
      <div class="col s10 offset-s1">
      <div id="chart<?php echo $competencia->getIdComp(); ?>" style="height:500px;"></div>
      </div>
      </div>
    </div>
  </div>  
  <?php  }?>
</main>
    <?php
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
    ?>
    <script src="<?php echo RESOURCES_DIR ?>js/malla.js"></script>
    <script src="<?php echo RESOURCES_DIR ?>js/jquery.jqplot.js"></script>
    <script src="<?php echo RESOURCES_DIR ?>js/jqplot.bubbleRenderer.js"></script>
    <script src="<?php echo RESOURCES_DIR ?>js/jqplot.canvasTextRenderer.js"></script>
    <script src="<?php echo RESOURCES_DIR ?>js/jqplot.logAxisRenderer.js"></script>
    <script src="<?php echo RESOURCES_DIR ?>js/jqplot.canvasAxisLabelRenderer.js"></script>
    <script src="<?php echo RESOURCES_DIR ?>js/jqplot.canvasAxisTickRenderer.js"></script>
    <script src="<?php echo RESOURCES_DIR ?>js/jqplot.categoryAxisRenderer.js"></script>
    <?php 
    $k=0;
    foreach ($this->data['competencias'] as $competencia) {

      $nivel_academico = $this->data['malla']->getNiveles();
      $semestres = array();
      $semestres['basico'] = array();
      $semestres['intermedio'] = array();
      $semestres['avanzado'] = array();

      for ($i = 0; $i < $nivel_academico; $i++) { 
        $semestres['basico'][$i] = 0;
        $semestres['intermedio'][$i] = 0;
        $semestres['avanzado'][$i] = 0;
      }

      $contador = count($this->data['graficos'][$k]['asignaturas']);
      for ($i = 0; $i < $nivel_academico; $i++) {

        for ($j = 0; $j < count($this->data['graficos'][$k]['asignaturas']); $j++) { 
          if( $this->data['graficos'][$k]['asignaturas'][$j]->getNivel() == ($i+1) ){
            switch ($this->data['graficos'][$k]['especificaciones'][$j]->getNivelCompetencia()) {
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
    ?>
    <script>
    $(document).ready(function(){
     
    var hola = [
    <?php for($i=0;$i<$nivel_academico;$i++){
              echo '[';echo $i+1;echo ',';echo 1;echo ',';echo $semestres['basico'][$i]*10;echo '],';
              echo '[';echo $i+1;echo ',';echo 2;echo ',';echo $semestres['intermedio'][$i]*10;echo '],';
              echo '[';echo $i+1;echo ',';echo 3;echo ',';echo $semestres['avanzado'][$i]*10;echo ']';
              if($i!=$nivel_academico-1)
                echo ',';
            }
    ?>
    ];

    plot1 = $.jqplot('chart<?php echo $competencia->getIdComp(); ?>',[hola],{
        title: '<?php echo $competencia->getNomComp(); ?>',
        seriesDefaults:{
            renderer: $.jqplot.BubbleRenderer,
            rendererOptions: {
                bubbleAlpha: 1.0,
                highlightAlpha: 0.8
            },
            shadow: true,
            shadowAlpha: 0.05
        },
         axes:{
          xaxis: {min:0, max: <?php echo $nivel_academico+1; ?>,
           tickOptions:{ 
            angle: 0
          },
          tickRenderer:$.jqplot.CanvasAxisTickRenderer,
            label:'Semestres', 
          labelOptions:{
            fontFamily:'Helvetica',
            fontSize: '14pt'
          },
          labelRenderer: $.jqplot.CanvasAxisLabelRenderer
         },
          yaxis: {min:0, max: 4,
          label: 'Niveles de competencia',
          labelOptions:{
            fontFamily:'Helvetica',
            fontSize: '14pt'
          },
          labelRenderer: $.jqplot.CanvasAxisLabelRenderer
          }          
         },
         axesDefaults: 
               { 
                min: 0,  
                tickInterval: 1, 
                tickOptions: { 
                        formatString: '%d' 
                } 
            },
          tickRenderer:$.jqplot.CanvasAxisTickRenderer,
            label:'Core Motor Amperage', 
          labelOptions:{
            fontFamily:'Helvetica',
            fontSize: '14pt'
          }
    });  
});
  </script>
    <?php
    $k++;
  }
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');
    ?>


