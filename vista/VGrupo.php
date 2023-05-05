<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Lista de Grupos</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>Nro Grupo</th>
          <th>Curso</th>
          <th>Fecha Inicio</th>
          <th>Turno</th>
          <th>Horas</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoGrupo()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $Grupos=controladorGrupo::ctrInfoGrupos();
        
        foreach($Grupos as $value){
          $horaInicio = explode(":", $value["hora_inicio"]); 
          $horaFin = explode(":", $value["hora_fin"]); 
          ?>
          <tr>
            <td><?php echo $value["desc_grupo"];?></td>
            <td><?php echo $value["titulo_curso"];?></td>
            <td><?php echo $value["fecha_inicio"];?></td>
            <td><?php echo $value["turno"];?></td>
            <td><?php echo $horaInicio[0].":".$horaInicio[1] . " - ".$horaFin[0].":".$horaFin[1];?></td>
            <?php 
            if($value["estado_grupo"]==1){
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
                <button class="btn btn-sm btn-secondary" onclick="MEditGrupo(<?php echo $value['id_grupo'];?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliGrupo(<?php echo $value['id_grupo'];?>)">
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