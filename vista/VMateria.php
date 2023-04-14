<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Lista de Materias</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>Materia</th>
          <th>Costo</th>
          <th>Imagen Materia</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoMateria()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $materia=controladorMateria::ctrInfoMaterias();
        
        foreach($materia as $value){
          ?>
          <tr>
            <td><?php echo $value["nombre_materia"];?></td>
            <td><?php echo $value["costo_materia"];?></td>
            <td><?php
                if ($value["img_materia"] == "") {
                ?>
                <img src="assest/dist/img/materiaDefault.png" width='50' class="img-thumbnail">
              <?php
                } else {
              ?>
                <img src='assest/dist/img/materias/<?php echo $value["img_materia"]; ?>' width='50' height="50" class="img-thumbnail">
              <?php
                }
              ?>
            </td>
            <?php 
            if($value["estado_materia"]==1){
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
                <button class="btn btn-sm btn-info" onclick="MVerMateria(<?php echo $value['id_materia'];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditMateria(<?php echo $value['id_materia'];?>)">
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