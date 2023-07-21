<?php
require_once "conexion.php";
class ModeloUsuario
{
  /* Metodo para acceder al sistema */
  static public function mdlAccesoUsuario($usuario)
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where login_usuario = '$usuario'");
    $stmt->execute();

    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuarios()
  {

    $stmt = Conexion::conectar()->prepare("select * from usuario");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlRegUsuario($data)
  {
    $loginUsuario = $data["loginUsuario"];
    $nomUsuario = $data["nomUsuario"];
    $passUsuario = $data["passUsuario"];
    $perfilUsuario = $data["perfilUsuario"];

    date_default_timezone_set("America/La_Paz");
    $fecha = date("Y-m-d");

    $stmt = Conexion::conectar()->prepare("insert into usuario(login_usuario, nombre_usuario, password, perfil ) values('$loginUsuario','$nomUsuario','$passUsuario','$perfilUsuario')");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt->null;
  }

  static public function mdlInfoUsuario($id)
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where id_usuario=$id");
    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEditUsuario($data)
  {
    $idUsuario = $data["idUsuario"];
    $nomUsuario = $data["nomUsuario"];
    $passUsuario = $data["passUsuario"];
    $perfilUsuario = $data["perfilUsuario"];
    $estadoUsuario = $data["estadoUsuario"];


    $stmt = Conexion::conectar()->prepare("update usuario set password='$passUsuario', nombre_usuario='$nomUsuario', perfil='$perfilUsuario', estado='$estadoUsuario' where id_usuario=$idUsuario");

    if ($stmt->execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt->null;
  }

  static public function mdlCredencialEstudiantes()
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where perfil='Estudiante' and disponibilidad=0");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlCredencialDocentes()
  {
    $stmt = Conexion::conectar()->prepare("select * from usuario where perfil='Docente' and disponibilidad=0");
    $stmt->execute();

    return $stmt->fetchAll();
    $stmt->close();
    $stmt->null;
  }

  static public function mdlEliUsuario($data)
  {
    
    $docente = Conexion::conectar()->prepare("select * from usuario where id_usuario=$data and estado=1");
    $docente->execute();
  
    if ($docente->fetch() > 0) {
      return "error";
    } else {
      $stmt = Conexion::conectar()->prepare("delete from usuario where id_usuario=$data");
      if ($stmt->execute()) {
        return "ok";
      } else {
        return "error";
      }
    }
    $stmt->close();
    $stmt->null;
  }
}
