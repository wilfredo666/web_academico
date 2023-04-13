<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nueva Noticia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegNoticia">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Título de la Noticia</label>
        <input type="text" class="form-control" id="nomNoticia" name="nomNoticia">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Contenido de la Noticia</label>
        <textarea name="contenidoNoticia" id="contenidoNoticia" cols="30" rows="3" class="form-control"></textarea>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Fecha de Noticia</label>
        <input type="date" class="form-control" id="fechaNoticia" name="fechaNoticia">
      </div>
      <div class="form-group">
        <label for="">Imagen/Fotografía de Noticia</label>
        <input type="file" class="form-control" id="ImgNoticia" name="ImgNoticia" onchange="previsualizar()">
        <img src="assest/dist/img/noticiaDefault.jpg" class="img-thumbnail previsualizar" width="180">
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
        RegNoticia()
      }
    })
    $(document).ready(function() {
      $("#FormRegNoticia").validate({
        rules: {
          nomNoticia: {
            required: true,
            minlength: 3
          },
          contenidoNoticia: {
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