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


    $stmt = Conexion::conectar()->prepare("update docente set nombre_docente='$nomDocente', ap_pat_docente='$paternoDocente', ap_mat_docente='$maternoDocente', direccion_docente='$direccionDocente', telefono_docente='$telefonoDocente', fecha_nac_docente='$nacimientoDocente', ci_docente='$ciDocente', img_docente='$imgDocente', estado_docente='$estadoDocente' where id_docente=$idDocente");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
