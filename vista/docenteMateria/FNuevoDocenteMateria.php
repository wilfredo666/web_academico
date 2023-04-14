<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Asignar Docente a Materia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegDocenteMateria">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre del Docente</label>
        <select class="form-control select2bs4" name="nomDocente" id="nomDocente">
          <option value="">Seleccionar Docente</option>
          <?php
          require_once "../../controlador/docenteControlador.php";
          require_once "../../modelo/docenteModelo.php";
          $docente = ControladorDocente::ctrInfoDocentes();
          foreach ($docente as $value) {
          ?>
            <option value="<?php echo $value["id_docente"]; ?>"><?php echo $value["nombre_docente"] ." ".$value["ap_pat_docente"]." ".$value["ap_mat_docente"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Materia</label>
        <select class="form-control select2bs4" name="nomMateria" id="nomMateria">
          <option value="">Seleccionar Materia</option>
          <?php
          require_once "../../controlador/materiaControlador.php";
          require_once "../../modelo/materiaModelo.php";
          $materia = ControladorMateria::ctrInfoMaterias();
          foreach ($materia as $value) {
          ?>
            <option value="<?php echo $value["id_materia"]; ?>"><?php echo $value["nombre_materia"]?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="">Fecha de Clases</label>
        <input type="date" class="form-control" id="fechaMateria" name="fechaMateria">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Hora de Clases</label>
        <input type="time" class="form-control" id="horaMateria" name="horaMateria">
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
        RegDocenteMateria()
      }
    })
    $(document).ready(function() {
      $("#FormRegDocenteMateria").validate({
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