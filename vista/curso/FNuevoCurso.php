<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nuevo Curso</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegCurso">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Título del Curso</label>
        <input type="text" class="form-control" id="nomCurso" name="nomCurso">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Descripción del Curso</label>
        <input type="text" name="contenidoCurso" id="contenidoCurso" cols="30" rows="3" class="form-control"></input>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Imagen/Fotografía</label>
        <input type="file" class="form-control" id="ImgCurso" name="ImgCurso" onchange="previsualizar()">
        <img src="assest/dist/img/cursoDefault.jpg" class="img-thumbnail previsualizar" width="180" height="180">
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
        RegCurso()
      }
    })
    $(document).ready(function() {
      $("#FormRegCurso").validate({
        rules: {
          nomCurso: {
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