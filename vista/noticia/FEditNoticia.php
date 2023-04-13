<?php
require "../../controlador/NoticiaControlador.php";
require "../../modelo/NoticiaModelo.php";

$id = $_GET["id"];
$Noticia = ControladorNoticia::ctrInfoNoticia($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar Noticia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditNoticia">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Título Noticia</label>
        <input type="text" class="form-control" id="nomNoticia" name="nomNoticia" value="<?php echo $Noticia['titulo_noticia'] ?>">
        <input type="hidden" class="form-control" id="idNoticia" name="idNoticia" value="<?php echo $Noticia['id_noticia'] ?>">
      </div>
      
      <div class="form-group col-sm-12">
        <label for="">Contenido</label>
        <textarea name="contenidoNoticia" id="contenidoNoticia" cols="30" rows="4" class="form-control"><?php echo $Noticia['descripcion_noticia'] ?></textarea>
      </div>
      <div class="form-group col-sm-8">
        <label for="">Fecha Noticia</label>
        <input type="date" class="form-control" id="fechaNoticia" name="fechaNoticia" value="<?php echo $Noticia['fecha_noticia'] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado</label>
        <select name="estadoNoticia" id="estadoNoticia" class="form-control">
          <option value="1" <?php if ($Noticia["estado_noticia"] == 1) : ?> selected <?php endif; ?>>Activo</option>
          <option value="0" <?php if ($Noticia["estado_noticia"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
        </select>
      </div>

      <div class="form-group ml-3">
        <label for="">Imagen / Fotografía de Noticia</label>
        <input type="file" class="form-control" id="ImgNoticia" name="ImgNoticia" onchange="previsualizar()">
        <input type="hidden" id="imgActNoticia" name="imgActNoticia" value="<?php echo $Noticia["img_noticia"]; ?>">
        <?php if ($Noticia["img_noticia"] == "") {
        ?>
          <img src="assest/dist/img/noticiaDefault.jpg" class="img-thumbnail previsualizar" width="200">
        <?php
        } else {
        ?>
          <img src="assest/dist/img/noticias/<?php echo $Noticia["img_noticia"]; ?>" class="img-thumbnail previsualizar" width="200px" height="200px">
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
        EditNoticia()
      }
    })
    $(document).ready(function() {
      $("#FormEditNoticia").validate({
        rules: {
          nomNoticia: {
            required: true,
            minlength: 3
          },
          contenidoNoticia: {
            required: true,
            minlength: 5
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