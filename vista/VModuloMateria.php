<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <p class="font-weight-light h4">Asignacion de Materias a Módulos</p>
    <table id="DataTable" class="display">

      <thead>
        <tr>
          <th>Descripción del Módulo</th>
          <th>Curso</th>
          <th>Materias</th>
          <td>
            <button class="btn btn-primary btn-sm" onclick="MNuevoModMateria()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $matModulo = ControladorMateria::ctrMateriaModulo();

        foreach ($matModulo as $value) {
        ?>
          <tr>
            <td><?php echo $value["desc_modulo"]; ?></td>
            <td><?php echo $value["titulo_curso"]; ?></td>
            <td><?php echo $value["nombre_materia"]; ?></td>  
            <td>
              <!-- FUNCIONES EN Horario.js -->
              <div class="btn-group">
                <button class="btn btn-sm btn-secondary" onclick="MEditModMateria(<?php echo $value['id_modulo_materia']; ?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger"  onclick="MEliModMateria(<?php echo $value['id_modulo_materia']; ?>)">
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