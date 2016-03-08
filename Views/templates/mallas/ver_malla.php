<?php
  $title = "Mallas";
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
  <div class="card">
    <div class="card-content">
      <div class="row">
      <div class="col s10 offset-s1">
      <div id="chart1" style="height:500px;"></div>
      </div>
      </div>
    </div>
  </div>  
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
    <script>
    $(document).ready(function(){
     
    var hola = [[1, 1,<?php echo '10'; ?>], [2, 1, 20], 
    [3, 2, 20], [4, 2, 20], 
    [5, 2, 20], [6, 3, 20], [7, 3, 50]];
    
    var ticks = ['This is how to tick'];

    plot1 = $.jqplot('chart1',[hola],{
        title: '<?php echo 'Competencia 1'; ?>',
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
          xaxis: {min:0, max: <?php echo '8'; ?>,
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
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');
    ?>


