<?php
require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php";

$id = $_GET["id"];
$materia = ControladorMateria::ctrInfoMateria($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar Materia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditMateria">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-8">
        <label for="">Nombre Materia</label>
        <input type="text" class="form-control" id="nomMateria" name="nomMateria" value="<?php echo $materia['nombre_materia'] ?>">
        <input type="hidden" class="form-control" id="idMateria" name="idMateria" value="<?php echo $materia['id_materia'] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado</label>
        <select name="estadoMateria" id="estadoMateria" class="form-control">
          <option value="1" <?php if ($materia["estado_materia"] == 1) : ?> selected <?php endif; ?>>Activo</option>
          <option value="0" <?php if ($materia["estado_materia"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Contenido</label>
        <textarea name="contenidoMateria" id="contenidoMateria" cols="30" rows="4" class="form-control"><?php echo $materia['contenido_materia'] ?></textarea>
      </div>
      

      <div class="form-group ml-3">
        <label for="">Imagen / Fotografía</label>
        <input type="file" class="form-control" id="ImgMateria" name="ImgMateria" onchange="previsualizar()">
        <input type="hidden" id="imgActMateria" name="imgActMateria" value="<?php echo $materia["img_materia"]; ?>">
        <?php if ($materia["img_materia"] == "") {
        ?>
          <img src="assest/dist/img/materiaDefault.png" class="img-thumbnail previsualizar" width="200">
        <?php
        } else {
        ?>
          <img src="assest/dist/img/materias/<?php echo $materia["img_materia"]; ?>" class="img-thumbnail previsualizar" width="200px" height="200px">
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
        EditMateria()
      }
    })
    $(document).ready(function() {
      $("#FormEditMateria").validate({
        rules: {
          nomMateria: {
            required: true,
            minlength: 3
          },
          contenidoMateria: {
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