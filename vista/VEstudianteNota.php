<?php

$path = parse_url($_SERVER['REQUEST_URI']);
$id = $path["query"];

$estudiante = ControladorEstudiante::ctrInfoEstudiante($id);

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header p-1 m-1">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="row flex-row align-items-end justify-content-between card bg-cyan">
      <p class="font-bold h4 mt-2 ml-2">Estudiante: <?php echo $estudiante['nombre_estudiante'] . " " . $estudiante['ap_pat_estudiante'] . " " . $estudiante['ap_mat_estudiante'] ?></p>
      <p class="font-weight-light h5 mt-2">CI: <?php echo $estudiante['ci_estudiante'] ?></p>
      <p class="font-weight-light h5 mt-2 mr-5 pr-5">Matrícula: <?php echo $estudiante['matricula'] ?></p>
    </div>
    <table id="DataTable" class="display">

      <thead>
        <tr>
          <th>Curso</th>
          <th>Materia</th>
          <th>Grupo</th>
          <th>Calificación</th>
          <td>
            <button class="btn btn-primary btn-sm" onclick="MAsigNota(<?php echo $id ?>)"> <i class="fas fa-edit"></i> Asignar Calificación</button>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $estudianteNota = ControladorNota::ctrInfoNota($id);

        foreach ($estudianteNota as $value) {
          var_dump($estudianteNota)
        ?>
          <tr>
            <td><?php echo $value["titulo_curso"]; ?></td>
            <td><?php echo $value["nombre_materia"]; ?></td>
            <td><?php echo $value["id_grupo"]; ?></td>
            <td><?php echo $value["calificacion"]; ?></td>
            <td>
              <div class="btn-group">
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