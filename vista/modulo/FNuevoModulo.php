<?php
require "../../controlador/cursoControlador.php";
require "../../modelo/cursoModelo.php";

$id = $_GET["id"];
$curso = controladorCurso::ctrInfoCurso($id);

?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Añadir Nuevo Módulo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegModulo">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Curso</label>
        <input type="text" class="form-control" id="nomCursos" name="nomCursos" value="<?php echo $curso["titulo_curso"]; ?>" readonly>
        <input type="hidden" class="form-control" id="nomCurso" name="nomCurso" value="<?php echo $curso["id_curso"]; ?>">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Descripción del Modulo</label>
        <input type="text" class="form-control" id="nomModulo" name="nomModulo">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Costo del Modulo</label>
        <input type="number" class="form-control" id="costoModulo" name="costoModulo" placeholder="Costo en Bs.">
      </div>
      <div class="form-group col-sm-8">
        <label for="">Duración del Modulo</label>
        <input type="text" class="form-control" id="duracionModulo" name="duracionModulo">
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
        RegModulo()
      }
    })
    $(document).ready(function() {
      $("#FormRegModulo").validate({
        rules: {
          nomModulo: {
            required: true,
            minlength: 3
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

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>