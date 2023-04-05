<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegEstudiante" ||
        $ruta["query"] == "ctrEditEstudiante" ||
        $ruta["query"] == "ctrEliEstudiante" ||
        $ruta["query"] == "ctrBusEstudiante"
    ) {
        $metodo = $ruta["query"];
        $Estudiante = new ControladorEstudiante();
        $Estudiante->$metodo();
    }
}

class ControladorEstudiante
{
    static public function ctrInfoEstudiantes(){
        $respuesta = ModeloEstudiante::mdlInfoEstudiantes();
        return $respuesta;
    }

    static public function ctrRegEstudiante()
    {
        require "../modelo/EstudianteModelo.php";

        $imagen=$_FILES["ImgEstudiante"];

        $nomImagen=$imagen["name"];
        $archImagen=$imagen["tmp_name"];
    
        move_uploaded_file($archImagen,"../assest/dist/img/Estudiantes/".$nomImagen);

        $data = array(
            "nomEstudiante" => $_POST["nomEstudiante"],
            "paternoEstudiante" => $_POST["paternoEstudiante"],
            "maternoEstudiante" => $_POST["maternoEstudiante"],
            "ciEstudiante" => $_POST["ciEstudiante"],
            "telefonoEstudiante" => $_POST["telefonoEstudiante"],
            "nacimientoEstudiante" => $_POST["nacimientoEstudiante"],
            "direccionEstudiante" => $_POST["direccionEstudiante"],
            "imgEstudiante" => $nomImagen,
        );

        $respuesta = ModeloEstudiante::mdlRegEstudiante($data);
        echo $respuesta;
    }

    static public function ctrInfoEstudiante($id)
    {
        $respuesta = ModeloEstudiante::mdlInfoEstudiante($id);
        return $respuesta;
    }

    static public function ctrEditEstudiante()
    {
        require "../modelo/EstudianteModelo.php";

        $imgProdActual=$_POST["imgActEstudiante"];
    
        $imgProducto=$_FILES["ImgEstudiante"];
        
        if($imgProducto["name"]==""){
          $imagen=$imgProdActual;
        }else{
          
          $imagen=$imgProducto["name"];
          $archImagen=$imgProducto["tmp_name"];
          
          move_uploaded_file($archImagen,"../assest/dist/img/Estudiantes/".$imagen);
        }

        $data = array(
            "idEstudiante" => $_POST["idEstudiante"],
            "nomEstudiante" => $_POST["nomEstudiante"],
            "paternoEstudiante" => $_POST["paternoEstudiante"],
            "maternoEstudiante" => $_POST["maternoEstudiante"],
            "ciEstudiante" => $_POST["ciEstudiante"],
            "telefonoEstudiante" => $_POST["telefonoEstudiante"],
            "nacimientoEstudiante" => $_POST["nacimientoEstudiante"],
            "direccionEstudiante" => $_POST["direccionEstudiante"],
            "estadoEstudiante" => $_POST["estadoEstudiante"],
            "imgEstudiante" => $imagen,
        );

        $respuesta = ModeloEstudiante::mdlEditEstudiante($data);
        echo $respuesta;
    }
}
