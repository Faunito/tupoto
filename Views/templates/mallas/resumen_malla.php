<?php
  $title = "Malla " . $this->data['malla']->getCodCarrera() . " - Plan " . $this->data['malla']->getPlan();
  require_once(ROOT_DIR . TEMPLATES_DIR . 'base/header.php');
  require_once(ROOT_DIR . TEMPLATES_DIR . 'base/sidenav/sidenav_director.php');
  ?>
<main id="sb-site" class="blue-grey lighten-5" style="padding: 30px">
  <link rel="stylesheet" href="<?php echo RESOURCES_DIR ?>css/fixedHeader.css">

<!--Conveniciones-->
  <div class="card">
    <div class="card-image">
      <img src="<?php echo RESOURCES_DIR.'img/hola.jpg';?>">
      <span class="card-title"><strong><h4><a href="javascript:history.go(-1)"><i class="material-icons small white-text left" style="font-size: 40px">arrow_back</i></a>Resumen de la malla <?php echo $this->data['malla']->getPlan(); ?></h4></strong></span>
    </div>
    <div class="card-content" style="overflow-x: scroll;">
      <table class="responsive-table">
        <thead>
          <tr>
              <th class="cuadrito-oculto"></th>
              <th class="cuadrito-oculto"></th>
              <th data-field="semestre" colspan="4" class="blue darken-2 center white-text cuadrito">Competencias genéricas</th>
              <th data-field="name" colspan="2" class="orange center white-text cuadrito">Competencias Licenciatura</th>
              <th data-field="price" colspan="5" class="green darken-2  center white-text cuadrito">Competencias Especialidad</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td class="cuadrito-oculto"></td>
            <td class="cuadrito-oculto"></td>
            <td class="cyan center cuadrito white-text">1</td>
            <td class="cyan center cuadrito white-text">2</td>
            <td class="cyan center cuadrito white-text">3</td>
            <td class="cyan center cuadrito white-text">4</td>
            <td class="cyan center cuadrito white-text">5</td>
            <td class="cyan center cuadrito white-text">6</td>
            <td class="cyan center cuadrito white-text">7</td>
            <td class="cyan center cuadrito white-text">8</td>
            <td class="cyan center cuadrito white-text">9</td>
            <td class="cyan center cuadrito white-text">10</td>
            <td class="cyan center cuadrito white-text">11</td>
          </tr>
           <tr>
            <td class="red darken-2 center white-text cuadrito">Códigos</td>
            <td class="purple darken-2 center white-text cuadrito">Asignaturas</td>
            <td class="blue center cuadrito  white-text"><h6>COMUNICACIÓN</h6><p>Comunica ideas, argumentos, conocimientos de manera clara y eficaz, tanto de forma oral como escrita, utilizando los medios adecuadamente y adaptándose a las características de la situación y de la audiencia.</p></td>
            <td class="blue center cuadrito white-text"><h6>TRABAJO EN EQUIPO</h6><br><p>Integra activamente equipos de trabajo, para el logro de objetivos comunes con otras personas, áreas u organizaciones, abordando de manera adecuada los conflictos que son parte de estos procesos.</p></td>
            <td class="blue center cuadrito white-text"><h6>LIDERAZGO</h6><br><p>Lidera de manera efectiva, o forma parte de un proceso de emprendimiento y lleva adelante las iniciativas necesarias para desarrollar la opción elegida y hacerse responsable de ella, en diversas organizaciones de forma estratégica y flexible.</p></td>
            <td class="blue center cuadrito white-text"><h6>USO DE TIC</h6><br><p>Utiliza las tecnologías de la información y la comunicación, de manera adecuada y pertinente, requeridas para desenvolverse en su quehacer profesional y social, que le permitan mantenerse actualizado a lo largo de la vida.</p></td>
            <td class="amber center cuadrito white-text"><h6>RESOLUCION DE PROBLEMAS</h6><br><p>Aplica fundamentos de Matemáticas, Física, Química y Ciencias de la Ingeniería para el análisis y desarrollo de soluciones a problemas de Ingeniería.</p></td>
            <td class="amber center cuadrito white-text"><h6>AUTOAPRENDIZAJE</h6><br><p>Aplica estrategias para profundizar su conocimiento científico y tecnológico relativo a las diversas disciplinas que sustentan la profesión y que le resulten útiles en función de mejorar su desempeño profesional.</p></td>
            <td class="light-green accent-4 center cuadrito white-text"><h6>INVESTIGACIÓN</h6><br><p>Integra conceptos teóricos y prácticos, que le permite participar en proyectos de investigación aplicada de acuerdo a las bases que sustentan las ciencias de la computación.</p></td>
            <td class="light-green accent-4 center cuadrito white-text"><h6>SOLUCIONES INFORMÁTICAS</h6><br><p>Diseña, construye e integra soluciones tecnológicas considerando elementos de software, hardware, telecomunicaciones y automatización, para agregar valor a las organizaciones públicas y privadas, y a través de éstas a la sociedad.</p></td>
            <td class="light-green accent-4 center cuadrito white-text"><h6>AUTOMATIZACIÓN</h6><br><p>Crea, evalúa y dirige proyectos de innovación tecnológica que involucre el trabajo de equipos multidisciplinarios, en apoyo directo a la estrategia, administración y operación de las organizaciones.</p></td>
            <td class="light-green accent-4 center cuadrito white-text"><h6>USO DE ESTÁNDARES</h6><br><p>Evalúa y aplica estándares y marcos regulatorios asociados a la disciplina en los diferentes procesos que participa y artefactos que genere.</p></td>
            <td class="light-green accent-4 center cuadrito white-text"><h6>USO DE INGLÉS</h6><br><p>Utiliza vocabulario del inglés técnico para la comprensión de los documentos de especialidad escritos en ese idioma, tales como manuales instructivos, papers, ampliando la búsqueda y análisis crítico del procesamiento de la información técnica necesaria para su formación profesional.</p></td>
          </tr>
          <tr>
            <td colspan="13" class="green cuadrito white-text">Semestre 1</td>
          </tr>
          <tr>
            <td class="red center cuadrito white-text">FIA 101</td>
            <td class="purple center cuadrito white-text">Cálculo diferencial</td>
            <td class="blue darken-2 center center cuadrito white-text">Inicial</td>
            <td class="center center cuadrito white-text">2</td>
            <td class="center center cuadrito white-text">3</td>
            <td class="center center cuadrito white-text">4</td>
            <td class="amber darken-2 center center cuadrito white-text">Inicial</td>
            <td class="center center cuadrito white-text">6</td>
            <td class="center center cuadrito white-text">7</td>
            <td class="center center cuadrito white-text">8</td>
            <td class="center center cuadrito white-text">9</td>
            <td class="center center cuadrito white-text">10</td>
            <td class="center center cuadrito white-text">11</td>
          </tr>
          <tr>
            <td class="red center cuadrito white-text">FIA 102</td>
            <td class="purple center cuadrito white-text">Álgebra</td>
            <td class="center center cuadrito white-text">1</td>
            <td class="center center cuadrito white-text">2</td>
            <td class="center center cuadrito white-text">3</td>
            <td class="blue darken-2 center center cuadrito white-text">Inicial</td>
            <td class="amber darken-2 center center cuadrito white-text">Inicial</td>
            <td class="center center cuadrito white-text">6</td>
            <td class="center center cuadrito white-text">7</td>
            <td class="center center cuadrito white-text">8</td>
            <td class="center center cuadrito white-text">9</td>
            <td class="center center cuadrito white-text">10</td>
            <td class="center center cuadrito white-text">11</td>
          </tr>
          <tr>
            <td class="red center cuadrito white-text">FIA 103</td>
            <td class="purple center cuadrito white-text">Fundamentos de la química</td>
            <td class="center center cuadrito white-text">1</td>
            <td class="blue darken-2 center center cuadrito white-text">Inicial</td>
            <td class="center center cuadrito white-text">3</td>
            <td class="center center cuadrito white-text">4</td>
            <td class="amber darken-2 center center cuadrito white-text">Inicial</td>
            <td class="center center cuadrito white-text">6</td>
            <td class="center center cuadrito white-text">7</td>
            <td class="center center cuadrito white-text">8</td>
            <td class="center center cuadrito white-text">9</td>
            <td class="center center cuadrito white-text">10</td>
            <td class="center center cuadrito white-text">11</td>
          </tr>
          <tr>
            <td class="red center cuadrito white-text">FIA 104</td>
            <td class="purple center cuadrito white-text">Entrenamiento de habilidades personales</td>
            <td class="blue darken-2 center center cuadrito white-text">Inicial</td>
            <td class="blue darken-2 center center cuadrito white-text">Inicial</td>
            <td class="blue darken-2 center center cuadrito white-text">Inicial</td>
            <td class="blue darken-2 center center cuadrito white-text">Inicial</td>            
            <td class="center center cuadrito white-text">5</td>
            <td class="amber darken-2 center center cuadrito white-text">Inicial</td>
            <td class="center center cuadrito white-text">7</td>
            <td class="center center cuadrito white-text">8</td>
            <td class="center center cuadrito white-text">9</td>
            <td class="center center cuadrito white-text">10</td>
            <td class="center center cuadrito white-text">11</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div> 
</main>
    <?php
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/scripts.php');
    require_once(ROOT_DIR . TEMPLATES_DIR . 'base/footer.php');
    ?>


