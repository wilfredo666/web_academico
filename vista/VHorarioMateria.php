<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Asignacion de Horarios a Materias</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>Materia</th>
          <th>Dia de Clases</th>
          <th>Hora</th>
          <th>Duración</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoHorarioMateria()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $horario=ControladorMateria::ctrInfoHorarioMateria();
        
        foreach($horario as $value){
          $hora = $value['duracion'];
          $porciones = explode(":", $hora);
          ?>
          <tr>
            <td><?php echo $value["nombre_materia"];?></td>
            <td><?php echo $value["dia"];?></td>
            <td><?php echo $value["hora"];?></td>
            <td><?php echo $porciones[0].":".$porciones[1]." horas";?></td>
            <td>
              <!-- FUNCIONES EN Horario.js -->
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerHorarioMateria(<?php echo $value['id_horario'];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditHorarioMateria(<?php echo $value['id_horario'];?>)">
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