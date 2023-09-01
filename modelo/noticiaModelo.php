<?php
require_once "conexion.php";
class ModeloNoticia
{
  static public function mdlInfoNoticias()
  {

    $stmt = Conexion::conectar()->prepare("select * from noticia");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegNoticia($data)
  {
    $nomNoticia = $data["nomNoticia"];
    $fechaNoticia = $data["fechaNoticia"];
    $contenidoNoticia = $data["contenidoNoticia"];
    $imgNoticia = $data["imgNoticia"];

    $stmt = Conexion::conectar()->prepare("insert into noticia(titulo_noticia, descripcion_noticia, img_noticia, fecha_noticia  ) values('$nomNoticia','$contenidoNoticia', '$imgNoticia', '$fechaNoticia')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNoticia($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from noticia where id_noticia=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditNoticia($data)
  {
    $idNoticia = $data["idNoticia"];
    $nomNoticia = $data["nomNoticia"];
    $fechaNoticia = $data["fechaNoticia"];
    $contenidoNoticia = $data["contenidoNoticia"];

    $estadoNoticia = $data["estadoNoticia"];
    $imgNoticia = $data["imgNoticia"];

    $stmt = Conexion::conectar()->prepare("update noticia set titulo_noticia='$nomNoticia', descripcion_noticia='$contenidoNoticia', img_noticia='$imgNoticia', fecha_noticia='$fechaNoticia', estado_noticia='$estadoNoticia' where id_noticia=$idNoticia");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliNoticia($data)
  {
    $stmt = Conexion::conectar()->prepare("delete from noticia where id_noticia=$data");
    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->null;
  }

  static public function mdlCantidadNoticias()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as noticia from noticia");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
}
