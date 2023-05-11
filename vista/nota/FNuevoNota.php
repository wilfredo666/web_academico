<?php
require "../../controlador/notaControlador.php";
require "../../modelo/notaModelo.php";

$id = $_GET["id"];
/* $cursos = ControladorNota::ctrInfoCursos($id); */
?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Registrar Nueva Nota</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<form action="" id="FormRegNota">
  <div class="modal-body">
    <div class="row">
      <div class="form-group col-sm-12">
        <label for="">Nombre del Curso</label>
        <select class="form-control" name="nomCurso" id="nomCurso">
          <option value="">Seleccionar Curso</option>
          <?php
          require_once "../../controlador/cursoControlador.php";
          require_once "../../modelo/cursoModelo.php";
          $cursos = ControladorNota::ctrInfoCursos($id);
          foreach ($cursos as $value) {
          ?>
            <option value="<?php echo $value["id_curso"]; ?>"><?php echo $value["titulo_curso"]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>

      <!-- <input type="hidden" name="curso_seleccionado" id="curso_seleccionado"> -->

      <div class="form-group col-sm-12">
        <label for="">Módulo</label>
        <select class="form-control" name="nomModulo" id="nomModulo" onclick="BusModuloMateria()">
          <option value="">Seleccionar Módulo</option>
          <?php
          require_once "../../controlador/notaControlador.php";
          require_once "../../modelo/notaModelo.php";
          $modulo = ControladorNota::ctrBusModuloMateria();
          var_dump($modulo);
          ?>
        </select>
      </div>
      <div class="form-group col-sm-12">
        <label for="">Descripción del Nota</label>
        <input type="text" class="form-control" id="nomNota" name="nomNota">
      </div>
      <div class="form-group col-sm-4">
        <label for="">Costo del Nota</label>
        <input type="number" class="form-control" id="costoNota" name="costoNota" placeholder="Costo en Bs.">
      </div>
      <div class="form-group col-sm-8">
        <label for="">Duración del Nota</label>
        <input type="text" class="form-control" id="duracionNota" name="duracionNota">
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
        RegNota()
      }
    })
    $(document).ready(function() {
      $("#FormRegNota").validate({
        rules: {
          nomNota: {
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

  $('.select2bs4').select2({
    theme: 'bootstrap4'
  })
</script>