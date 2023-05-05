<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nuevo Módulo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegModulo">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre del Curso</label>
        <select class="form-control select2bs4" name="nomCurso" id="nomCurso">
          <option value="">Seleccionar Curso</option>
          <?php
          require_once "../../controlador/cursoControlador.php";
          require_once "../../modelo/cursoModelo.php";
          $curso = controladorCurso::ctrInfoCursos();
          foreach ($curso as $value) {
          ?>
            <option value="<?php echo $value["id_curso"]; ?>"><?php echo $value["titulo_curso"]; ?></option>
          <?php
          }
          ?>
        </select>
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