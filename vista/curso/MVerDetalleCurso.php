<?php
require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php";

$id = $_GET["id"];
$curso = controladorMateria::ctrDetalleCurso($id);
$modulo = controladorMateria::ctrCantidadModulo($id);
$materias = controladorMateria::ctrMateriasModulo($id);
$costoModulo = controladorMateria::ctrCostoModulo($id);
$cursoSeleccionado = controladorMateria::ctrDetalleCursoSeleccionado($id);



/* var_dump($curso); */
/* var_dump($modulo); */
/* print_r($resultado); */

foreach ($materias as $value) {
  $img = $value['img_curso'];
}
?>
<style>
  body {
    font-size: 14px;
  }
</style>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Información de la Materia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <div class="row">

    <div class="col-7">
      <table class="table">
        <tr>
          <th>Total Módulos del curso</th>
          <td><?php echo $modulo["cantidad"] . " módulos" ?></td>
        </tr>

        <tr>
          <th>Materias</th>
          <?php foreach ($materias as $value) {
          ?>
            <td class="row ml-1"><?php echo $value["nombre_materia"] ?></td>
          <?php
          }
          ?>
        </tr>

        <?php if (isset($curso["fecha_inicio"])) {
        ?>
          <tr>
            <th>Fecha de inicio</th>
            <td><?php echo $curso["fecha_inicio"]; ?></td>
          </tr>
        <?php
        } else {
        ?>
          <tr>
            <th>Fecha de inicio</th>
            <td class="text-muted">Aún no hay fecha de inicio</td>
          </tr>
        <?php
        } ?>

        <?php if (isset($curso["turno"])) {
        ?>
          <tr>
            <th>Horario</th>
            <td><?php echo "Turno: " . $curso["turno"] . " / " . $curso["hora_inicio"] . " a " . $curso["hora_fin"] ?></td>
          </tr>
        <?php
        } else {
        ?>
          <tr>
            <th>Horario</th>
            <td class="text-muted">Aún no está establecido el horario</td>
          </tr>
        <?php
        } ?>

        <tr>
          <th>Costos</th>
          <?php foreach ($costoModulo as $value) {
            $mod = $value['costo_modulo'];
            $desc = $value['desc_modulo'];
          ?>
            <td class="row ml-1"><?php echo $desc . " - " . $mod . " Bs." ?></td>
          <?php
          }
          ?>
        </tr>

      </table>
    </div>
    <div class="col-5 align-items-center justify-content-between text-center">

      <?php
      if ($cursoSeleccionado['img_curso']=="") {
      ?>
        <img src="assest/dist/img/cursoDefault.jpg" alt="" width="300" class="img-thumbnail">
      <?php
      } else {
      ?>
        <img src="assest/dist/img/cursos/<?php echo $img; ?>" alt="" width="300" class="img-thumbnail">
      <?php
      }
      ?>

    </div>
  </div>
</div>