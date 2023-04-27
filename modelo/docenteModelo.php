<?php
require_once "conexion.php";
class ModeloDocente
{
  static public function mdlInfoDocentes()
  {

    $stmt = Conexion::conectar()->prepare("select * from docente");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegDocente($data)
  {
    $nomDocente = $data["nomDocente"];
    $paternoDocente = $data["paternoDocente"];
    $maternoDocente = $data["maternoDocente"];
    $ciDocente = $data["ciDocente"];
    $telefonoDocente = $data["telefonoDocente"];
    $nacimientoDocente = $data["nacimientoDocente"];
    $direccionDocente = $data["direccionDocente"];
    $imgDocente = $data["imgDocente"];

    $stmt = Conexion::conectar()->prepare("insert into docente(nombre_docente, ap_pat_docente, ap_mat_docente, direccion_docente, telefono_docente, fecha_nac_docente, ci_docente, img_docente ) values('$nomDocente','$paternoDocente','$maternoDocente','$direccionDocente', '$telefonoDocente', '$nacimientoDocente', '$ciDocente', '$imgDocente')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoDocente($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from Docente where id_Docente=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditDocente($data)
  {
    $idDocente = $data["idDocente"];
    $nomDocente = $data["nomDocente"];
    $paternoDocente = $data["paternoDocente"];
    $maternoDocente = $data["maternoDocente"];
    $ciDocente = $data["ciDocente"];
    $telefonoDocente = $data["telefonoDocente"];
    $nacimientoDocente = $data["nacimientoDocente"];
    $direccionDocente = $data["direccionDocente"];
    $estadoDocente = $data["estadoDocente"];
    $imgDocente = $data["imgDocente"];

    $credencialAcceso = $data["credencialAcceso"]; //0

    if ($credencialAcceso == 0) {
      $stmt = Conexion::conectar()->prepare("update docente set nombre_docente='$nomDocente', ap_pat_docente='$paternoDocente', ap_mat_docente='$maternoDocente', direccion_docente='$direccionDocente', telefono_docente='$telefonoDocente', fecha_nac_docente='$nacimientoDocente', ci_docente='$ciDocente', img_docente='$imgDocente', id_usuario='$credencialAcceso', estado_docente='$estadoDocente' where id_docente=$idDocente");

      if ($stmt->execute()) {
        return "ok";
      } else {
        return "error";
      }
      $stmt->close();
      $stmt->null;
    } else {
      $stmtUsuario = Conexion::conectar()->prepare("update usuario set disponibilidad='1' where id_usuario=$credencialAcceso");

      $stmt = Conexion::conectar()->prepare("update docente set nombre_docente='$nomDocente', ap_pat_docente='$paternoDocente', ap_mat_docente='$maternoDocente', direccion_docente='$direccionDocente', telefono_docente='$telefonoDocente', fecha_nac_docente='$nacimientoDocente', ci_docente='$ciDocente', img_docente='$imgDocente', id_usuario=$credencialAcceso, estado_docente='$estadoDocente' where id_docente=$idDocente");

      if ($stmt->execute() and $stmtUsuario->execute()) {
        return "ok";
      } else {
        return "error";
      }
      $stmt->close();
      $stmt->null;
      $stmtUsuario->close();
      $stmtUsuario->null;
    }    
  }

  static public function mdlEliDocente($id){
    try{
      $stmt = Conexion::conectar()->prepare("delete from docente where id_docente=$id");
      $stmt->execute();

    }catch (PDOException $e){
      $codeError= $e->getCode();
      if($codeError=="23000"){
        return "error";

        $stmt->close();
        $stmt->null;
      }
    }

    return "ok";
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCantidadDocentes()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as docente from docente");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* ========= =========
  DOCENTE MATERIA
  ====================== */
  static public function mdlInfoDocenteMateria()
  {
    $stmt = Conexion::conectar()->prepare("select * from docente_materia
    join docente
    on docente.id_docente=docente_materia.id_docente
    join materia
    on materia.id_materia=docente_materia.id_materia");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }
  static public function mdlRegDocentemateria($data)
  {
    $nomDocente = $data["nomDocente"];
    $nomMateria = $data["nomMateria"];
    $fechaMateria = $data["fechaMateria"];
    $horaMateria = $data["horaMateria"];

    $stmt = Conexion::conectar()->prepare("insert into docente_materia(id_docente, id_materia, dia, hora ) values('$nomDocente','$nomMateria','$fechaMateria', '$horaMateria')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }
  static public function mdlInfoDocenteMaterias($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from docente_materia 
    join docente
    on docente.id_docente=docente_materia.id_docente
    join materia
    on materia.id_materia=docente_materia.id_materia
    where id_docente_materia=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  static public function mdlEditDocenteMateria($data)
  {
    $idDocenteMateria = $data["idDocenteMateria"];
    $docenteAsignacion = $data["docenteAsignacion"];
    $materiaAsignacion = $data["materiaAsignacion"];
    $fechaMateria = $data["fechaMateria"];
    $horaMateria = $data["horaMateria"];

    $stmt = Conexion::conectar()->prepare("update docente_materia set id_docente='$docenteAsignacion', id_materia='$materiaAsignacion', dia='$fechaMateria', hora='$horaMateria' where id_docente_materia=$idDocenteMateria");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

}
