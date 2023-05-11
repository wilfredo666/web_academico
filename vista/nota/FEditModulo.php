<?php
require "../../controlador/moduloControlador.php";
require "../../modelo/moduloModelo.php";

$id = $_GET["id"];
$modulo = ControladorModulo::ctrInfoModulo($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar Modulo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditModulo">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre del Curso</label>
        <select class="form-control select2bs4" name="nombreCurso" id="nombreCurso">
          <option value="">Seleccionar Curso</option>
          <?php
          require_once "../../controlador/cursoControlador.php";
          require_once "../../modelo/cursoModelo.php";
          $curso = ControladorCurso::ctrInfoCursos();
          foreach ($curso as $value) {
          ?>
            <option value="<?php echo $value["id_curso"]; ?>" <?php if ($modulo['id_curso'] == $value['id_curso']) : ?> selected <?php endif; ?>><?php echo $value["titulo_curso"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="">Descripción de Módulo</label>
        <input type="text" class="form-control" id="nomModulo" name="nomModulo" value="<?php echo $modulo['desc_modulo'] ?>">
        <input type="hidden" class="form-control" id="idModulo" name="idModulo" value="<?php echo $modulo['id_modulo'] ?>">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Duración del Módulo</label>
        <input type="text" class="form-control" id="duracionModulo" name="duracionModulo" value="<?php echo $modulo['duracion_modulo'] ?>">
      </div>
      <div class="form-group col-sm-8">
        <label for="">Costo del Módulo</label>
        <input type="number" class="form-control" id="costoModulo" name="costoModulo" value="<?php echo $modulo['costo_modulo'] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado</label>
        <select name="estadoModulo" id="estadoModulo" class="form-control">
          <option value="1" <?php if ($modulo["estado_modulo"] == 1) : ?> selected <?php endif; ?>>Activo</option>
          <option value="0" <?php if ($modulo["estado_modulo"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
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
        EditModulo()
      }
    })
    $(document).ready(function() {
      $("#FormEditModulo").validate({
        rules: {
          nomModulo: {
            required: true,
            minlength: 3
          },
          contenidoModulo: {
            required: true,
            minlength: 5
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