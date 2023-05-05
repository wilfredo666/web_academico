<?php
/*===================
CONTROLADORES 
====================*/
require_once "controlador/usuarioControlador.php";
require_once "controlador/plantillaControlador.php";
require_once "controlador/docenteControlador.php";
require_once "controlador/estudianteControlador.php";
require_once "controlador/materiaControlador.php";
require_once "controlador/noticiaControlador.php";
require_once "controlador/cursoControlador.php";
require_once "controlador/moduloControlador.php";
require_once "controlador/grupoControlador.php";
/*===================
 MODELOS 
====================*/
require_once "modelo/usuarioModelo.php";
require_once "modelo/docenteModelo.php";
require_once "modelo/estudianteModelo.php";
require_once "modelo/materiaModelo.php";
require_once "modelo/noticiaModelo.php";
require_once "modelo/cursoModelo.php";
require_once "modelo/moduloModelo.php";
require_once "modelo/grupoModelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();