<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <p class="font-weight-light h4">Lista de Estudiantes</p>
    <table id="DataTable" class="display">

      <thead>
        <tr>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>C.I.</th>
          <th>Imagen</th>
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm" onclick="MNuevoEstudiante()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $Estudiante = controladorEstudiante::ctrInfoEstudiantes();

        foreach ($Estudiante as $value) {
        ?>
          <tr>
            <td><?php echo $value["nombre_estudiante"]; ?></td>
            <td><?php echo $value["ap_pat_estudiante"] . " " . $value["ap_mat_estudiante"]; ?></td>
            <td><?php echo $value["ci_estudiante"]; ?></td>
            <td><?php
                if ($value["img_estudiante"] == "") {
                ?>
                <img src="assest/dist/img/default.jpg" width='50' class="img-thumbnail">
              <?php
                } else {
              ?>
                <img src='assest/dist/img/estudiantes/<?php echo $value["img_estudiante"]; ?>' width='50' height="50" class="img-thumbnail">
              <?php
                }
              ?>
            </td>
            <?php
            if ($value["estado_estudiante"] == 1) {
            ?>
              <td><span class="badge badge-success">Activo</span></td>
            <?php
            } else {
            ?>
              <td><span class="badge badge-danger">Inactivo</span></td>
            <?php
            }
            ?>

            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-info" onclick="MVerEstudiante(<?php echo $value['id_estudiante']; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditEstudiante(<?php echo $value['id_estudiante']; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliEstudiante(<?php echo $value['id_estudiante']; ?>)">
                  <i class="fas fa-trash"></i>
                </button>
                <!-- <button class="btn btn-sm btn-success" onclick="MAsigNota(<?php echo $value['id_estudiante']; ?>)">
                <i class="fas fa-paste"></i>
                </button> -->
                <a href="VEstudianteNota?<?php echo $value['id_estudiante']; ?>" type="button" class="btn btn-sm btn-success"> Ver Nota</a>
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