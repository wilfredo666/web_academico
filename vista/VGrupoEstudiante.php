<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <p class="font-weight-light h4">Asignacion de Estudiantes a Grupos</p>
    <table id="DataTable" class="display">

      <thead>
        <tr>
          <th>Estudiante</th>
          <th>Grupo</th>
          <th>Curso</th>
          <th>Fecha Asignación</th>
          <td>
            <button class="btn btn-primary btn-sm" onclick="MNuevoGrupoAsig()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $estudiante=controladorEstudiante::ctrEstudianteCurso();

        foreach ($estudiante as $value) {
        ?>
          <tr>
            <td><?php echo $value["nombre_estudiante"]." ".$value["ap_pat_estudiante"]." ".$value["ap_mat_estudiante"]; ?></td>

            <td><?php echo $value["desc_grupo"]; ?></td>
            <td><?php echo $value["titulo_curso"]; ?></td>
            <td><?php echo $value["fecha_asignacion"]; ?></td>
            <td>
              <!-- FUNCIONES EN docente.js -->
                <button class="btn btn-sm btn-secondary" onclick="MEditGrupoAsig(<?php echo $value['id_estu_curso']; ?>)">
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