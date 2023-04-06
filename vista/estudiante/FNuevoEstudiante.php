<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nuevo Estudiante</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegEstudiante">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nomEstudiante" name="nomEstudiante">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="paternoEstudiante" name="paternoEstudiante">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Appellido Materno</label>
        <input type="text" class="form-control" id="maternoEstudiante" name="maternoEstudiante">
      </div>
      <div class="form-group col-sm-4">
        <label for="">C.I. / Cédula de Identidad</label>
        <input type="text" class="form-control" id="ciEstudiante" name="ciEstudiante">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Nro. Matrícula</label>
        <input type="text" class="form-control" id="matriculaEstudiante" name="matriculaEstudiante">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Fecha Nacimiento</label>
        <input type="date" class="form-control" id="nacimientoEstudiante" name="nacimientoEstudiante">
      </div>
      <div class="form-group col-sm-3">
        <label for="">Teléfono/Celular</label>
        <input type="text" class="form-control" id="telefonoEstudiante" name="telefonoEstudiante">
      </div>
      <div class="form-group col-sm-9">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccionEstudiante" name="direccionEstudiante">
      </div>
      
      <div class="form-group">
        <label for="">Imagen/Fotografía</label>
        <input type="file" class="form-control" id="ImgEstudiante" name="ImgEstudiante" onchange="previsualizar()">

        <img src="assest/dist/img/default.jpg" class="img-thumbnail previsualizar" width="200">
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
        RegEstudiante()
      }
    })
    $(document).ready(function() {
      $("#FormRegEstudiante").validate({
        rules: {
          nomEstudiante: {
            required: true,
            minlength: 3
          },
          ciEstudiante: {
            required: true,
            minlength: 5
          },
          /* passEstudiante:{
            required:true,
            minlength:8
          },  */
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