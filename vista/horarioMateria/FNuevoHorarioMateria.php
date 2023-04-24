<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Asignar Horario a Materia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegHorarioMateria">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre de la Materia</label>
        <select class="form-control select2bs4" name="nomMateria" id="nomMateria">
          <option value="">Seleccionar Materia</option>
          <?php
          require_once "../../controlador/materiaControlador.php";
          require_once "../../modelo/materiaModelo.php";
          $Horario = controladorMateria::ctrInfoListaMaterias();
          foreach ($Horario as $value) {
          ?>
            <option value="<?php echo $value["id_materia"]; ?>"><?php echo $value["nombre_materia"];?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="">Duración de Clases (En horas)</label>
        <input type="time" class="form-control" id="duracionMateria" name="duracionMateria">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Hora de Clases</label>
        <input type="time" class="form-control" id="horaMateria" name="horaMateria">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Día de Clases</label>
        <select class="form-control" name="diaClases" id="diaClases">
          <option value="">Seleccionar Día</option>         
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>
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
        RegHorarioMateria()
      }
    })
    $(document).ready(function() {
      $("#FormRegHorarioMateria").validate({
        rules: {
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