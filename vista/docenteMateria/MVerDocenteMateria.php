<?php
require "../../controlador/docenteControlador.php";
require "../../modelo/docenteModelo.php";

$id = $_GET["id"];
$docente = controladorDocente::ctrInfoDocenteMaterias($id);

?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Información del la Asignación</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-12">
      <table class="table">
        <tr>
          <th>Docente</th>
          <td><?php echo $docente["nombre_docente"] ." ".$docente["ap_pat_docente"]." ".$docente["ap_mat_docente"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Materno</th>
          <td><?php echo $docente["nombre_materia"]; ?></td>
        </tr>
                
        <tr>
          <th>Fecha de Materia</th>
          <td><?php echo $docente["dia"]; ?></td>
        </tr>

        <tr>
          <th>Hora de Materia</th>
          <td><?php echo $docente["hora"]; ?> </td>
        </tr>

      </table>
    </div>
  </div>
</div>