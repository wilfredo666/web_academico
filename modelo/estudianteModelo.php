<?php
require_once "conexion.php";
class ModeloEstudiante
{
  static public function mdlInfoEstudiantes()
  {

    $stmt = Conexion::conectar()->prepare("select * from estudiante");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegEstudiante($data)
  {
    $nomEstudiante = $data["nomEstudiante"];
    $paternoEstudiante = $data["paternoEstudiante"];
    $maternoEstudiante = $data["maternoEstudiante"];
    $ciEstudiante = $data["ciEstudiante"];
    $matriculaEstudiante = $data["matriculaEstudiante"];
    $telefonoEstudiante = $data["telefonoEstudiante"];
    $nacimientoEstudiante = $data["nacimientoEstudiante"];
    $direccionEstudiante = $data["direccionEstudiante"];
    $imgEstudiante = $data["imgEstudiante"];

    $stmt = Conexion::conectar()->prepare("insert into Estudiante(nombre_Estudiante, ap_pat_Estudiante, ap_mat_Estudiante, direccion_Estudiante, telefono_Estudiante, fecha_nac_Estudiante, ci_Estudiante, matricula, img_Estudiante ) values('$nomEstudiante','$paternoEstudiante','$maternoEstudiante','$direccionEstudiante', '$telefonoEstudiante', '$nacimientoEstudiante', '$ciEstudiante', '$matriculaEstudiante', '$imgEstudiante')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoEstudiante($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from estudiante where id_estudiante=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditEstudiante($data)
  {
    $idEstudiante = $data["idEstudiante"];
    $nomEstudiante = $data["nomEstudiante"];
    $paternoEstudiante = $data["paternoEstudiante"];
    $maternoEstudiante = $data["maternoEstudiante"];
    $ciEstudiante = $data["ciEstudiante"];
    $matricula = $data["matricula"];
    $telefonoEstudiante = $data["telefonoEstudiante"];
    $nacimientoEstudiante = $data["nacimientoEstudiante"];
    $direccionEstudiante = $data["direccionEstudiante"];
    $estadoEstudiante = $data["estadoEstudiante"];
    $imgEstudiante = $data["imgEstudiante"];


    $stmt = Conexion::conectar()->prepare("update estudiante set nombre_estudiante='$nomEstudiante', ap_pat_estudiante='$paternoEstudiante', ap_mat_estudiante='$maternoEstudiante', direccion_estudiante='$direccionEstudiante', telefono_estudiante='$telefonoEstudiante', fecha_nac_estudiante='$nacimientoEstudiante', ci_estudiante='$ciEstudiante', matricula='$matricula', img_estudiante='$imgEstudiante', estado_estudiante='$estadoEstudiante' where id_estudiante=$idEstudiante");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
