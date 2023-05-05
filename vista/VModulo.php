<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Lista de Módulos</p>
    <table id="DataTable" class="display">
      <thead>
        <tr>
          <th>Descripcion Módulo</th>
          <th>Curso</th>
          <th>Costo</th>
          <th>Duración</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoModulo()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $Modulos=controladorModulo::ctrInfoModulos();
        foreach($Modulos as $value){
          ?>
          <tr>
            <td><?php echo $value["desc_modulo"];?></td>
            <td><?php echo $value["titulo_curso"];?></td>
            <td><?php echo $value["costo_modulo"] . " Bs.";?></td>
            <td><?php echo $value["duracion_modulo"];?></td>
           
            <?php 
            if($value["estado_modulo"]==1){
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
                <button class="btn btn-sm btn-secondary" onclick="MEditModulo(<?php echo $value['id_modulo'];?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliModulo(<?php echo $value['id_modulo'];?>)">
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