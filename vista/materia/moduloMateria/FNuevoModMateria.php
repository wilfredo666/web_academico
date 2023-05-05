<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nueva Asignacion</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegModMateria">
  <div class="modal-body">
    <div class="row">
    <div class="form-group col-sm-12">
        <label for="">Descripción del Módulo</label>
        <select class="form-control" name="nomModulo" id="nomModulo">
          <option value="">Seleccionar módulo</option>
          <?php
          require_once "../../../controlador/moduloControlador.php";
          require_once "../../../modelo/moduloModelo.php";
          $modulo = controladorModulo::ctrInfoModulos();
          foreach ($modulo as $value) {
          ?>
            <option value="<?php echo $value["id_modulo"]; ?>"><?php echo $value["desc_modulo"] ." - ". $value["titulo_curso"] ; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Nombre de la Materia</label>
        <select class="form-control" name="nomMateria" id="nomMateria">
          <option value="">Seleccionar Materia</option>
          <?php
          require_once "../../../controlador/materiaControlador.php";
          require_once "../../../modelo/materiaModelo.php";
          $curso = controladorMateria::ctrInfoMaterias();
          foreach ($curso as $value) {
          ?>
            <option value="<?php echo $value["id_materia"]; ?>"><?php echo $value["nombre_materia"]; ?></option>
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
        RegModMateria()
      }
    })
    $(document).ready(function() {
      $("#FormRegModMateria").validate({
        rules: {
          nomEstudiante:"required",
          nomCurso:"required",
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