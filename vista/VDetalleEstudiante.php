<<<<<<< HEAD
<?php
/* require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php"; */

$path = parse_url($_SERVER['REQUEST_URI']);
//id estudiante
$id = $path["query"];
$idEstudiante = $id;
//datos del estudainte
$estudiante = ControladorEstudiante::ctrInfoEstudiante($id);
/* $materia = ControladorMateria::ctrInfoMateria($id); */

$cursoEstudiante = ControladorEstudiante::ctrCursosEstudiante($id);
/* var_dump($cursoEstudiante); */
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pb-0">
        <div class="container-fluid d-flex">
            INFORMACIÓN DE CURSOS DEL ESTUDIANTE <p class="text-bold"> - <?php
                                                                            echo $estudiante['nombre_estudiante'] . " " . $estudiante['ap_pat_estudiante'] . " " . $estudiante['ap_mat_estudiante'];
                                                                            ?></p>
        </div>
    </section>
    </section class="content bg-dark ml-2 mr-2">

    <div class="row container-fluid">
        <div class="col-md-5">
            <div class="card card-row card-dark">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title">
                        LISTA DE CURSOS
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($cursoEstudiante as $curso) {
                        $cantidadCurso = $cantidadCurso + 1;
                    ?>
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?php echo $curso['titulo_curso'] ?></h5>
                                <div class="card-tools">
                                    <a class="btn btn-tool btn-link"><?php echo $cantidadCurso; ?></a>
                                    <a class="btn btn-tool">
                                        <i class="fas fa-chalkboard"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                $moduloMateria = ControladorMateria::ctrMateriaMod($curso['id_curso']);
                                foreach ($moduloMateria as $modulo) {
                                ?>
                                    <a class="btn btn-sm btn-info" onclick="MostrarMaterias(<?php echo $modulo['id_modulo']; ?>)"><?php echo ($modulo['desc_modulo']) ?> - <span class="text-xs">(Ver) </span><i class="fas fa-eye"></i></a>
                                    
                                    <?php
                                    $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
                                    foreach ($MatMod as $value) {
                                    ?>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                                            <label for="customCheckbox1" class="custom-control-label"><?php echo $value["nombre_materia"]; ?></label>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-row card-dark">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title">
                        LISTA DE MATERIAS DEL MODULO SELECCIONADO
                    </h3>
                </div>
                <div class="card-body row" id="detalleModulo">

                </div>
            </div>
        </div>
    </div>
    </section>
</div>
=======
<?php
/* require "../../controlador/materiaControlador.php";
require "../../modelo/materiaModelo.php"; */

$path = parse_url($_SERVER['REQUEST_URI']);
//id estudiante
$id = $path["query"];
$idEstudiante = $id;
//datos del estudainte
$estudiante = ControladorEstudiante::ctrInfoEstudiante($id);
/* $materia = ControladorMateria::ctrInfoMateria($id); */

$cursoEstudiante = ControladorEstudiante::ctrCursosEstudiante($id);
/* var_dump($cursoEstudiante); */
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header pb-0">
        <div class="container-fluid d-flex">
            INFORMACIÓN DE CURSOS DEL ESTUDIANTE <p class="text-bold"> - <?php
                                                                            echo $estudiante['nombre_estudiante'] . " " . $estudiante['ap_pat_estudiante'] . " " . $estudiante['ap_mat_estudiante'];
                                                                            ?></p>
        </div>
    </section>
    </section class="content bg-dark ml-2 mr-2">

    <div class="row container-fluid">
        <div class="col-md-5">
            <div class="card card-row card-dark">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title">
                        LISTA DE CURSOS
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($cursoEstudiante as $curso) {
                        $cantidadCurso = $cantidadCurso + 1;
                    ?>
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h5 class="card-title"><?php echo $curso['titulo_curso'] ?></h5>
                                <div class="card-tools">
                                    <a class="btn btn-tool btn-link"><?php echo $cantidadCurso; ?></a>
                                    <a class="btn btn-tool">
                                        <i class="fas fa-chalkboard"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                $moduloMateria = ControladorMateria::ctrMateriaMod($curso['id_curso']);
                                foreach ($moduloMateria as $modulo) {
                                ?>
                                    <a class="btn btn-sm btn-info" onclick="MostrarMaterias(<?php echo $modulo['id_modulo']; ?>)"><?php echo ($modulo['desc_modulo']) ?> - <span class="text-xs">(Visualizar) </span><i class="fas fa-eye"></i></a>
                                    
                                    <?php
                                    $MatMod = ControladorMateria::ctrMatMod($modulo['id_modulo']);
                                    foreach ($MatMod as $value) {
                                    ?>
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" disabled>
                                            <label for="customCheckbox1" class="custom-control-label"><?php echo $value["nombre_materia"]; ?></label>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card card-row card-dark">
                <div class="card-header d-flex justify-content-center">
                    <h3 class="card-title">
                        LISTA DE MATERIAS DEL MODULO SELECCIONADO
                    </h3>
                </div>
                <div class="card-body row" id="detalleModulo">

                </div>
            </div>
        </div>
    </div>
    </section>
</div>
>>>>>>> 46ea6d0945d471e47c5cfaa690c948d7f4b450e8
<script src="assest/js/estudiante.js"></script>