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
          <th>Estado</th>
          <td>
            <button class="btn btn-primary btn-sm" onclick="MNuevoMateria()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $materias = controladorMateria::ctrInfoMateriasRegistradas();

        foreach ($materias as $value) {
        ?>
          <tr>
            <td><?php echo $value["nombre_materia"]; ?></td>
            <?php
            if ($value["estado_materia"] == 1) {
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
                <button class="btn btn-sm btn-info" onclick="MVerMateria(<?php echo $value['id_materia']; ?>)">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-sm btn-secondary" onclick="MEditMateria(<?php echo $value['id_materia']; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliMateria(<?php echo $value['id_materia']; ?>)">
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