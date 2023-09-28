<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <!-- <p class="font-weight-light h4 text-center"><b>Asignar Nota al Estudiante</b></p> -->


        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <style>
                .widget-user-header:before {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                }
            </style>
            <div class="widget-user-header text-white" style="background: url('https://w0.peakpx.com/wallpaper/206/341/HD-wallpaper-the-gates-gate-art-fantasy-tower-game-castle-blue.jpg') center center; background-color: rgba(0,0,0,0.6);">
                <h2 class="widget-user-username text-center"><?php echo $_SESSION["nombre_usuario"] ?></h2>
                <h5 class="widget-user-desc text-center">Asignar Notas del Estudiante</h5>
            </div>

            <form action="" method="post">
                <div class="row ">
                    <div class="col-sm-3"></div>
                    <div class="row col-sm-6">
                        <div class="form-group col-sm-12">
                            <label for="default" class="control-label mt-2 pt-2">Curso</label>
                            <select class="form-control select2bs4" name="nomCurso" id="nomCurso" onchange="buscarEstudiante()">
                                <option value="">Seleccionar Curso</option>
                                <?php
                                require_once "controlador/cursoControlador.php";
                                require_once "modelo/cursoModelo.php";
                                $curso = controladorCurso::ctrInfoCursos();
                                foreach ($curso as $value) {
                                ?>
                                    <option value="<?php echo $value["id_curso"]; ?>"><?php echo $value["titulo_curso"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="date" class=" control-label ">Nombre del Estudiante</label>
                            <select class="form-control select2bs4" name="nomEstudiante" id="nomEstudiante">
                                <option value="">Seleccionar Curso</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-3"></div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-dark" id="guardar" onclick="asignarNota()"><i class="fas fa-arrow-right"> </i> Ir a Asignación de Nota</button>
                </div>
            </form>
            <!-- /.row -->
        </div>






    </section>
</div>