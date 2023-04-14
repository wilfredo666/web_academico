<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Asignacion de Docentes a Materias</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Materia</th>
          <th>Dia de Clases</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoDocenteMateria()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $Docente=ControladorDocente::ctrInfoDocenteMateria();
        
        foreach($Docente as $value){
          ?>
          <tr>
            <td><?php echo $value["nombre_docente"];?></td>
            <td><?php echo $value["ap_pat_docente"]. " ". $value["ap_mat_docente"];?></td>
            <td><?php echo $value["nombre_materia"];?></td>
            <td><?php echo $value["dia"];?></td>
            <td>
              <!-- FUNCIONES EN docente.js -->
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerDocenteMateria(<?php echo $value['id_docente_materia'];?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditDocenteMateria(<?php echo $value['id_docente_materia'];?>)">
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