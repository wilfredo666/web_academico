<?php
require "../../controlador/estudianteControlador.php";
require "../../modelo/estudianteModelo.php";

$id = $_GET["id"];
$estudiante = ControladorEstudiante::ctrInfoEstudiante($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar nuevo Estudiante</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditEstudiante">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="">Nombres</label>
        <input type="text" class="form-control" id="nomEstudiante" name="nomEstudiante" value="<?php echo $estudiante['nombre_estudiante'] ?>">
        <input type="hidden" class="form-control" id="idEstudiante" name="idEstudiante" value="<?php echo $estudiante['id_estudiante'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Apellido Paterno</label>
        <input type="text" class="form-control" id="paternoEstudiante" name="paternoEstudiante" value="<?php echo $estudiante['ap_pat_estudiante'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Appellido Materno</label>
        <input type="text" class="form-control" id="maternoEstudiante" name="maternoEstudiante" value="<?php echo $estudiante['ap_mat_estudiante'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">C.I. / Cédula de Identidad</label>
        <input type="text" class="form-control" id="ciEstudiante" name="ciEstudiante" value="<?php echo $estudiante['ci_estudiante'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Nro Matrícula</label>
        <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $estudiante['matricula'] ?>">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Teléfono/Celular</label>
        <input type="text" class="form-control" id="telefonoEstudiante" name="telefonoEstudiante" value="<?php echo $estudiante['telefono_estudiante'] ?>">
      </div>
      <div class="form-group col-sm-3">
        <label for="">Fecha Nacimiento</label>
        <input type="date" class="form-control" id="nacimientoEstudiante" name="nacimientoEstudiante" value="<?php echo $estudiante['fecha_nac_estudiante'] ?>">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Dirección</label>
        <input type="text" class="form-control" id="direccionEstudiante" name="direccionEstudiante" value="<?php echo $estudiante['direccion_estudiante'] ?>">
      </div>
      <div class="form-group col-md-3">
        <label for="">Estado</label>
        <select name="estadoEstudiante" id="estadoEstudiante" class="form-control">
          <option value="1" <?php if ($estudiante["estado_estudiante"] == 1) : ?> selected <?php endif; ?>>Activo</option>
          <option value="0" <?php if ($estudiante["estado_estudiante"] == 0) : ?> selected <?php endif; ?>>Inactivo</option>
        </select>
      </div>

      <div class="form-group col-md-6">
        <label for="">Imagen / Fotografía</label>
        <input type="file" class="form-control" id="ImgEstudiante" name="ImgEstudiante" onchange="previsualizar()">
        <input type="hidden" id="imgActEstudiante" name="imgActEstudiante" value="<?php echo $estudiante["img_estudiante"]; ?>">
        <?php if ($estudiante["img_estudiante"] == "") {
        ?>
          <img src="assest/dist/img/default.jpg" class="img-thumbnail previsualizar" width="200">
        <?php
        } else {
        ?>
          <img src="assest/dist/img/estudiantes/<?php echo $estudiante["img_estudiante"]; ?>" class="img-thumbnail previsualizar" width="200px" height="200px">
        <?php
        }
        ?>
      </div>

      <div class="form-group col-sm-6">
        <label for="">ASIGNAR CREDENCIALES DE ACCESO</label>
        <?php if ($estudiante["id_usuario"] == 0) {
        ?>
          <select class="form-control badge-info" name="credencialAcceso" id="credencialAcceso">

            <option value="0">Seleccionar Credenciales de Acceso</option>
            <option value="0">Seleccionar Credenciales de Acceso</option>
            <?php
            require_once "../../controlador/usuarioControlador.php";
            require_once "../../modelo/usuarioModelo.php";
            $estudiante = ControladorUsuario::ctrCredencialEstudiantes();
            foreach ($estudiante as $value) {
            ?>
              <option value="<?php echo $value["id_usuario"]; ?>"><?php echo 'Estudiante : ' . $value['nombre_usuario'] ?></option>
            <?php
            }
            ?>
          </select>
        <?php
        } else {
        ?>
          <select name="idUsuarioAcceso" id="idUsuarioAcceso" class="form-control" readonly>
            <option value="<?php echo $estudiante["id_usuario"] ?>">Credenciales Asignadas</option>
          </select>
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
        EditEstudiante()
      }
    })
    $(document).ready(function() {
      $("#FormEditEstudiante").validate({
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