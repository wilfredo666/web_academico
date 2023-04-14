<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegDocente" ||
        $ruta["query"] == "ctrEditDocente" ||
        $ruta["query"] == "ctrEliDocente" ||
        $ruta["query"] == "ctrRegDocenteMateria" ||
        $ruta["query"] == "ctrEditDocenteMateria" ||
        $ruta["query"] == "ctrBusDocente"
    ) {
        $metodo = $ruta["query"];
        $Docente = new ControladorDocente();
        $Docente->$metodo();
    }
}

class ControladorDocente
{
    static public function ctrInfoDocentes(){
        $respuesta = ModeloDocente::mdlInfoDocentes();
        return $respuesta;
    }

    static public function ctrRegDocente()
    {
        require "../modelo/docenteModelo.php";

        $imagen=$_FILES["ImgDocente"];

        $nomImagen=$imagen["name"];
        $archImagen=$imagen["tmp_name"];
    
        move_uploaded_file($archImagen,"../assest/dist/img/docentes/".$nomImagen);

        $data = array(
            "nomDocente" => $_POST["nomDocente"],
            "paternoDocente" => $_POST["paternoDocente"],
            "maternoDocente" => $_POST["maternoDocente"],
            "ciDocente" => $_POST["ciDocente"],
            "telefonoDocente" => $_POST["telefonoDocente"],
            "nacimientoDocente" => $_POST["nacimientoDocente"],
            "direccionDocente" => $_POST["direccionDocente"],
            "imgDocente" => $nomImagen,
        );

        $respuesta = ModeloDocente::mdlRegDocente($data);
        echo $respuesta;
    }

    static public function ctrInfoDocente($id)
    {
        $respuesta = ModeloDocente::mdlInfoDocente($id);
        return $respuesta;
    }

    static public function ctrEditDocente()
    {
        require "../modelo/docenteModelo.php";

        $imgProdActual=$_POST["imgActDocente"];
    
        $imgProducto=$_FILES["ImgDocente"];
        
        if($imgProducto["name"]==""){
          $imagen=$imgProdActual;
        }else{
          
          $imagen=$imgProducto["name"];
          $archImagen=$imgProducto["tmp_name"];
          
          move_uploaded_file($archImagen,"../assest/dist/img/docentes/".$imagen);
        }

        $data = array(
            "idDocente" => $_POST["idDocente"],
            "nomDocente" => $_POST["nomDocente"],
            "paternoDocente" => $_POST["paternoDocente"],
            "maternoDocente" => $_POST["maternoDocente"],
            "ciDocente" => $_POST["ciDocente"],
            "telefonoDocente" => $_POST["telefonoDocente"],
            "nacimientoDocente" => $_POST["nacimientoDocente"],
            "direccionDocente" => $_POST["direccionDocente"],
            "estadoDocente" => $_POST["estadoDocente"],
            "imgDocente" => $imagen,
        );

        $respuesta = ModeloDocente::mdlEditDocente($data);
        echo $respuesta;
    }

    static public function ctrInfoDocenteMateria(){
        $respuesta = ModeloDocente::mdlInfoDocenteMateria();
        return $respuesta;
    }

    static public function ctrRegDocenteMateria()
    {
        require "../modelo/docenteModelo.php";

        $data = array(
            "nomDocente" => $_POST["nomDocente"],
            "nomMateria" => $_POST["nomMateria"],
            "fechaMateria" => $_POST["fechaMateria"],
            "horaMateria" => $_POST["horaMateria"]
        );

        $respuesta = ModeloDocente::mdlRegDocenteMateria($data);
        echo $respuesta;
    }
    static public function ctrInfoDocenteMaterias($id)
    {
        $respuesta = ModeloDocente::mdlInfoDocenteMaterias($id);
        return $respuesta;
    }
    static public function ctrEditDocenteMateria()
    {
        require "../modelo/docenteModelo.php";

        $data = array(
            "idDocenteMateria" => $_POST["idDocenteMateria"],
            "docenteAsignacion" => $_POST["docenteAsignacion"],
            "materiaAsignacion" => $_POST["materiaAsignacion"],
            "fechaMateria" => $_POST["fechaMateria"],
            "horaMateria" => $_POST["horaMateria"]
        );
/* var_dump($data); */
        $respuesta = ModeloDocente::mdlEditDocenteMateria($data);
        echo $respuesta;
    }
}
