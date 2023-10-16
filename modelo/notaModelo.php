<?php
require_once "conexion.php";
class ModeloNota
{
  /* para ver los cursos del estudiante */
  static public function mdlInfoCursos($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from estudiante_curso join curso on curso.id_curso=estudiante_curso.id_curso where id_estudiante=$id");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlBusModuloCurso($curso)
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo where id_curso=$curso");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotas()
  {
    $stmt = Conexion::conectar()->prepare("select * from nota");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNotasRegistradas()
  {
    $stmt = Conexion::conectar()->prepare("select * from Nota");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoListaNotas()
  {

    $stmt = Conexion::conectar()->prepare("select * from Nota");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlNotaEstudiante($idEstudiante, $idMateria, $idModulo, $idCurso)
  {
    $stmt = Conexion::conectar()->prepare("select * from nota where id_curso='$idCurso' and id_modulo='$idModulo' and id_materia='$idMateria' and id_estudiante='$idEstudiante' ");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* este esta bien para registrar - EN USO */
  static public function mdlRegNotas($data)
  {
    $idEstudiante = $data["idEstudiante"];
    $idCurso = $data["idCurso"];
    $idModulo = $data["idModulo"];
    $idMateria = $data["idMateria"];
    $notas = $data["notas"];
    $fecha = $data["fecha"];
    $usuario = $data["usuario"];

    $stmt = Conexion::conectar()->prepare("insert into nota(id_curso, id_modulo, id_materia, id_estudiante, desc_nota, emision_nota, id_usuario ) values($idCurso,$idModulo, $idMateria, $idEstudiante,'$notas', '$fecha', $usuario)");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  /* este esta bien para ACTUALIZAR - EN USO */
  static public function mdlActualizarNotas($data)
  {
    $idNota = $data["idNota"];
    $notas = $data["notas"];

    $stmt = Conexion::conectar()->prepare("update nota set desc_nota='$notas' where id_nota=$idNota");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoNota($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from nota 
    join curso on curso.id_curso=nota.id_curso
    join grupo on grupo.id_curso=curso.id_curso
    join modulo on modulo.id_curso=nota.id_curso
    join materia on materia.id_materia=nota.id_materia
    
    where id_estudiante=$id");
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDetalleNota($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from Nota left join horario on horario.id_Nota=Nota.id_Nota  where Nota.id_Nota=$id ");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditNota($data)
  {
    $idNota = $data["idNota"];
    $nomNota = $data["nomNota"];
    $costoNota = $data["costoNota"];
    $contenidoNota = $data["contenidoNota"];

    $estadoNota = $data["estadoNota"];
    $imgNota = $data["imgNota"];

    $stmt = Conexion::conectar()->prepare("update Nota set nombre_Nota='$nomNota', contenido_Nota='$contenidoNota', costo_Nota='$costoNota', img_Nota='$imgNota', estado_Nota='$estadoNota' where id_Nota=$idNota");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliNota($id)
  {
    try {
      $stmt = Conexion::conectar()->prepare("delete from Nota where id_Nota=$id");
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

  static public function mdlCantidadNotas()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as Nota from Nota");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* ===================================
  HORARIO Nota
  =====================================*/
  static public function mdlInfoHorarioNotas()
  {
    $stmt = Conexion::conectar()->prepare("select * from horario left 
    join Nota on Nota.id_Nota=horario.id_Nota
    join docente on docente.id_docente=horario.id_docente");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegHorarioNota($data)
  {
    $nomNota = $data["nomNota"];
    $duracionNota = $data["duracionNota"];
    $horaNota = $data["horaNota"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("insert into horario(id_Nota, duracion, hora, dia) values('$nomNota','$duracionNota', '$horaNota', '$diaClases')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoHorarioNota($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from horario where id_horario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditHorarioNota($data)
  {
    $idHorarioNota = $data["idHorarioNota"];
    $nombreNota = $data["nombreNota"];
    $duracionNota = $data["duracionNota"];
    $horaNota = $data["horaNota"];
    $diaClases = $data["diaClases"];

    $stmt = Conexion::conectar()->prepare("update horario set id_Nota='$nombreNota', duracion='$duracionNota', hora='$horaNota', dia='$diaClases' where id_horario=$idHorarioNota");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  /* ===================================
  ASIGANCION DE NotaS A MODULOS
  =====================================*/
  static public function mdlNotaModulo()
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo_Nota 
    join Nota on Nota.id_Nota=modulo_Nota.id_Nota
    join modulo on modulo.id_modulo=modulo_Nota.id_modulo
    join curso on curso.id_curso=modulo.id_curso");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegModNota($data)
  {
    $nomNota = $data["nomNota"];
    $nomModulo = $data["nomModulo"];

    $stmt = Conexion::conectar()->prepare("insert into modulo_Nota(id_modulo, id_Nota) values($nomModulo, $nomNota )");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlNotaModulos($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from modulo_Nota where id_modulo_Nota=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditModNota($data)
  {
    $idAsignacion = $data["idAsignacion"];
    $nomNota = $data["nomNota"];
    $nomModulo = $data["nomModulo"];

    $stmt = Conexion::conectar()->prepare("update modulo_Nota set id_modulo=$nomModulo, id_Nota=$nomNota where id_modulo_Nota=$idAsignacion");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
