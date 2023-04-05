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
    $telefonoEstudiante = $data["telefonoEstudiante"];
    $nacimientoEstudiante = $data["nacimientoEstudiante"];
    $direccionEstudiante = $data["direccionEstudiante"];
    $imgEstudiante = $data["imgEstudiante"];

    $stmt = Conexion::conectar()->prepare("insert into Estudiante(nombre_Estudiante, ap_pat_Estudiante, ap_mat_Estudiante, direccion_Estudiante, telefono_Estudiante, fecha_nac_Estudiante, ci_Estudiante, img_Estudiante ) values('$nomEstudiante','$paternoEstudiante','$maternoEstudiante','$direccionEstudiante', '$telefonoEstudiante', '$nacimientoEstudiante', '$ciEstudiante', '$imgEstudiante')");

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
    $stmt = Conexion::conectar()->prepare("select * from Estudiante where id_Estudiante=$id");
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
    $telefonoEstudiante = $data["telefonoEstudiante"];
    $nacimientoEstudiante = $data["nacimientoEstudiante"];
    $direccionEstudiante = $data["direccionEstudiante"];
    $estadoEstudiante = $data["estadoEstudiante"];
    $imgEstudiante = $data["imgEstudiante"];


    $stmt = Conexion::conectar()->prepare("update Estudiante set nombre_Estudiante='$nomEstudiante', ap_pat_Estudiante='$paternoEstudiante', ap_mat_Estudiante='$maternoEstudiante', direccion_Estudiante='$direccionEstudiante', telefono_Estudiante='$telefonoEstudiante', fecha_nac_Estudiante='$nacimientoEstudiante', ci_Estudiante='$ciEstudiante', img_Estudiante='$imgEstudiante', estado_Estudiante='$estadoEstudiante' where id_Estudiante=$idEstudiante");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
