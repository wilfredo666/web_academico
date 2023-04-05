<?php
/* CONTROLADORES */
require_once "controlador/usuarioControlador.php";
require_once "controlador/plantillaControlador.php";

/* MODELOS */
require_once "modelo/usuarioModelo.php";


$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();