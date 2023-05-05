<?php
require_once "conexion.php";
class ModeloCurso
{
  static public function mdlInfoCursos()
  {
    $stmt = Conexion::conectar()->prepare("select * from curso");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegCurso($data)
  {
    $nomCurso = $data["nomCurso"];
    $contenidoCurso = $data["contenidoCurso"];
    $imgCurso = $data["imgCurso"];

    $stmt = Conexion::conectar()->prepare("insert into curso(titulo_curso, descripcion_curso, img_Curso ) values('$nomCurso','$contenidoCurso', '$imgCurso')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoCurso($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from curso where id_curso=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDetalleCurso($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from Curso left join horario on horario.id_Curso=Curso.id_Curso  where Curso.id_Curso=$id ");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditCurso($data)
  {
    $idCurso = $data["idCurso"];
    $nomCurso = $data["nomCurso"];
    $descCurso = $data["descCurso"];
    $imgCurso = $data["imgCurso"];

    $stmt = Conexion::conectar()->prepare("update curso set titulo_curso='$nomCurso', descripcion_curso='$descCurso', img_curso='$imgCurso' where id_curso=$idCurso");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliCurso($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from Curso where id_Curso=$id");
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

  static public function mdlCantidadCursos()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as Curso from Curso");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* ===================================
  HORARIO Curso
  =====================================*/
  static public function mdlInfoHorarioCursos()
  {
    $stmt = Conexion::conectar()->prepare("select * from horario left join Curso on Curso.id_Curso=horario.id_Curso");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHorarioCurso($data)
  {
    $nomCurso = $data["nomCurso"];
    $duracionCurso = $data["duracionCurso"];
    $horaCurso = $data["horaCurso"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("insert into horario(id_Curso, duracion, hora, dia) values('$nomCurso','$duracionCurso', '$horaCurso', '$diaClases')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoHorarioCurso($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from horario where id_horario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHorarioCurso($data)
  {
    $idHorarioCurso = $data["idHorarioCurso"];
    $nombreCurso = $data["nombreCurso"];
    $duracionCurso = $data["duracionCurso"];
    $horaCurso = $data["horaCurso"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("update horario set id_Curso='$nombreCurso', duracion='$duracionCurso', hora='$horaCurso', dia='$diaClases' where id_horario=$idHorarioCurso");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
