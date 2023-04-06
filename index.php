<?php
/*===================
CONTROLADORES 
====================*/
require_once "controlador/usuarioControlador.php";
require_once "controlador/plantillaControlador.php";
require_once "controlador/docenteControlador.php";
require_once "controlador/estudianteControlador.php";
require_once "controlador/materiaControlador.php";
/*===================
 MODELOS 
====================*/
require_once "modelo/usuarioModelo.php";
require_once "modelo/docenteModelo.php";
require_once "modelo/estudianteModelo.php";
require_once "modelo/materiaModelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();