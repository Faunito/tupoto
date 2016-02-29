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
      <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Malla</h4></strong></span>
    </div>
  <div class="card-content">
  <?php
    foreach ($this->data['niveles'] as $niveles) {
      echo '<div class="semestre">';
      echo '<h1>Semestre</h1>';
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

</main>
    <?php
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
    ?>
    <script src="<?php echo RESOURCES_DIR ?>js/malla.js"></script>
    <?php
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');

    ?>