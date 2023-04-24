
<?php
require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php";

$id = $_GET["id"];
$materia = controladorMateria::ctrInfoDetalleMateria($id);
/* var_dump($materia); */
?>
<style>
  body{
    font-size: 14px;
  }
</style>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Información de la Materia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <div class="row">

    <div class="col-7">
      <table class="table">
        <tr>
          <th>Nombre de Materia</th>
          <td><?php echo $materia["nombre_materia"]; ?></td>
        </tr>

        <tr>
          <th>Contenido</th>
          <td><?php echo $materia["contenido_materia"]; ?></td>
        </tr>

        <tr>
          <th>Costo Materia</th>
          <td><?php echo $materia["costo_materia"]. " Bs."; ?></td>
        </tr>

        <tr>
          <th>Dias:</th>
          <td><?php echo $materia["dia"] ?></td>
        </tr>

        <tr>
          <th>Hora:</th>
          <td><?php echo $materia["hora"]. " Hrs."; ?></td>
        </tr>

        <tr>
          <th>Duración:</th>
          <td><?php echo $materia["duracion"]. " Hrs."; ?></td>
        </tr>

        <tr>
          <th>Estado</th>
          <?php
          if ($materia["estado_materia"] == 1) {
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
      if ($materia["img_materia"] == "") {
      ?>
        <img src="assest/dist/img/materiaDefault.png" alt="" width="300" class="img-thumbnail">
      <?php
      } else {
      ?>
        <img src="assest/dist/img/materias/<?php echo $materia["img_materia"]; ?>" alt="" width="300" class="img-thumbnail">
      <?php
      }
      ?>

    </div>
  </div>
</div>