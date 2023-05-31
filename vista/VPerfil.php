<?php

$id = $_SESSION["idUsuario"];
$estudiante = ControladorEstudiante::ctrInfoDatosEstudiante($id);

/* var_dump($estudiante); */
?>

<div class="content-wrapper">
    <div class="modal-header bg-info col-sm-12">
        <h3 class="modal-title"> <b> DATOS DE MI PERFIL</b></h3>
    </div>

    <div class="container bootstrap snippet col-md-12">
        <div class="container col-md-11">
            <br>
            <form id="FormEditEstudiante">
                <div class="row">
                    <div class="col-sm-4">
                        <!--left col 3-->
                        <!-- <form id="actualizarDatosCliente"> -->

                        <div class="text-center">
                            <img src="assest/dist/img/estudiantes/<?php echo $estudiante["img_estudiante"] ?>" class="avatar img-circle img-thumbnail" alt="avatar" width="75%">

                            <h6>Cargar Fotografía</h6>
                            <input type="file" class="form-control" id="ImgEstudiante" name="ImgEstudiante">
                            <input type="hidden" class="form-control" id="imgActEstudiante" name="imgActEstudiante" value="<?php echo $estudiante["img_estudiante"] ?>">
                        </div>
                        <!-- </form> -->
                        </hr><br>
                        <ul class="list-group">
                            <li class="list-group-item text-center bg-info">Información Importante <i class="fas fa-info-circle"></i></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Login de Acceso al sistema:</strong></span> <?php echo $estudiante["login_usuario"] ?></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>Perfil:</strong></span> <?php echo $estudiante["perfil"] ?></li>
                            <li class="list-group-item text-right"><span class="pull-left"><strong>C.I:</strong></span> <?php echo $estudiante["ci_estudiante"] ?></li>
                        </ul>

                    </div>

                    <!-- col 9 -->
                    <div class="col-sm-8">
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <hr>
                                <div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Nombres </label>
                                            <input type="text" class="form-control" name="nomEstudiante" id="nomEstudiante" title="Actualiza tu Nombre." value="<?php echo $estudiante['nombre_estudiante']; ?>" readonly>
                                            <input type="hidden" class="form-control" id="idEstudiante" name="idEstudiante" value="<?php echo $estudiante['id_estudiante'] ?>">
                                            <input type="hidden" class="form-control" id="ciEstudiante" name="ciEstudiante" value="<?php echo $estudiante['ci_estudiante'] ?>">
                                            <input type="hidden" class="form-control" id="estadoEstudiante" name="estadoEstudiante" value="<?php echo $estudiante['estado_estudiante'] ?>">
                                            <input type="hidden" class="form-control" id="credencialAcceso" name="credencialAcceso" value="<?php echo $estudiante['id_usuario'] ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name">Ap. Paterno</label>
                                            <input type="text" class="form-control" name="paternoEstudiante" id="paternoEstudiante" value="<?php echo $estudiante["ap_pat_estudiante"] ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="last_name">Ap. Materno</label>
                                            <input type="text" class="form-control" name="maternoEstudiante" id="maternoEstudiante" value="<?php echo $estudiante["ap_mat_estudiante"] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Matrícula</label>
                                            <input type="text" class="form-control" name="matricula" id="matricula" value="<?php echo $estudiante["matricula"] ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" name="nacimientoEstudiante" id="nacimientoEstudiante" value="<?php echo $estudiante["fecha_nac_estudiante"] ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Dirección</label>
                                            <input type="text" class="form-control" name="direccionEstudiante" id="direccionEstudiante" value="<?php echo $estudiante["direccion_estudiante"] ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Teléfono</label>
                                            <input type="text" class="form-control" name="telefonoEstudiante" id="telefonoEstudiante" value="<?php echo $estudiante["telefono_estudiante"] ?>">
                                        </div>
                                    </div>

                                    <?php
                                    $pass = $estudiante["password"];
                                    $decript = password_verify($pass, $estudiante["password"]);
                                    ?>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control" name="password" id="password" value="<?php echo $estudiante["password"]; ?>">
                                            <input type="hidden" name="passwordActual" value="<?php echo $estudiante["password"]; ?>">
                                            <p class="text-danger font-italic" id="error-password"></p>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Repetir Contraseña</label>
                                            <input type="password" class="form-control" name="password2" id="password2" value="<?php echo $estudiante["password"]; ?>">
                                            <p class="text-danger font-italic" id="error-password2"></p>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3" style="border: 8px ; display: flex; justify-content: right">
                                            <button class="btn btn-success" type="button" onclick="EditEstudiante(<?php echo $estudiante['id_estudiante'] ?>);"><i class="fas fa-user-edit"></i> Actualizar</button>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                            </div>

                        </div>
                        <!--/tab-pane-->
                    </div>
                    <!--/tab-content-->
                </div>
            </form>
        </div>
    </div>

</div>
