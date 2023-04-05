<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar nuevo Docente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegDocente">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nomDocente" name="nomDocente">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="paternoDocente" name="paternoDocente">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Appellido Materno</label>
        <input type="text" class="form-control" id="maternoDocente" name="maternoDocente">
      </div>
      <div class="form-group col-sm-4">
        <label for="">C.I. / Cédula de Identidad</label>
        <input type="text" class="form-control" id="ciDocente" name="ciDocente">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Teléfono/Celular</label>
        <input type="text" class="form-control" id="telefonoDocente" name="telefonoDocente">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Fecha Nacimiento</label>
        <input type="date" class="form-control" id="nacimientoDocente" name="nacimientoDocente">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccionDocente" name="direccionDocente">
      </div>
      
      <div class="form-group">
        <label for="">Imagen/Fotografía</label>
        <input type="file" class="form-control" id="ImgDocente" name="ImgDocente" onchange="previsualizar()">

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
        RegDocente()
      }
    })
    $(document).ready(function() {
      $("#FormRegDocente").validate({
        rules: {
          nomDocente: {
            required: true,
            minlength: 3
          },
          ciDocente: {
            required: true,
            minlength: 5
          },
          /* passDocente:{
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