<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Lista de Docentes</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>C.I.</th>
          <th>Imagen</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoDocente()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $Docente=ControladorDocente::ctrInfoDocentes();
        
        foreach($Docente as $value){
          ?>
          <tr>
            <td><?php echo $value["nombre_docente"];?></td>
            <td><?php echo $value["ap_pat_docente"]. " ". $value["ap_mat_docente"];?></td>
            <td><?php echo $value["ci_docente"];?></td>
            <td><?php
                if ($value["img_docente"] == "") {
                ?>
                <img src="assest/dist/img/default.jpg" width='50' class="img-thumbnail">
              <?php
                } else {
              ?>
                <img src='assest/dist/img/docentes/<?php echo $value["img_docente"]; ?>' width='50' height="50">
              <?php
                }
              ?>
            </td>
            <?php 
            if($value["estado_docente"]==1){
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
                <button class="btn btn-sm btn-info" onclick="MVerDocente(<?php echo $value['id_docente'];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditDocente(<?php echo $value['id_docente'];?>)">
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