<?php
require "../../controlador/grupoControlador.php";
require "../../modelo/grupoModelo.php";

$id = $_GET["id"];
$grupo = ControladorGrupo::ctrInfoGrupo($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar Grupo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditGrupo">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="">Nro de Grupo</label>
        <input type="text" class="form-control" id="nomGrupo" name="nomGrupo" value="<?php echo $grupo['desc_grupo'] ?>" readonly>
        <input type="hidden" class="form-control" id="idGrupo" name="idGrupo" value="<?php echo $grupo['id_grupo'] ?>">
      </div>
      <div class="form-group col-sm-8">
        <label for="">Nombre del Curso</label>
        <select class="form-control select2bs4" name="nombreCurso" id="nombreCurso">
          <option value="">Seleccionar Curso</option>
          <?php
          require_once "../../controlador/cursoControlador.php";
          require_once "../../modelo/cursoModelo.php";
          $curso = ControladorCurso::ctrInfoCursos();
          foreach ($curso as $value) {
          ?>
            <option value="<?php echo $value["id_curso"]; ?>" <?php if ($grupo['id_curso'] == $value['id_curso']) : ?> selected <?php endif; ?>><?php echo $value["titulo_curso"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="">Fecha de Inicio</label>
        <input type="date" name="fechaInicio" id="fechaInicio" class="form-control" value="<?php echo $grupo['fecha_inicio']?>">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Turno</label>
        <input type="text" class="form-control" id="turno" name="turno" value="<?php echo $grupo['turno']?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Hora de Inicio</label>
        <input type="time" class="form-control" id="horaInicio" name="horaInicio" value="<?php echo $grupo['hora_inicio']?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Hora Fin</label>
        <input type="time" class="form-control" id="horaFin" name="horaFin" value="<?php echo $grupo['hora_fin']?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado</label>
        <select name="estadoGrupo" id="estadoGrupo" class="form-control">
          <option value="1" <?php if ($grupo["estado_grupo"] == 1) : ?> selected <?php endif; ?>>Activo</option>
          <option value="0" <?php if ($grupo["estado_grupo"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
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
        EditGrupo()
      }
    })
    $(document).ready(function() {
      $("#FormEditGrupo").validate({
        rules: {
          nomGrupo: {
            required: true,
            /* minlength: 3 */
          },
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