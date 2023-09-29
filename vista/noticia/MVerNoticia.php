<?php
require "../../controlador/noticiaControlador.php";
require "../../modelo/noticiaModelo.php";

$id = $_GET["id"];
$Noticia = controladorNoticia::ctrInfoNoticia($id);

?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title font-weight-light">Información de la Noticia</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">


  <div class="row">

    <div class="col-7">
      <table class="table">
        <tr>
          <th>Título de la Noticia</th>
          <td><?php echo $Noticia["titulo_noticia"]; ?></td>
        </tr>

        <tr>
          <th>Contenido</th>
          <td><?php echo $Noticia["descripcion_noticia"]; ?></td>
        </tr>

        <tr>
          <th>Fecha de Publicación</th>
          <td><?php echo $Noticia["fecha_noticia"]; ?></td>
        </tr>

        <tr>
          <th>Estado</th>
          <?php
          if ($Noticia["estado_noticia"] == 1) {
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
      if ($Noticia["img_noticia"] == "") {
      ?>
        <img src="assest/dist/img/noticiaDefault.jpg" alt="" width="300" class="img-thumbnail">
      <?php
      } else {
      ?>
        <img src="assest/dist/img/noticias/<?php echo $Noticia["img_noticia"]; ?>" alt="" width="300" class="img-thumbnail">
      <?php
      }
      ?>

    </div>
  </div>
</div>