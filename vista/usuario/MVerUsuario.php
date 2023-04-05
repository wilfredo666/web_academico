<?php
require "../../controlador/usuarioControlador.php";
require "../../modelo/usuarioModelo.php";

$id=$_GET["id"];
$usuario=ControladorUsuario::ctrInfoUsuario($id);

?>
<div class="modal-header" style="background-color: #001a34; color: #ffffff">
  <h4 class="modal-title">Información del Usuario</h4>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">

  <table class="table">
    <tr>
      <th>#ID</th>
      <td><?php echo $usuario["id_usuario"];?></td>
    </tr>

    <tr>
      <th>Login</th>
      <td><?php echo $usuario["login_usuario"];?></td>
    </tr>

    <tr>
      <th>Nombre de Usuario</th>
      <td><?php echo $usuario["nombre_usuario"];?></td>
    </tr>

    <tr>
      <th>Perfil</th>
      <td><?php echo $usuario["perfil"];?></td>
    </tr>

    <tr>
      <th>Estado</th>
      <?php 
      if($usuario["estado"]==1){
      ?>
      <td><span class="badge badge-success">Activo</span></td>
      <?php
      }else{
      ?>
      <td><span class="badge badge-danger">Inactivo</span></td>
      <?php
      }
      ?>
    </tr>
  </table>

</div>

