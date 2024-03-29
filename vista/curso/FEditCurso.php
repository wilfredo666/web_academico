<?php
require "../../controlador/cursoControlador.php";
require "../../modelo/cursoModelo.php";

$id = $_GET["id"];
$Curso = ControladorCurso::ctrInfoCurso($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar Curso</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditCurso">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Título del Curso</label>
        <input type="text" class="form-control" id="nomCurso" name="nomCurso" value="<?php echo $Curso['titulo_curso'] ?>">
        <input type="hidden" class="form-control" id="idCurso" name="idCurso" value="<?php echo $Curso['id_curso'] ?>">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Descripción del Curso</label>
        <input type="text" class="form-control" id="descCurso" name="descCurso" value="<?php echo $Curso['descripcion_curso'] ?>">
      </div>
      <div class="form-group col-sm-12">
        <label for="">Imagen / Fotografía</label>
        <input type="file" class="form-control" id="ImgCurso" name="ImgCurso" onchange="previsualizarCurso()">
        <input type="hidden" id="imgActCurso" name="imgActCurso" value="<?php echo $Curso["img_curso"]; ?>">
        <?php if ($Curso["img_curso"] == "") {
        ?>
          <img src="assest/dist/img/cursoDefault.jpg" class="img-thumbnail previsualizar" width="200">
        <?php
        } else {
        ?>
          <img src="assest/dist/img/cursos/<?php echo $Curso["img_curso"]; ?>" class="img-thumbnail previsualizar" width="200px" height="200px">
        <?php
        }
        ?>
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
        EditCurso()
      }
    })
    $(document).ready(function() {
      $("#FormEditCurso").validate({
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