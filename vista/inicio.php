<style>
  .fondo {
    /* position: absolute; */
    background-image: url('assest/dist/img/carousel-1.jpg');
    background-repeat: no-repeat;
    /* background-attachment: fixed; */
    width: 100%;
    height: 58vh;
    background-color: rgba(0, 0, 0, 0.8);
    filter: brightness(0.5);

  }
</style>
<?php 
$materias = ControladorMateria::ctrCantidadMaterias();
$estudiantes = ControladorEstudiante::ctrCantidadEstudiantes();
$docentes = ControladorDocente::ctrCantidadDocentes();
$noticias = ControladorNoticia::ctrCantidadNoticias();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Panel Principal</h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?php
  if ($_SESSION["perfil"] == "Administrador") {
  ?>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $materias['materia']?></h3>
              <p>Materias</p>
            </div>
            <div class="icon">
              <i class="ion ion-compose"></i>
            </div>
            <a href="VMateria" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $docentes['docente']?><sup style="font-size: 20px"></sup></h3>

              <p>Docentes</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            <a href="VDocente" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $estudiantes['estudiante']?></h3>

              <p>Estudiantes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="VEstudiante" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo $noticias['noticia']?></h3>

              <p>Noticias</p>
            </div>
            <div class="icon">
              <i class="ion ion-speakerphone"></i>
            </div>
            <a href="VNoticia" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </section>
  <?php
  }
  ?>

  <!-- PARA ESTUDAINTES Y DONCENTES -->

  <?php
  if ($_SESSION["perfil"] == "Estudiante" ) {
  ?>
    <!-- Main content -->

    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $_SESSION["cantidadCurso"]?></h3>
              <p>Cursos</p>
            </div>
            <div class="icon">
              <i class="ion ion-compose"></i>
            </div>
            <a href="#" class="small-box-footer">Más Información <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
    </section>
  <?php
  }
  ?>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->