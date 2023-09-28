<?php
/* require "../controlador/notaControlador.php";
require "../modelo/notaModelo.php"; */
$idEstudiante = $_POST["idEstudiante"];
$idGrupo = $_POST["idGrupo"];
$idCurso = $_POST["idCurso"];
$idModulo = $_POST["idModulo"];
$idMateria = $_POST["idMateria"];
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nueva Nota</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">../
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegNota">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="">EXAMEN</label>
        <input type="number" class="form-control" id="examen" name="examen">
      </div>
      <div class="form-group col-sm-6">
        <label for="">PRACTICAS</label>
        <input type="number" class="form-control" id="practicas" name="practicas">
      </div>
      <div class="form-group col-sm-6">
        <label for="">ASISTENCIA</label>
        <input type="number" class="form-control" id="asistencia" name="asistencia">
      </div>
      <div class="form-group col-sm-6">
        <label for="">CONTROLES</label>
        <input type="number" class="form-control" id="controles" name="controles">
      </div>
      <div class="form-group col-sm-12">
        <label for="">OBSERVACIONES</label>
        <input type="text" class="form-control" id="observacion" name="observacion">
      </div>
      <input type="hidden" id="idEstudiante" name="idEstudiante" value="<?php echo $idEstudiante; ?>">
      <input type="hidden" id="idGrupo" name="idGrupo" value="<?php echo $idGrupo; ?>">
      <input type="hidden" id="idCurso" name="idCurso" value="<?php echo $idCurso; ?>">
      <input type="hidden" id="idModulo" name="idModulo" value="<?php echo $idModulo; ?>">
      <input type="hidden" id="idMateria" name="idMateria" value="<?php echo $idMateria; ?>">
    </div>
  </div>

  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary" id="guardar" style="background-color: #001a34; color: #ffffff">Guardar</button>
  </div>
</form>


<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        RegNota()
      }
    })
    $(document).ready(function() {
      $("#FormRegNota").validate({
        /* rules: {
          nomNota: {
            required: true,
            minlength: 3
          },
        }, */
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