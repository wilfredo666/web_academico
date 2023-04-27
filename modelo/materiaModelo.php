<?php
require_once "conexion.php";
class ModeloMateria
{
  static public function mdlInfoMaterias()
  {
    $stmt = Conexion::conectar()->prepare("select * from materia join horario on horario.id_materia=materia.id_materia ORDER BY RAND()");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoMateriasRegistradas()
  {

    $stmt = Conexion::conectar()->prepare("select * from materia");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoListaMaterias()
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
    $costoMateria = $data["costoMateria"];
    $contenidoMateria = $data["contenidoMateria"];
    $imgMateria = $data["imgMateria"];

    $stmt = Conexion::conectar()->prepare("insert into materia(nombre_materia, contenido_materia, costo_materia, img_materia ) values('$nomMateria','$contenidoMateria', '$costoMateria', '$imgMateria')");

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

  static public function mdlInfoDetalleMateria($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from materia left join horario on horario.id_materia=materia.id_materia  where materia.id_materia=$id ");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditMateria($data)
  {
    $idMateria = $data["idMateria"];
    $nomMateria = $data["nomMateria"];
    $costoMateria = $data["costoMateria"];
    $contenidoMateria = $data["contenidoMateria"];

    $estadoMateria = $data["estadoMateria"];
    $imgMateria = $data["imgMateria"];

    $stmt = Conexion::conectar()->prepare("update materia set nombre_materia='$nomMateria', contenido_materia='$contenidoMateria', costo_materia='$costoMateria', img_materia='$imgMateria', estado_materia='$estadoMateria' where id_materia=$idMateria");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliMateria($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from materia where id_materia=$id");
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

  static public function mdlCantidadMaterias()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as materia from materia");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* ===================================
  HORARIO MATERIA
  =====================================*/
  static public function mdlInfoHorarioMaterias()
  {
    $stmt = Conexion::conectar()->prepare("select * from horario left join materia on materia.id_materia=horario.id_materia");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHorarioMateria($data)
  {
    $nomMateria = $data["nomMateria"];
    $duracionMateria = $data["duracionMateria"];
    $horaMateria = $data["horaMateria"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("insert into horario(id_materia, duracion, hora, dia) values('$nomMateria','$duracionMateria', '$horaMateria', '$diaClases')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoHorarioMateria($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from horario where id_horario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHorarioMateria($data)
  {
    $idHorarioMateria = $data["idHorarioMateria"];
    $nombreMateria = $data["nombreMateria"];
    $duracionMateria = $data["duracionMateria"];
    $horaMateria = $data["horaMateria"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("update horario set id_materia='$nombreMateria', duracion='$duracionMateria', hora='$horaMateria', dia='$diaClases' where id_horario=$idHorarioMateria");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
