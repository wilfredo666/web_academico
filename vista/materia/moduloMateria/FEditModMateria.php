<?php
require "../../../controlador/materiaControlador.php";
require "../../../modelo/materiaModelo.php";

$id = $_GET["id"];
$modMateria = ControladorMateria::ctrMateriaModulos($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar Asignacion de Grupo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditModMateria">
  <div class="modal-body">
    <div class="row">
    <div class="form-group col-sm-12">
        <label for="">Descrpción del módulo</label>
        <select class="form-control select2bs4" name="nomModulo" id="nomModulo">
          <option value="">Seleccionar Módulo</option>
          <?php
          require_once "../../../controlador/moduloControlador.php";
          require_once "../../../modelo/moduloModelo.php";
          $modulos = ControladorModulo::ctrInfoModulos();
          foreach ($modulos as $value) {
          ?>
            <option value="<?php echo $value["id_modulo"]; ?>" <?php if ($modMateria['id_modulo'] == $value['id_modulo']) : ?> selected <?php endif; ?>><?php echo $value["desc_modulo"]?></option>
          <?php
          }
          ?>
        </select>
        <input type="hidden" name="idAsignacion" id="idAsignacion" value="<?php echo $modMateria['id_modulo_materia']?>">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Nombre de la Materia</label>
        <select class="form-control select2bs4" name="nomMateria" id="nomMateria">
          <option value="">Seleccionar Materia</option>
          <?php
          require_once "../../../controlador/materiaControlador.php";
          require_once "../../../modelo/materiaModelo.php";
          $materia = ControladorMateria::ctrInfoMaterias();
          foreach ($materia as $value) {
          ?>
            <option value="<?php echo $value["id_materia"]; ?>" <?php if ($modMateria['id_materia'] == $value['id_materia']) : ?> selected <?php endif; ?>><?php echo $value["nombre_materia"]; ?></option>
          <?php
          }
          ?>
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
        EditModMateria()
      }
    })
    $(document).ready(function() {
      $("#FormEditModMateria").validate({
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