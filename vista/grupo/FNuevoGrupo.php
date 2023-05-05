<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nuevo Grupo</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegGrupo">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="">Nro del Grupo</label>
        <input type="number" class="form-control" id="nomGrupo" name="nomGrupo">
      </div>
      <div class="form-group col-sm-8">
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
      <div class="form-group col-sm-6">
        <label for="">Fecha de Inicio</label>
        <input type="date" name="fechaInicio" id="fechaInicio" class="form-control"></input>
      </div>
      <div class="form-group col-sm-6">
        <label for="">Turno</label>
        <input type="text" class="form-control" id="turno" name="turno">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Hora de Inicio</label>
        <input type="time" class="form-control" id="horaInicio" name="horaInicio">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Hora Fin</label>
        <input type="time" class="form-control" id="horaFin" name="horaFin">
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
        RegGrupo()
      }
    })
    $(document).ready(function() {
      $("#FormRegGrupo").validate({
        rules: {
          nomGrupo: {
            required: true,
           /*  minlength: 3 */
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