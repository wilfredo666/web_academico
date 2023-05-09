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
    $stmt = Conexion::conectar()->prepare("select * from estudiante left join usuario on usuario.id_usuario=estudiante.id_usuario where id_estudiante=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  /* PARA DATOS DE PERFIL ESTUDIANTES */
  static public function mdlInfoDatosEstudiante($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from estudiante join usuario on usuario.id_usuario=estudiante.id_usuario where estudiante.id_usuario=$id");
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
    $password = $data["password"];

    $credencialAcceso = $data["credencialAcceso"]; //0

    if ($credencialAcceso == 0) {
      $stmt = Conexion::conectar()->prepare("update estudiante set nombre_estudiante='$nomEstudiante', ap_pat_estudiante='$paternoEstudiante', ap_mat_estudiante='$maternoEstudiante', direccion_estudiante='$direccionEstudiante', telefono_estudiante='$telefonoEstudiante', fecha_nac_estudiante='$nacimientoEstudiante', ci_estudiante='$ciEstudiante', matricula='$matricula', img_estudiante='$imgEstudiante',  estado_estudiante='$estadoEstudiante', id_usuario='$credencialAcceso' where id_estudiante=$idEstudiante");

      if ($stmt->execute()) {
        return "ok";
      } else {
        return "error";
      }
      $stmt->close();
      $stmt->null;
    } else {
      $stmtUsuario = Conexion::conectar()->prepare("update usuario set disponibilidad='1' where id_usuario=$credencialAcceso");
      $stmtPass = Conexion::conectar()->prepare("update usuario set password='$password' where id_usuario=$credencialAcceso");

      $stmt = Conexion::conectar()->prepare("update estudiante set nombre_estudiante='$nomEstudiante', ap_pat_estudiante='$paternoEstudiante', ap_mat_estudiante='$maternoEstudiante', direccion_estudiante='$direccionEstudiante', telefono_estudiante='$telefonoEstudiante', fecha_nac_estudiante='$nacimientoEstudiante', ci_estudiante='$ciEstudiante', matricula='$matricula', img_estudiante='$imgEstudiante',  estado_estudiante='$estadoEstudiante', id_usuario=$credencialAcceso where id_estudiante=$idEstudiante");

      if ($stmt->execute() and $stmtUsuario->execute() and $stmtPass->execute()) {
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

  static public function mdlCantidadEstudiantes()
  {
    $stmt = Conexion::conectar()->prepare("select count(*) as estudiante from estudiante");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoEstudiantesCurso()
  {
    $stmt = Conexion::conectar()->prepare("select * from estudiante_curso 
    join estudiante on estudiante.id_estudiante=estudiante_curso.id_estudiante
    join curso on curso.id_curso=estudiante_curso.id_curso
    join grupo on grupo.id_grupo=estudiante_curso.id_grupo");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  /* ASIGNACION GRUPO-ESTUDIANTE */
  static public function mdlRegGrupoAsig($data)
  {
    $nomEstudiante = $data["nomEstudiante"];
    $nomCurso = $data["nomCurso"];
    $nombreGrupo = $data["nombreGrupo"];
    $fechaAsignacion = $data["fechaAsignacion"];

    $stmt = Conexion::conectar()->prepare("insert into estudiante_curso(id_estudiante, id_curso, id_grupo, fecha_asignacion) values( $nomEstudiante, $nomCurso, $nombreGrupo, '$fechaAsignacion')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoEstuGrupo($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from estudiante_curso where id_estu_curso=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }
  
  static public function mdlEditGrupoAsig($data)
  {
    $idAsignacion = $data["idAsignacion"];
    $nomEstudiante = $data["nomEstudiante"];
    $nomCurso = $data["nomCurso"];
    $nombreGrupo = $data["nombreGrupo"];
    $fecha = $data["fecha"];

    $stmt = Conexion::conectar()->prepare("update estudiante_curso set id_estudiante=$nomEstudiante, id_curso=$nomCurso, id_grupo=$nombreGrupo, fecha_asignacion='$fecha' where id_estu_curso=$idAsignacion");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliEstudiante($id){
    try{
      $stmt = Conexion::conectar()->prepare("delete from estudiante where id_estudiante=$id");
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
  
}
