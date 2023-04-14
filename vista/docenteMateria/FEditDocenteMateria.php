<?php
require "../../controlador/docenteControlador.php";
require "../../modelo/docenteModelo.php";

$id = $_GET["id"];
$docente = ControladorDocente::ctrInfoDocenteMaterias($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar nuevo Docente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditDocenteMateria">
<div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre del Docente</label>
        <select class="form-control select2bs4" name="docenteAsignacion" id="docenteAsignacion">
          <option value="">Seleccionar Docente</option>
          <?php
          require_once "../../controlador/docenteControlador.php";
          require_once "../../modelo/docenteModelo.php";
          $docentes = ControladorDocente::ctrInfoDocentes();
          foreach ($docentes as $value) {
          ?>
            <option value="<?php echo $value["id_docente"]; ?>" <?php if($docente['id_docente']==$value['id_docente']):?> selected <?php endif;?>><?php echo $value["nombre_docente"] ." ".$value["ap_pat_docente"]." ".$value["ap_mat_docente"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Materia</label>
        <select class="form-control select2bs4" name="materiaAsignacion" id="materiaAsignacion">
          <option value="">Seleccionar Materia</option>
          <?php
          require_once "../../controlador/materiaControlador.php";
          require_once "../../modelo/materiaModelo.php";
          $materia = ControladorMateria::ctrInfoMaterias();
          foreach ($materia as $value) {
          ?>
           <option value="<?php echo $value["id_materia"]; ?>" <?php if($docente['id_materia']==$value['id_materia']):?> selected <?php endif;?>><?php echo $value["nombre_materia"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="">Fecha de Clases</label>
        <input type="date" class="form-control" id="fechaMateria" name="fechaMateria" value="<?php echo $docente['dia']?>">
        <input type="hidden" value="<?php echo $docente["id_docente_materia"] ?>" name="idDocenteMateria" id="idDocenteMateria">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Hora de Clases</label>
        <input type="time" class="form-control" id="horaMateria" name="horaMateria" value="<?php echo $docente['hora']?>">
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
        EditDocenteMateria()
      }
    })
    $(document).ready(function() {
      $("#FormEditDocenteMateria").validate({
        rules: {
          /* nomDocente: {
            required: true,
            minlength: 3
          },
          ciDocente: {
            required: true,
            minlength: 5
          }, */
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
  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>