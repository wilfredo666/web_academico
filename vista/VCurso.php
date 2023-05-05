<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
  <p class="font-weight-light h4">Lista de Cursos</p>
    <table id="DataTable" class="display">
     
      <thead>
        <tr>
          <th>Curso</th>
          <th>Descripción</th>
          <th>Imagen Curso</th>
          <td>
            <button class="btn btn-primary btn-sm"  onclick="MNuevoCurso()"> <i class="fas fa-plus"></i> Nuevo</button>
          </td>
        </tr>
      </thead>
      <tbody>
       <?php 
        $Cursos=controladorCurso::ctrInfoCursos();
        
        foreach($Cursos as $value){
          ?>
          <tr>
            <td><?php echo $value["titulo_curso"];?></td>
            <td><?php echo $value["descripcion_curso"];?></td>
            <td><?php
                if ($value["img_curso"] == "") {
                ?>
                <img src="assest/dist/img/cursoDefault.jpg" width='50' class="img-thumbnail">
              <?php
                } else {
              ?>
                <img src='assest/dist/img/cursos/<?php echo $value["img_curso"]; ?>' width='50' height="50" class="img-thumbnail">
              <?php
                }
              ?>
            </td>
            <td>
              <div class="btn-group">
                <button class="btn btn-sm btn-secondary" onclick="MEditCurso(<?php echo $value['id_curso'];?>)">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="MEliCurso(<?php echo $value['id_curso'];?>)">
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