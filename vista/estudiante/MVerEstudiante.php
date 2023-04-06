<?php
require "../../controlador/estudianteControlador.php";
require "../../modelo/estudianteModelo.php";

$id = $_GET["id"];
$estudiante = controladorEstudiante::ctrInfoEstudiante($id);

?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Información del Estudiante</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <div class="row">

    <div class="col-7">
      <table class="table">
        <tr>
          <th>Nombre</th>
          <td><?php echo $estudiante["nombre_estudiante"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Paterno</th>
          <td><?php echo $estudiante["ap_pat_estudiante"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Materno</th>
          <td><?php echo $estudiante["ap_mat_estudiante"]; ?></td>
        </tr>

        <tr>
          <th>NRO Matrícula</th>
          <td><?php echo $estudiante["matricula"]; ?></td>
        </tr>

        <tr>
          <th>C.I.</th>
          <td><?php echo $estudiante["ci_estudiante"]; ?></td>
        </tr>

        <tr>
          <th>Teléfono / Celular</th>
          <td><?php echo $estudiante["telefono_estudiante"]; ?></td>
        </tr>

        <tr>
          <th>Fecha Nacimiento</th>
          <td><?php echo $estudiante["fecha_nac_estudiante"]; ?></td>
        </tr>

        <tr>
          <th>Dirección domicilio</th>
          <td><?php echo $estudiante["direccion_estudiante"]; ?> </td>
        </tr>


        <tr>
          <th>Estado</th>
          <?php
          if ($estudiante["estado_estudiante"] == 1) {
          ?>
            <td><span class="badge badge-success">Activo</span></td>
          <?php
          } else {
          ?>
            <td><span class="badge badge-danger">Inactivo</span></td>
          <?php
          }
          ?>

        </tr>

      </table>
    </div>
    <div class="col-5 align-items-center justify-content-between text-center">

      <?php
      if ($estudiante["img_estudiante"] == "") {
      ?>
        <img src="assest/dist/img/default.jpg" alt="" width="300" class="img-thumbnail">
      <?php
      } else {
      ?>
        <img src="assest/dist/img/estudiantes/<?php echo $estudiante["img_estudiante"]; ?>" alt="" width="300" class="img-thumbnail">
      <?php
      }
      ?>

    </div>

  </div>



</div>