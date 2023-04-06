<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nueva Materia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegMateria">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre de la Materia</label>
        <input type="text" class="form-control" id="nomMateria" name="nomMateria">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Contenido de la Materia</label>
        <textarea name="contenidoMateria" id="contenidoMateria" cols="30" rows="3" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="">Imagen/Fotografía</label>
        <input type="file" class="form-control" id="ImgMateria" name="ImgMateria" onchange="previsualizar()">
        <img src="assest/dist/img/materiaDefault.png" class="img-thumbnail previsualizar" width="180">
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
        RegMateria()
      }
    })
    $(document).ready(function() {
      $("#FormRegMateria").validate({
        rules: {
          nomMateria: {
            required: true,
            minlength: 3
          },
          contenidoMateria: {
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
</script>