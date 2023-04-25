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
    $matriculaEstudiante = $data["matriculaEstudiante"];
    $telefonoEstudiante = $data["telefonoEstudiante"];
    $nacimientoEstudiante = $data["nacimientoEstudiante"];
    $direccionEstudiante = $data["direccionEstudiante"];
    $imgEstudiante = $data["imgEstudiante"];

    $stmt = Conexion::conectar()->prepare("insert into estudiante(nombre_estudiante, ap_pat_estudiante, ap_mat_estudiante, direccion_estudiante, telefono_estudiante, fecha_nac_estudiante, ci_estudiante, matricula, img_estudiante ) values('$nomEstudiante','$paternoEstudiante','$maternoEstudiante','$direccionEstudiante', '$telefonoEstudiante', '$nacimientoEstudiante', '$ciEstudiante', '$matriculaEstudiante', '$imgEstudiante')");
 
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
    $stmt = Conexion::conectar()->prepare("select * from estudiante where id_estudiante=$id");
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
    $matricula = $data["matricula"];
    $telefonoEstudiante = $data["telefonoEstudiante"];
    $nacimientoEstudiante = $data["nacimientoEstudiante"];
    $direccionEstudiante = $data["direccionEstudiante"];
    $estadoEstudiante = $data["estadoEstudiante"];
    $imgEstudiante = $data["imgEstudiante"];

    $credencialAcceso = $data["credencialAcceso"];//0

    if($credencialAcceso != 0){
      $credencial = $data["credencialAcceso"];//x
    }else{
      $credencial = 0;
    }

    $stmt = Conexion::conectar()->prepare("update estudiante set nombre_estudiante='$nomEstudiante', ap_pat_estudiante='$paternoEstudiante', ap_mat_estudiante='$maternoEstudiante', direccion_estudiante='$direccionEstudiante', telefono_estudiante='$telefonoEstudiante', fecha_nac_estudiante='$nacimientoEstudiante', ci_estudiante='$ciEstudiante', matricula='$matricula', img_estudiante='$imgEstudiante',  estado_estudiante='$estadoEstudiante', id_usuario='$credencial' where id_estudiante=$idEstudiante");
    
    /* NO SE PUDEO ACTUALIZAR LA INFORMACION EN DOS TABLAS  ESTUDIANTE - USUARIO*/    
    /*  $stmt = Conexion::conectar()->prepare("update usuario set disponibilidad='1' where id_usuario=$credencialAcceso"); */
   
    if ($stmt ->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }
}
