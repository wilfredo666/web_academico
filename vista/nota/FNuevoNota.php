<?php
require "../../controlador/notaControlador.php";
require "../../modelo/notaModelo.php";

session_start();
$idEstudiante = $_POST["idEstudiante"];
$idCurso = $_POST["idCurso"];
$idModulo = $_POST["idModulo"];
$idMateria = $_POST["idMateria"];

$notas = ControladorNota::ctrNotaEstudiante($idEstudiante, $idMateria, $idModulo, $idCurso);
$detalleNota = json_decode($notas['desc_nota']);
/* var_dump($notas); */
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">

  <?php
  if ($_SESSION["perfil"] == "Estudiante") {
  ?>
    <h4 class="modal-title font-weight-light">Ver mis Notas</h4>
  <?php
  } else {
  ?>
    <h4 class="modal-title font-weight-light">Registrar Nueva Nota</h4>
  <?php
  }
  ?>

  <button type="button" class="close" data-dismiss="modal" aria-label="Close">../
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegNota">
  <div class="modal-body">
    <div class="row">
      <!-- PARA EL PERFIL DEL ESTUDIANTE -->
      <?php
      if ($_SESSION["perfil"] == "Estudiante") {
      ?>
        <div class="form-group col-sm-6">
          <label for="">EXAMEN</label>
          <input type="number" class="form-control" id="examen" name="examen" readonly value="<?php echo ($notas == false) ? '' : $detalleNota->examen ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="">PRACTICAS</label>
          <input type="number" class="form-control" id="practicas" name="practicas" readonly value="<?php echo ($notas == false) ? '0' : $detalleNota->practicas ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="">ASISTENCIA</label>
          <input type="number" class="form-control" id="asistencia" name="asistencia" readonly value="<?php echo ($notas == false) ? '0' : $detalleNota->asistencia ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="">CONTROLES</label>
          <input type="number" class="form-control" id="controles" name="controles" readonly value="<?php echo ($notas == false) ? '0' : $detalleNota->controles ?>">
        </div>

        <div class="form-group col-sm-12">
          <label for="">OBSERVACIONES</label>
          <input type="text" class="form-control" id="observacion" name="observacion" readonly value="<?php echo ($notas == false) ? '' : $detalleNota->observacion ?>">
        </div>
      <?php
      } else {
      ?>
        <!-- PARA EL PERFIL DEL ADMINISTRADOR -->
        <div class="form-group col-sm-6">
          <label for="">EXAMEN</label>
          <input type="number" class="form-control" id="examen" name="examen" value="<?php echo ($notas == false) ? '' : $detalleNota->examen ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="">PRACTICAS</label>
          <input type="number" class="form-control" id="practicas" name="practicas" value="<?php echo ($notas == false) ? '0' : $detalleNota->practicas ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="">ASISTENCIA</label>
          <input type="number" class="form-control" id="asistencia" name="asistencia" value="<?php echo ($notas == false) ? '0' : $detalleNota->asistencia ?>">
        </div>

        <div class="form-group col-sm-6">
          <label for="">CONTROLES</label>
          <input type="number" class="form-control" id="controles" name="controles" value="<?php echo ($notas == false) ? '0' : $detalleNota->controles ?>">
        </div>

        <div class="form-group col-sm-12">
          <label for="">OBSERVACIONES</label>
          <input type="text" class="form-control" id="observacion" name="observacion" value="<?php echo ($notas == false) ? '' : $detalleNota->observacion ?>">
        </div>

        <input type="hidden" id="idEstudiante" name="idEstudiante" value="<?php echo $idEstudiante; ?>">
        <input type="hidden" id="idCurso" name="idCurso" value="<?php echo $idCurso; ?>">
        <input type="hidden" id="idModulo" name="idModulo" value="<?php echo $idModulo; ?>">
        <input type="hidden" id="idMateria" name="idMateria" value="<?php echo $idMateria; ?>">
      <?php
      }
      ?>

    </div>
  </div>
  <?php
  if ($_SESSION["perfil"] == "Administrador") {
  ?>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      <?php
      if ($notas == false) {
      ?>
        <a class="btn btn-primary" id="guardar" style="background-color: #001a34; color: #ffffff" onclick="RegNota()">Guardar</a>
      <?php
      } else {
      ?>
        <a class="btn btn-sucess" id="guardar" style="background-color: #001a34; color: #ffffff" onclick="ActualizarNota(<?php echo $notas['id_nota'] ?>)">Actualizar Nota</a>
      <?php
      }
      ?>
    </div>
  <?php
  }
  ?>
</form>