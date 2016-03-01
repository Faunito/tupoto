
<?php 
      
    switch ($tipo) {
      case 'director':
        echo '<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large blue">
                  <i class=" large material-icons">view_module</i>
                </a>
                <ul>
                  <li class="tooltipped" data-position="left" data-delay="50" data-tooltip="Mallas">
                    <a href="'. ROUTES_DIR .'mallas.php" class="btn-floating red darken-2"><i class="material-icons">view_comfy</i></a>
                  </li>
                  <li class="tooltipped" data-position="left" data-delay="50" data-tooltip="Competencias">
                    <a href="'. ROUTES_DIR .'competencias.php" class="btn-floating green darken-2"><i class="material-icons">book</i></a>
                  </li>
                  <li class="tooltipped" data-position="left" data-delay="50" data-tooltip="Alumnos">
                    <a href="'. ROUTES_DIR .'alumnos.php" class="btn-floating indigo darken-1"><i class="material-icons">school</i></a>
                  </li>
                  <li class="tooltipped" data-position="left" data-delay="50" data-tooltip="Usuarios">
                    <a href="'. ROUTES_DIR .'usuarios.php" class="btn-floating orange darken-2"><i class="material-icons">people</i></a>
                  </li>
                </ul>
              </div>';
          break;
      case 'profesor':
        echo '<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                <a class="btn-floating btn-large yellow darken-4">
                  <i class=" large material-icons">view_module</i>
                </a>
                <ul>
                  <li class="tooltipped" data-position="left" data-delay="50" data-tooltip="Asignaturas">
                    <a href="'. ROUTES_DIR .'asignaturas.php" class="btn-floating red darken-2"><i class="material-icons">folder</i></a>
                  </li>
                  <li class="tooltipped" data-position="left" data-delay="50" data-tooltip="Alumnos">
                    <a href="'. ROUTES_DIR .'alumnos.php" class="btn-floating indigo darken-1"><i class="material-icons">school</i></a>
                  </li>
                </ul>
              </div>';
        break;
        
        default:
          # code...
          break;
      }

 ?>