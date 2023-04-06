<?php
require_once "conexion.php";
class ModeloMateria
{
  static public function mdlInfoMaterias()
  {

    $stmt = Conexion::conectar()->prepare("select * from materia");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegMateria($data)
  {
    $nomMateria = $data["nomMateria"];
    $contenidoMateria = $data["contenidoMateria"];
    $imgMateria = $data["imgMateria"];

    $stmt = Conexion::conectar()->prepare("insert into materia(nombre_materia, contenido_materia, img_materia ) values('$nomMateria','$contenidoMateria', '$imgMateria')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoMateria($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from materia where id_materia=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditMateria($data)
  {
    $idMateria = $data["idMateria"];
    $nomMateria = $data["nomMateria"];
    $contenidoMateria = $data["contenidoMateria"];
    
    $estadoMateria = $data["estadoMateria"];
    $imgMateria = $data["imgMateria"];

    $stmt = Conexion::conectar()->prepare("update materia set nombre_materia='$nomMateria', contenido_materia='$contenidoMateria', img_materia='$imgMateria', estado_materia='$estadoMateria' where id_materia=$idMateria");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
