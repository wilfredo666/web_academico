<?php
require "../../../controlador/estudianteControlador.php";
require "../../../modelo/estudianteModelo.php";

$id = $_GET["id"];
$estuGrupo = ControladorEstudiante::ctrInfoEstuGrupo($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar Asignacion de Grupo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditGrupoAsig">
  <div class="modal-body">
    <div class="row">
    <div class="form-group col-sm-12">
        <label for="">Nombre del Estudiante</label>
        <select class="form-control select2bs4" name="nombreEstudiante" id="nombreEstudiante">
          <option value="">Seleccionar Estudiante</option>
          <?php
          require_once "../../../controlador/estudianteControlador.php";
          require_once "../../../modelo/estudianteModelo.php";
          $estudiante = ControladorEstudiante::ctrInfoEstudiantes();
          foreach ($estudiante as $value) {
          ?>
            <option value="<?php echo $value["id_estudiante"]; ?>" <?php if ($estuGrupo['id_estudiante'] == $value['id_estudiante']) : ?> selected <?php endif; ?>><?php echo $value["nombre_estudiante"]." ".$value["ap_pat_estudiante"]." ".$value["ap_mat_estudiante"]; ?></option>
          <?php
          }
          ?>
        </select>
        <input type="hidden" name="idAsignacion" id="idAsignacion" value="<?php echo $estuGrupo['id_estu_curso']?>">
      </div>
      <div class="form-group col-sm-8">
        <label for="">Nombre del Curso</label>
        <select class="form-control select2bs4" name="nomCurso" id="nomCurso" onchange="MostrarCurso()">
          <option value="">Seleccionar Curso</option>
          <?php
          require_once "../../../controlador/cursoControlador.php";
          require_once "../../../modelo/cursoModelo.php";
          $curso = ControladorCurso::ctrInfoCursos();
          foreach ($curso as $value) {
          ?>
            <option value="<?php echo $value["id_curso"]; ?>" <?php if ($estuGrupo['id_curso'] == $value['id_curso']) : ?> selected <?php endif; ?>><?php echo $value["titulo_curso"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-4">
        <label for="">Nro del Grupo</label>
        <select class="form-control select2bs4" name="nombreGrupo" id="nombreGrupo" disabled>
          <option value="">Seleccionar Grupo</option>
          
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({

      submitHandler: function() {
        EditGrupoAsig()
      }
    })
    $(document).ready(function() {
      $("#FormEditGrupoAsig").validate({
        rules: {
          nombreEstudiante:"required",
          nombreCurso:"required",
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback')
          element.closest('.form-group').append(error)
        },

        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid')
          /* .is-invalid */
        },

        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid')
        }

      })
    })
  })
</script>