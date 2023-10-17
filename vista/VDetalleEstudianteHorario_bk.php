<?php

$path = parse_url($_SERVER['REQUEST_URI']);
//id estudiante
$idEstudiante = $path["query"];

//informacion del estudiante
$estudiante = ControladorEstudiante::ctrInfoEstudiante($id);

//$cursoEstudiante = ControladorEstudiante::ctrCursosEstudiante($id);
/* var_dump($cursoEstudiante); */

//informacion de los grupos del estudiante
$horario = ControladorEstudiante::ctrInfoHorarioEstudiante($id);
var_dump($horario);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header pb-0">
    <div class="container-fluid d-flex justify-content-center" style="padding-top: 2px; padding-bottom: 2px; font-size: 20px;">
      INFORMACIÓN DEL HORARIO DEL ESTUDIANTE: <p class="text-bold mb-0"> - <?php echo $estudiante['nombre_estudiante'] . " " . $estudiante['ap_pat_estudiante'] . " " . $estudiante['ap_mat_estudiante']; ?></p>
    </div>
  </section>

  <section class="content">

    <div class="row container-fluid h-100">
      <div class="col-md-12">
        <div class="card card-row card-dark">
          <div class="card-header bg-dark  d-flex justify-content-center">
            <h3 class="card-title">
              HORARIOS
            </h3>
          </div>
          <div class="card-body row ">
            <?php
            $cantidadCurso = 0;
            foreach ($cursoEstudiante as $curso) {
              $cantidadCurso = $cantidadCurso + 1;
            ?>
            <div class="col-md-12">
              <div class="card card-info card-outline">
                <div class="card-header">
                  <h5 class="card-title"><?php echo $curso['titulo_curso'] ?></h5>
                  <div class="card-tools">
                    <a class="btn btn-tool btn-link"><?php echo $cantidadCurso; ?></a>
                    <a class="btn btn-tool">
                      <i class="fas fa-chalkboard"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <section class="content">
                    <?php
              $moduloMateria = ControladorMateria::ctrMateriaMod($curso['id_curso']);

              /* var_dump($moduloMateria); */
              foreach ($moduloMateria as $modulo) {
                //Obtenemos las materias de los modulos
                    ?>
                    <p class="btn btn-sm btn-default text-bold text-dark mr-2" style="width: 270px;"><?php echo ($modulo['desc_modulo']) ?> - <span class="text-xs text-right"> HORARIOS </span> </p>
                    <?php
                      $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
                foreach ($MatMod as $value) {
                  /* var_dump($curso['id_grupo']);
                                                    var_dump($curso['id_curso']);
                                                    var_dump($value['id_materia']); */
                  $horarioMateria = ControladorMateria::ctrHoraMateria($curso['id_grupo'], $curso['id_curso'], $value['id_materia']);
                    ?>

                    <table id="" class="display">
                      <thead>
                        <tr>
                          <th>Lunes</th>
                          <th>Martes</th>
                          <th>Miércoles</th>
                          <th>Jueves</th>
                          <th>Viernes</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>a</td>
                          <td>b</td>
                          <td>c</td>
                          <td>d</td>
                          <td>e</td>
                        <tr>
                      </tbody>
                    </table>

                    <?php
                }
                    ?>
                    <!--  <?php
                $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
                foreach ($MatMod as $value) {
                  $idCurso =  $curso['id_curso'];
                  $idModulo =  $modulo['id_modulo'];
                  $idMateria =  $value['id_materia'];
?>
<div class="ml-2 mb-2 d-flex justify-content-between">
<button class="btn btn-sm btn-default text-bold text-dark mr-2" style="width: 270px;" onclick="MNotaEstudiante('<?php echo $idEstudiante . '-' . $idCurso . '-' . $idModulo . '-' . $idMateria; ?>')"><?php echo $value["nombre_materia"]; ?> - <i class="fas fa-edit"></i></button>
</div>
<?php
                }
?> -->

                    <?php
              }
                    ?>
                  </section>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  function MNotaEstudiante(id) {
    let identificativo = id.split('-');
    var obj = {
      idEstudiante: identificativo[0],
      idCurso: identificativo[1],
      idModulo: identificativo[2],
      idMateria: identificativo[3],
    }

    $("#modal-default").modal("show")
    $.ajax({
      type: "POST",
      url: "vista/nota/FNuevoNota.php",
      data: obj,
      cache: false,
      success: function(data) {
        $("#content-default").html(data)
        console.log(identificativo);
      }
    })
  }
  =======
    <?php
    /* require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php"; */
    session_start();
    $path = parse_url($_SERVER['REQUEST_URI']);
    //id estudiante
    $id = $path["query"];
    $idEstudiante = $id;
    //datos del estudainte
    $estudiante = ControladorEstudiante::ctrInfoEstudiante($id);

    $cursoEstudiante = ControladorEstudiante::ctrCursosEstudiante($id);
    /* var_dump($cursoEstudiante); */
    ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
  <section class="content-header pb-0">
    <div class="container-fluid d-flex justify-content-center" style="padding-top: 2px; padding-bottom: 2px; font-size: 20px;">
      INFORMACIÓN DEL HORARIO DEL ESTUDIANTE: <p class="text-bold mb-0"> - <?php echo $estudiante['nombre_estudiante'] . " " . $estudiante['ap_pat_estudiante'] . " " . $estudiante['ap_mat_estudiante']; ?></p>
  </div>
  </section>

  <section class="content">

    <div class="row container-fluid h-100">
      <div class="col-md-12">
        <div class="card card-row card-dark">
          <div class="card-header bg-dark  d-flex justify-content-center">
            <h3 class="card-title">
              HORARIOS
  </h3>
  </div>
  <div class="card-body row ">
    <?php
    $cantidadCurso = 0;
    foreach ($cursoEstudiante as $curso) {
      $cantidadCurso = $cantidadCurso + 1;
    ?>
    <div class="col-md-12">
      <div class="card card-info card-outline">
        <div class="card-header">
          <h5 class="card-title"><?php echo $curso['titulo_curso'] ?></h5>
  <div class="card-tools">
    <a class="btn btn-tool btn-link"><?php echo $cantidadCurso; ?></a>
  <a class="btn btn-tool">
    <i class="fas fa-chalkboard"></i>
  </a>
  </div>
  </div>
  <div class="card-body">
    <section class="content">
      <?php
      $moduloMateria = ControladorMateria::ctrMateriaMod($curso['id_curso']);

      /* var_dump($moduloMateria); */
      foreach ($moduloMateria as $modulo) {
        //Obtenemos las materias de los modulos
      ?>
      <p class="btn btn-sm btn-default text-bold text-dark mr-2" style="width: 270px;"><?php echo ($modulo['desc_modulo']) ?> - <span class="text-xs text-right"> HORARIOS </span> </p>
        <?php
        $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
        foreach ($MatMod as $value) {
          /* var_dump($curso['id_grupo']);
                                                    var_dump($curso['id_curso']);
                                                    var_dump($value['id_materia']); */
          $horarioMateria = ControladorMateria::ctrHoraMateria($curso['id_grupo'], $curso['id_curso'], $value['id_materia']);
        ?>

        <table id="" class="display">
          <thead>
          <tr>
          <th>Lunes</th>
  <th>Martes</th>
  <th>Miércoles</th>
  <th>Jueves</th>
  <th>Viernes</th>
  </tr>
  </thead>
  <tbody>
          <tr>
          <td>a</td>
  <td>b</td>
  <td>c</td>
  <td>d</td>
  <td>e</td>
  <tr>
  </tbody>
  </table>

  <?php
        }
          ?>
  <!--  <?php
        $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
        foreach ($MatMod as $value) {
          $idCurso =  $curso['id_curso'];
          $idModulo =  $modulo['id_modulo'];
          $idMateria =  $value['id_materia'];
          ?>
  <div class="ml-2 mb-2 d-flex justify-content-between">
    <button class="btn btn-sm btn-default text-bold text-dark mr-2" style="width: 270px;" onclick="MNotaEstudiante('<?php echo $idEstudiante . '-' . $idCurso . '-' . $idModulo . '-' . $idMateria; ?>')"><?php echo $value["nombre_materia"]; ?> - <i class="fas fa-edit"></i></button>
  </div>
  <?php
        }
      ?> -->

  <?php
      }
      ?>
  </section>
  </div>
  </div>
  </div>
  <?php
    }
      ?>
  </div>
  </div>
  </div>
  </div>
  </section>
  </div>
  <script>
      function MNotaEstudiante(id) {
      let identificativo = id.split('-');
      var obj = {
        idEstudiante: identificativo[0],
        idCurso: identificativo[1],
        idModulo: identificativo[2],
        idMateria: identificativo[3],
      }

      $("#modal-default").modal("show")
      $.ajax({
        type: "POST",
        url: "vista/nota/FNuevoNota.php",
        data: obj,
        cache: false,
        success: function(data) {
          $("#content-default").html(data)
          console.log(identificativo);
        }
      })
    }
      >>>>>>> 238960694f6a73b2a7502363672feffc99c94294
</script>