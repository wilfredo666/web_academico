<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegMateria" ||
        $ruta["query"] == "ctrEditMateria" ||
        $ruta["query"] == "ctrEliMateria" ||
        $ruta["query"] == "ctrBusMateria"
    ) {
        $metodo = $ruta["query"];
        $Materia = new ControladorMateria();
        $Materia->$metodo();
    }
}

class ControladorMateria
{
    static public function ctrInfoMaterias(){
        $respuesta = ModeloMateria::mdlInfoMaterias();
        return $respuesta;
    }

    static public function ctrRegMateria()
    {
        require "../modelo/materiaModelo.php";

        $imagen=$_FILES["ImgMateria"];

        $nomImagen=$imagen["name"];
        $archImagen=$imagen["tmp_name"];
    
        move_uploaded_file($archImagen,"../assest/dist/img/materias/".$nomImagen);

        $data = array(
            "nomMateria" => $_POST["nomMateria"],
            "contenidoMateria" => $_POST["contenidoMateria"],
            "imgMateria" => $nomImagen,
        );

        $respuesta = ModeloMateria::mdlRegMateria($data);
        echo $respuesta;
    }

    static public function ctrInfoMateria($id)
    {
        $respuesta = ModeloMateria::mdlInfoMateria($id);
        return $respuesta;
    }

    static public function ctrEditMateria()
    {
        require "../modelo/materiaModelo.php";

        $imgProdActual=$_POST["imgActMateria"];
    
        $imgProducto=$_FILES["ImgMateria"];
        
        if($imgProducto["name"]==""){
          $imagen=$imgProdActual;
        }else{
          
          $imagen=$imgProducto["name"];
          $archImagen=$imgProducto["tmp_name"];
          
          move_uploaded_file($archImagen,"../assest/dist/img/materias/".$imagen);
        }

        $data = array(
            "idMateria" => $_POST["idMateria"],
            "nomMateria" => $_POST["nomMateria"],
            "contenidoMateria" => $_POST["contenidoMateria"],
            "estadoMateria" => $_POST["estadoMateria"],
            "imgMateria" => $imagen,
        );

        $respuesta = ModeloMateria::mdlEditMateria($data);
        echo $respuesta;
    }
}
