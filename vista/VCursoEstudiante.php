<?php
/* require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php"; */

$path = parse_url($_SERVER['REQUEST_URI']);
//id estudiante
$id = $path["query"];
/* $materia = ControladorMateria::ctrInfoMateria($id); */

$cursoEstudiante = ControladorEstudiante::ctrCursosEstudiante($id);
/* var_dump($cursoEstudiante); */
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div>
  </section>

  <?php
  $moduloMateria = ControladorMateria::ctrMateriaMod($cursoEstudiante['id_curso']);
  /* var_dump( $moduloMateria); */
  foreach ($moduloMateria as $modulo) {

  ?>
    <section class="content ml-1">
      <p class="font-weight-light h4">Módulo - <?php echo ($modulo['desc_modulo']) ?></p>
      <div class="row ml-1">
        <?php
        $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
        foreach ($MatMod as $value) {
        ?>

          <div class="col-md-4">
            <div class="card card-info shadow-sm">
              <div class="card-header">
                <h3 class="card-title"><?php echo $value["nombre_materia"]; ?></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: flex; justify-content: space-between;">

                <?php
                $notas = ControladorNota::ctrNotaEstudiante($id, $value["id_materia"], $modulo['id_modulo'], $cursoEstudiante['id_curso']);
                $detalleNota = json_decode($notas['desc_nota']);
                /* $notaPromConExamen = ($detalleNota->examen + $detalleNota->practicas + $detalleNota->asistencia + $detalleNota->controles) / 4;
                var_dump($notaPromConExamen); */
                if ($notas == false) {
                ?>
                  <div class="btn-group">
                    Nota: 0 pts.
                  </div>
                <?php
                } elseif ($detalleNota->examen != "") {
                  $notaPromConExamen = ($detalleNota->examen + $detalleNota->practicas + $detalleNota->asistencia + $detalleNota->controles) / 4;

                ?>
                  <div class="btn-group">
                    <?php
                    echo "Nota: " . $notaPromConExamen ." "." pts.";
                    ?>
                  </div>
                <?php
                } else {
                  $notaPromSinExamen = ($detalleNota->practicas + $detalleNota->asistencia + $detalleNota->controles) / 3;
                ?>
                  <div class="btn-group">
                    <?php
                    echo "Nota: " . $notaPromSinExamen ." "." pts.";
                    ?>
                  </div>
                <?php
                }
                ?>

                <div class="btn-group"></div>
                <div class="btn-group"></div>
                <div class="btn-group"></div>
                <div class="btn-group"></div>
                <div class="btn-group"></div>
                <div class="btn-group"></div>

                <div class="btn-group">

                  <?php
                  $idCurso =  $cursoEstudiante['id_curso'];
                  $idGrupo =  $cursoEstudiante['id_grupo'];
                  $idModulo =  $modulo['id_modulo'];
                  $idMateria =  $value['id_materia'];
                  ?>
                  <button class="btn btn-sm btn-secondary" onclick="MNotaEstudiante('<?php echo $id . '-' . $idCurso . '-' . $idGrupo . '-' . $idModulo . '-' . $idMateria; ?>')">Añadir Nota
                    <i class="fas fa-edit"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        <?php
        }
        ?>
      </div>

    </section>
  <?php
  }
  ?>
</div>