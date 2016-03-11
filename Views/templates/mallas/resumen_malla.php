<?php
  $title = "Malla " . $this->data['malla']->getCodCarrera() . " - Plan " . $this->data['malla']->getPlan();
  require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
  require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
  ?>
<main id="sb-site" class="blue-grey lighten-5" style="padding: 30px">

<!--Conveniciones-->

  <div class="card" >
    <div class="card-content" style="overflow-x: scroll; overflow-y: scroll; height: 85%">

      <table class="responsive-table">
        <thead>
          <tr>
              <th class="cuadrito-oculto"></th>
              <th class="cuadrito-oculto"></th>
              <?php 
              if(!empty($this->data['genericas'])){
                echo '<th data-field="semestre" colspan="'.count($this->data['genericas']).'" class="blue darken-2 center white-text cuadrito">Competencias genéricas</th>';
                } 
              if(!empty($this->data['licenciatura'])){
                echo '<th data-field="name" colspan="'.count($this->data['licenciatura']).'" class="orange center white-text cuadrito">Competencias Licenciatura</th>';
                }
              if(!empty($this->data['especialidad'])){
                echo '<th data-field="price" colspan="'.count($this->data['especialidad']).'" class="green darken-2  center white-text cuadrito">Competencias Especialidad</th>';
                }
                ?>  
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="cuadrito-oculto"></td>
            <td class="cuadrito-oculto"></td>
            <?php 
            $contador=count($this->data['genericas'])+count($this->data['licenciatura'])+count($this->data['especialidad']);
            for($i=1;$i<=$contador;$i++){
              echo  '<td class="cyan center cuadrito white-text">'.$i.'</td>';
            }
            ?>
          </tr>
           <tr>
            <td class="red darken-2 center white-text cuadrito" style="padding-left: 33px; padding-right: 33px;">Códigos</td>
            <td class="purple darken-2 center white-text cuadrito" style="padding-left: 20px; padding-right: 20px;">Asignaturas</td>
            <?php 
            if(!empty($this->data['genericas'])){
              foreach ($this->data['genericas'] as $generica) {
              echo '<td class="blue center cuadrito white-text"><h6><strong>'.$generica->getNomComp().'</strong></h6><br><p>'.$generica->getDesComp().'</p></td>';
              }
            }

            if(!empty($this->data['licenciatura'])){
              foreach ($this->data['licenciatura'] as $licenciatura) {
              echo '<td class="amber center cuadrito white-text"><h6><strong>'.$licenciatura->getNomComp().'</strong></h6><br><p>'.$licenciatura->getDesComp().'</p></td>';
              }
            }

             if(!empty($this->data['especialidad'])){
              foreach ($this->data['especialidad'] as $especialidad) {
              echo '<td class="light-green accent-4 center cuadrito white-text"><h6><strong>'.$especialidad->getNomComp().'</strong></h6><br><p>'.$especialidad->getDesComp().'</p></td>';
              }
            }
            ?>            
          </tr>

         <?php 
          for($i=0;$i<intval($this->data['malla']->getNiveles());$i++)
          {
              echo '<tr>';
              echo '<td colspan="';
              echo $contador+2;
              echo '" class="green cuadrito white-text"><strong>Semestre '.($i+1).'</strong></td>';
              echo '</tr>';

                for($j=0;$j<count($this->data['asignaturas']);$j++) {
                  if($this->data['asignaturas'][$j]!=null){
                  if($this->data['asignaturas'][$j]->getNivel()==($i+1))
                    {
                      echo '<tr>';
                      echo '<td class="red center cuadrito white-text fila">'.$this->data['asignaturas'][$j]->getCodigo().'</td>';
                      echo '<td class="purple center cuadrito white-text fila">'.$this->data['asignaturas'][$j]->getNombre().'</td>';
                      if(!empty($this->data['genericas'])){
                      $listo=false;
                      foreach ($this->data['genericas'] as $generica) {
                        foreach ($this->data['especificaciones'] as $especificacion) {
                          for($k=0;$k<count($especificacion);$k++) {
                          if($this->data['asignaturas'][$j]!=null){
                          if($this->data['asignaturas'][$j]->getId()==$especificacion[$k]->getIdAsignatura()&& $generica->getIdComp()==$especificacion[$k]->getIdCompetencia()){
                            echo '<td class="blue darken-2 center center cuadrito white-text">'.$especificacion[$k]->getNivelCompetencia().'</td>';
                            $this->data['especificaciones'][$k]=null;
                            $listo=true;
                            }
                          }
                        }
                        }
                     if($listo==false)
                     {
                      echo '<td></td>';
                     } 
                    }
                  }
                  if(!empty($this->data['licenciatura'])){
                      $listo=false;
                      foreach ($this->data['licenciatura'] as $generica) {
                        foreach ($this->data['especificaciones'] as $especificacion) {
                          for($k=0;$k<count($especificacion);$k++) {
                          if($this->data['asignaturas'][$j]!=null){
                          if($this->data['asignaturas'][$j]->getId()==$especificacion[$k]->getIdAsignatura()&& $generica->getIdComp()==$especificacion[$k]->getIdCompetencia()){
                            echo '<td class="amber darken-2 center center cuadrito white-text">'.$especificacion[$k]->getNivelCompetencia().'</td>';
                            $this->data['especificaciones'][$k]=null;
                            $listo=true;
                            }
                          }
                        }
                        }
                     if($listo==false)
                     {
                      echo '<td></td>';
                     } 
                    }
                  }
                  if(!empty($this->data['especialidad'])){
                      $listo=false;
                      foreach ($this->data['especialidad'] as $generica) {
                        foreach ($this->data['especificaciones'] as $especificacion) {
                          for($k=0;$k<count($especificacion);$k++) {
                          if($this->data['asignaturas'][$j]!=null){
                          if($this->data['asignaturas'][$j]->getId()==$especificacion[$k]->getIdAsignatura()&& $generica->getIdComp()==$especificacion[$k]->getIdCompetencia()){
                            echo '<td class="green darken-2 center center cuadrito white-text">'.$especificacion[$k]->getNivelCompetencia().'</td>';
                            $this->data['especificaciones'][$k]=null;
                            $listo=true;
                            }
                          }
                        }
                        }
                     if($listo==false)
                     {
                      echo '<td></td>';
                     } 
                    }
                  }
                  $this->data['asignaturas'][$j]=null;
                  }
                }
              } 
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div> 


</main>
    <?php
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
    ?>

    <?php
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');
    ?>


