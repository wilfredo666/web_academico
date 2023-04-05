<?php
require "../../controlador/docenteControlador.php";
require "../../modelo/docenteModelo.php";

$id = $_GET["id"];
$docente = controladorDocente::ctrInfoDocente($id);

?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Información del Docente</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <div class="row">

    <div class="col-6">
      <table class="table">
        <tr>
          <th>Nombre</th>
          <td><?php echo $docente["nombre_docente"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Paterno</th>
          <td><?php echo $docente["ap_pat_docente"]; ?></td>
        </tr>

        <tr>
          <th>Apellido Materno</th>
          <td><?php echo $docente["ap_mat_docente"]; ?></td>
        </tr>

        <tr>
          <th>C.I.</th>
          <td><?php echo $docente["ci_docente"]; ?></td>
        </tr>

        <tr>
          <th>Teléfono / Celular</th>
          <td><?php echo $docente["telefono_docente"]; ?></td>
        </tr>

        <tr>
          <th>Fecha Nacimiento</th>
          <td><?php echo $docente["fecha_nac_docente"]; ?></td>
        </tr>

        <tr>
          <th>Dirección domicilio</th>
          <td><?php echo $docente["direccion_docente"]; ?> </td>
        </tr>


        <tr>
          <th>Estado</th>
          <?php
          if ($docente["estado_docente"] == 1) {
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
    <div class="col-6 align-items-center justify-content-between text-center">

      <?php
      if ($docente["img_docente"] == "") {
      ?>
        <img src="assest/dist/img/default.jpg" alt="" width="300">
      <?php
      } else {
      ?>
        <img src="assest/dist/img/docentes/<?php echo $docente["img_docente"]; ?>" alt="" width="300">
      <?php
      }
      ?>

    </div>

  </div>



</div>