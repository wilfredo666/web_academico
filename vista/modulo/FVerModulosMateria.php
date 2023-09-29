<?php
require "../../controlador/moduloControlador.php";
require "../../modelo/moduloModelo.php";

$idCurso = $_GET["id"];

$modulo = ControladorModulo::ctrInfoModuloTotal($idCurso);
/* var_dump($modulo); */
?>

<div class="modal-header" style="background-color: #001a34; color: #ffffff">
    <h4 class="modal-title font-weight-light">Información de la Materia</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row justify-content-between">
        <div class="col-12 row mx-auto">
            <?php
            foreach ($modulo as  $value) {
            ?>
                <div class="col-sm-6">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h5 class="card-title"><?php echo $value['desc_modulo'] ?></h5>
                            <div class="card-tools">
                                <a class="btn btn-tool btn-link"><?php echo $value["duracion_modulo"]; ?></a>
                                <a class="btn btn-tool btn-link"><?php echo $value["costo_modulo"]; ?></a>
                                <a class="btn btn-tool">
                                    <i class="fas fa-chalkboard"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>