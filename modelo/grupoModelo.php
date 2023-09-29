<?php
require_once "conexion.php";
class ModeloGrupo
{
  static public function mdlInfoGrupos()
  {
    $stmt = Conexion::conectar()->prepare("select * from grupo join curso on curso.id_curso=grupo.id_curso");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoGruposCurso($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from grupo where id_curso=$id");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  

  static public function mdlInfoGruposRegistradas()
  {

    $stmt = Conexion::conectar()->prepare("select * from Grupo");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoListaGrupos()
  {

    $stmt = Conexion::conectar()->prepare("select * from Grupo");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegGrupo($data)
  {
    $nomGrupo = $data["nomGrupo"];
    $nomCurso = $data["nomCurso"];
    $fechaInicio = $data["fechaInicio"];
    $turno = $data["turno"];
    $horaInicio = $data["horaInicio"];
    $horaFin = $data["horaFin"];

    $stmt = Conexion::conectar()->prepare("insert into grupo(desc_grupo, id_curso, fecha_inicio, turno, hora_inicio, hora_fin ) values($nomGrupo, $nomCurso , '$fechaInicio', '$turno', '$horaInicio', '$horaFin')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoGrupo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from grupo where id_grupo=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDetalleGrupo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from grupo left join horario on horario.id_grupo=grupo.id_grupo  where Grupo.id_grupo=$id ");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditGrupo($data)
  {
    $idGrupo = $data["idGrupo"];
    $nomGrupo = $data["nomGrupo"];
    $nomCurso = $data["nomCurso"];
    $fechaInicio = $data["fechaInicio"];
    $turno = $data["turno"];
    $horaInicio = $data["horaInicio"];
    $horaFin = $data["horaFin"];

    $estadoGrupo = $data["estadoGrupo"];

    $stmt = Conexion::conectar()->prepare("update grupo set desc_grupo=$nomGrupo, id_curso=$nomCurso, fecha_inicio='$fechaInicio', turno='$turno', hora_inicio='$horaInicio', hora_fin='$horaFin',  estado_grupo='$estadoGrupo' where id_grupo=$idGrupo");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliGrupo($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from grupo where id_grupo=$id");
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

  static public function mdlCantidadGrupos()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as Grupo from Grupo");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* ===================================
  HORARIO Grupo
  =====================================*/
  static public function mdlInfoHorarioGrupos()
  {
    $stmt = Conexion::conectar()->prepare("select * from horario left join Grupo on Grupo.id_Grupo=horario.id_Grupo");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHorarioGrupo($data)
  {
    $nomGrupo = $data["nomGrupo"];
    $duracionGrupo = $data["duracionGrupo"];
    $horaGrupo = $data["horaGrupo"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("insert into horario(id_Grupo, duracion, hora, dia) values('$nomGrupo','$duracionGrupo', '$horaGrupo', '$diaClases')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoHorarioGrupo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from horario where id_horario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHorarioGrupo($data)
  {
    $idHorarioGrupo = $data["idHorarioGrupo"];
    $nombreGrupo = $data["nombreGrupo"];
    $duracionGrupo = $data["duracionGrupo"];
    $horaGrupo = $data["horaGrupo"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("update horario set id_Grupo='$nombreGrupo', duracion='$duracionGrupo', hora='$horaGrupo', dia='$diaClases' where id_horario=$idHorarioGrupo");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
