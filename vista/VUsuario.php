<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Lista de Usuarios</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>#ID</th>
          <th>Nombre Usuario</th>
          <th>Login</th>
          <th>Perfil</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoUsuario()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $usuario=ControladorUsuario::ctrInfoUsuarios();
        
        foreach($usuario as $value){
          ?>
          <tr>
            <td><?php echo $value["id_usuario"];?></td>
            <td><?php echo $value["nombre_usuario"];?></td>
            <td><?php echo $value["login_usuario"];?></td>
            <td><?php echo $value["perfil"];?></td>
            <?php 
            if($value["estado"]==1){
              ?>
              <td><span class="badge badge-success">Activo</span></td>
              <?php
            }else{
              ?>
              <td><span class="badge badge-danger">Inactivo</span></td>
              <?php
            }
            ?>

            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerUsuario(<?php echo $value['id_usuario'];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditUsuario(<?php echo $value['id_usuario'];?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </td>
          </tr>
          
          <?php
        }
        ?>

      </tbody>
    </table>

  </section>
</div>