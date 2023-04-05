<?php
require "../../controlador/docenteControlador.php";
require "../../modelo/docenteModelo.php";

$id = $_GET["id"];
$docente = ControladorDocente::ctrInfoDocente($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar nuevo Docente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditDocente">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nomDocente" name="nomDocente" value="<?php echo $docente['nombre_docente'] ?>">
        <input type="hidden" class="form-control" id="idDocente" name="idDocente" value="<?php echo $docente['id_docente'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="paternoDocente" name="paternoDocente" value="<?php echo $docente['ap_pat_docente'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Appellido Materno</label>
        <input type="text" class="form-control" id="maternoDocente" name="maternoDocente" value="<?php echo $docente['ap_mat_docente'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">C.I. / Cédula de Identidad</label>
        <input type="text" class="form-control" id="ciDocente" name="ciDocente" value="<?php echo $docente['ci_docente'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Teléfono/Celular</label>
        <input type="text" class="form-control" id="telefonoDocente" name="telefonoDocente" value="<?php echo $docente['telefono_docente'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Fecha Nacimiento</label>
        <input type="date" class="form-control" id="nacimientoDocente" name="nacimientoDocente" value="<?php echo $docente['fecha_nac_docente'] ?>">
      </div>
      <div class="form-group col-sm-8">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccionDocente" name="direccionDocente" value="<?php echo $docente['direccion_docente'] ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="">Estado</label>
        <select name="estadoDocente" id="estadoDocente" class="form-control">
          <option value="1" <?php if ($docente["estado_docente"] == 1) : ?> selected <?php endif; ?>>Activo</option>
          <option value="0" <?php if ($docente["estado_docente"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
        </select>
      </div>

      <div class="form-group ml-2">
        <label for="">Imagen / Fotografía</label>
        <input type="file" class="form-control" id="ImgDocente" name="ImgDocente" onchange="previsualizar()">
        <input type="hidden" id="imgActDocente" name="imgActDocente" value="<?php echo $docente["img_docente"]; ?>">
        <?php if ($docente["img_docente"] == "") {
        ?>
          <img src="assest/dist/img/default.jpg" class="img-thumbnail previsualizar" width="200">
        <?php
        } else {
        ?>
          <img src="assest/dist/img/docentes/<?php echo $docente["img_docente"]; ?>" class="img-thumbnail previsualizar" width="200px" height="200px">
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
        EditDocente()
      }
    })
    $(document).ready(function() {
      $("#FormEditDocente").validate({
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