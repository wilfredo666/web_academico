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
        <select class="form-control select2bs4" name="nombreMateria" id="nombreMateria">
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
      <div class="form-group col-sm-6">
        <label for="">Duración de Clases</label>
        <input type="time" class="form-control" id="duracionMateria" name="duracionMateria" value="<?php echo $Horario['duracion']?>">
        <input type="hidden" value="<?php echo $Horario["id_horario"] ?>" name="idHorarioMateria" id="idHorarioMateria">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Hora de Clases</label>
        <input type="time" class="form-control" id="horaMateria" name="horaMateria" value="<?php echo $Horario['hora']?>">
      </div>
      <div class="form-group col-sm-6">
        <label for="">Día de Clases</label>
        <select class="form-control" name="diaClases" id="diaClases">
          <option value="">Seleccionar Día</option>         
            <option value="Lunes" <?php if($Horario['dia']=='Lunes'):?> selected <?php endif;?>>Lunes</option>
            <option value="Martes" <?php if($Horario['dia']=='Martes'):?> selected <?php endif;?>>Martes</option>
            <option value="Miercoles" <?php if($Horario['dia']=='Miercoles'):?> selected <?php endif;?>>Miercoles</option>
            <option value="Jueves" <?php if($Horario['dia']=='Jueves'):?> selected <?php endif;?>>Jueves</option>
            <option value="Viernes" <?php if($Horario['dia']=='Viernes'):?> selected <?php endif;?>>Viernes</option>
            <option value="Sabado" <?php if($Horario['dia']=='Sabado'):?> selected <?php endif;?>>Sabado</option>
            <option value="Domingo" <?php if($Horario['dia']=='Domingo'):?> selected <?php endif;?>>Domingo</option>
        </select>
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