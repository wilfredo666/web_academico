<?php
require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php";

$id = $_GET["id"];
$Horario = ControladorMateria::ctrInfoHorarioMaterias($id);
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Editar nuevo Horario</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormEditHorarioMateria">
<div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre de la Materia</label>
        <select class="form-control select2bs4" name="nomMateria" id="nomMateria">
          <option value="">Seleccionar Materia</option>
          <?php
          require_once "../../controlador/materiaControlador.php";
          require_once "../../modelo/materiaModelo.php";
          $materia = ControladorMateria::ctrInfoMaterias();
          foreach ($materia as $value) {
          ?>
           <option value="<?php echo $value["id_materia"]; ?>" <?php if($Horario['id_materia']==$value['id_materia']):?> selected <?php endif;?>><?php echo $value["nombre_materia"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Nombre del Docente</label>
        <select class="form-control select2bs4" name="nomDocente" id="nomDocente">
          <option value="">Seleccionar Docente</option>
          <?php
          require_once "../../controlador/docenteControlador.php";
          require_once "../../modelo/docenteModelo.php";
          $docente = controladorDocente::ctrInfoDocentes();
          foreach ($docente as $value) {
          ?>
            <option value="<?php echo $value["id_docente"]; ?>" <?php 
             if($Horario['id_docente']==$value['id_docente']):?> selected <?php endif;?>><?php echo $value["nombre_docente"] . " " . $value["ap_pat_docente"] . " " . $value["ap_mat_docente"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Días de Clases</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Lunes" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox1">Lunes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Martes" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox2">Martes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Miercoles" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox3">Miércoles</label>
        </div>
      </div>
      <div class="form-group col-sm-12">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Jueves" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox4">Jueves</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Viernes" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox5">Viernes</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="Sabado" name="diaclase[]">
          <label class="form-check-label" for="inlineCheckbox6">Sábado</label>
        </div>
      </div>
      <div class="form-group col-sm-6">
        <label for="">Horario Inicio</label>
        <input type="time" class="form-control" id="horaInicio" name="horaInicio" value="<?php echo $Horario['hora_inicio']?>">
        <input type="hidden" value="<?php echo $Horario["id_horario"] ?>" name="idHorarioMateria" id="idHorarioMateria">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Hora Final</label>
        <input type="time" class="form-control" id="horaFin" name="horaFin" value="<?php echo $Horario['hora_fin']?>">
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
        EditHorarioMateria()
      }
    })
    $(document).ready(function() {
      $("#FormEditHorarioMateria").validate({
        rules: {
          /* nomHorario: {
            required: true,
            minlength: 3
          },
          ciHorario: {
            required: true,
            minlength: 5
          }, */
          /* passHorario:{
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