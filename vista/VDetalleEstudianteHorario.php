<?php

$path = parse_url($_SERVER['REQUEST_URI']);
//id estudiante
$idEstudiante = $path["query"];

//informacion del estudiante
$estudiante = ControladorEstudiante::ctrInfoEstudiante($idEstudiante);

//informacion de los horarios del estudiante
$horario = ControladorEstudiante::ctrInfoHorarioEstudiante($idEstudiante);

//informacion de los docentes asignados
$docentes = ControladorEstudiante::ctrInfoDocentesAsig($idEstudiante);
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header pb-0">
    <div class="container-fluid d-flex justify-content-center" style="padding-top: 2px; padding-bottom: 2px; font-size: 20px;">
      INFORMACIÓN DEL HORARIO DEL ESTUDIANTE: <p class="text-bold mb-0"> - <?php echo $estudiante['nombre_estudiante'] . " " . $estudiante['ap_pat_estudiante'] . " " . $estudiante['ap_mat_estudiante']; ?></p>
    </div>
  </section>

  <section class="content">

    <!--lista de docentes-->
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Docentes asignados</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-sm">
              <thead>
                <th>Nombre</th>
                <th>Materia</th>
              </thead>
              <tbody>
                <?php 
                foreach($docentes as $value){
                ?>
                <tr>
                  <td><?php echo $value["nombre_docente"]." ".$value["ap_pat_docente"]." ".$value["ap_mat_docente"];?></td>
                  <td><?php echo $value["nombre_materia"];?></td>
                </tr>

                <?php
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <!--lista de horarios [dias, materias]-->
    <div class="row">
      <div class="col-12">
        <div class="card card-success card-outline">
          <div class="card-header">
            <h3 class="card-title">Horarios</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-bordered">
              <thead>
                <th>Hora:</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sabado</th>
              </thead>
              <tbody>
                <?php 
                foreach($horario as $value){

                  //convirtiendo a arreglo
                  $dia=json_decode($value["dias"]);
                ?>
                <tr>
                  <td><?php echo $value["hora_inicio"]." - ".$value["hora_fin"]?></td>

                  <!--evaluando el dia con su correspondiente-->
                  <td>
                    <?php
                  //lunes
                  foreach($dia as $d){
                    if($d=="Lunes"){
                      echo $value["nombre_materia"];
                    }
                  }
                    ?>
                  </td>

                  <td>
                    <?php
                  //Martes
                  foreach($dia as $d){
                    if($d=="Martes"){
                      echo $value["nombre_materia"];
                    }
                  }
                    ?>
                  </td>

                  <td>
                    <?php
                  //Miercoles
                  foreach($dia as $d){
                    if($d=="Miercoles"){
                      echo $value["nombre_materia"];
                    }
                  }
                    ?>
                  </td>

                  <td>
                    <?php
                  //Jueves
                  foreach($dia as $d){
                    if($d=="Jueves"){
                      echo $value["nombre_materia"];
                    }
                  }
                    ?>
                  </td>

                  <td>
                    <?php
                  //Viernes
                  foreach($dia as $d){
                    if($d=="Viernes"){
                      echo $value["nombre_materia"];
                    }
                  }
                    ?>
                  </td>

                  <td>
                    <?php
                  //Sabado
                  foreach($dia as $d){
                    if($d=="Sabado"){
                      echo $value["nombre_materia"];
                    }
                  }
                    ?>
                  </td>
                </tr>
                <?php
                }

                ?>
                <tr>
                  <td></td>
                  <td></td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
  function MNotaEstudiante(id) {
    let identificativo = id.split('-');
    var obj = {
      idEstudiante: identificativo[0],
      idCurso: identificativo[1],
      idModulo: identificativo[2],
      idMateria: identificativo[3],
    }

    $("#modal-default").modal("show")
    $.ajax({
      type: "POST",
      url: "vista/nota/FNuevoNota.php",
      data: obj,
      cache: false,
      success: function(data) {
        $("#content-default").html(data)
        console.log(identificativo);
      }
    })
  }
</script>