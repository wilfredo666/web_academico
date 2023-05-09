<?php
require_once "conexion.php";
class ModeloModulo
{
  static public function mdlInfoModulos()
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo join curso on curso.id_curso=modulo.id_curso");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoModulosRegistradas()
  {

    $stmt = Conexion::conectar()->prepare("select * from Modulo");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoListaModulos()
  {

    $stmt = Conexion::conectar()->prepare("select * from Modulo");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegModulo($data)
  {
    $nomCurso = $data["nomCurso"];
    $nomModulo = $data["nomModulo"];
    $costoModulo = $data["costoModulo"];
    $duracionModulo = $data["duracionModulo"];

    $stmt = Conexion::conectar()->prepare("insert into modulo(id_curso, desc_modulo, costo_modulo, duracion_modulo ) values($nomCurso, '$nomModulo','$costoModulo', '$duracionModulo')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoModulo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo where id_Modulo=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDetalleModulo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from Modulo left join horario on horario.id_Modulo=Modulo.id_Modulo  where Modulo.id_Modulo=$id ");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditModulo($data)
  {
    $idModulo = $data["idModulo"];
    $nombreCurso = $data["nombreCurso"];
    $nomModulo = $data["nomModulo"];
    $duracionModulo = $data["duracionModulo"];
    $costoModulo = $data["costoModulo"];
    $estadoModulo = $data["estadoModulo"];

    $stmt = Conexion::conectar()->prepare("update modulo set id_curso=$nombreCurso, desc_modulo='$nomModulo', costo_modulo='$costoModulo', duracion_modulo='$duracionModulo', estado_modulo='$estadoModulo' where id_modulo=$idModulo");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliModulo($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from modulo where id_modulo=$id");
      $stmt->execute();
    } catch (PDOException $e) {
      $codeError = $e->getCode();
      if ($codeError == "23000") {
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadModulos()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as Modulo from Modulo");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* ===================================
  HORARIO Modulo
  =====================================*/
  static public function mdlInfoHorarioModulos()
  {
    $stmt = Conexion::conectar()->prepare("select * from horario left join Modulo on Modulo.id_Modulo=horario.id_Modulo");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHorarioModulo($data)
  {
    $nomModulo = $data["nomModulo"];
    $duracionModulo = $data["duracionModulo"];
    $horaModulo = $data["horaModulo"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("insert into horario(id_Modulo, duracion, hora, dia) values('$nomModulo','$duracionModulo', '$horaModulo', '$diaClases')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoHorarioModulo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from horario where id_horario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHorarioModulo($data)
  {
    $idHorarioModulo = $data["idHorarioModulo"];
    $nombreModulo = $data["nombreModulo"];
    $duracionModulo = $data["duracionModulo"];
    $horaModulo = $data["horaModulo"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("update horario set id_Modulo='$nombreModulo', duracion='$duracionModulo', hora='$horaModulo', dia='$diaClases' where id_horario=$idHorarioModulo");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
