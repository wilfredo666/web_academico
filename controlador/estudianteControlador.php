<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegEstudiante" ||
        $ruta["query"] == "ctrEditEstudiante" ||
        $ruta["query"] == "ctrEliEstudiante" ||
        $ruta["query"] == "ctrInfoEstudiantesCursos" ||
        $ruta["query"] == "ctrRegGrupoAsig" ||
        $ruta["query"] == "ctrEditGrupoAsig" ||
        $ruta["query"] == "ctrInfoEstudiante" ||
        $ruta["query"] == "ctrBusEstudiante"
    ) {
        $metodo = $ruta["query"];
        $Estudiante = new ControladorEstudiante();
        $Estudiante->$metodo();
    }
}

class ControladorEstudiante
{
    static public function ctrInfoEstudiantes()
    {
        $respuesta = ModeloEstudiante::mdlInfoEstudiantes();
        return $respuesta;
    }

    static public function ctrRegEstudiante()
    {
        require "../modelo/estudianteModelo.php";

        $imagen = $_FILES["ImgEstudiante"];

        $nomImagen = $imagen["name"];
        $archImagen = $imagen["tmp_name"];

        move_uploaded_file($archImagen, "../assest/dist/img/estudiantes/" . $nomImagen);

        $data = array(
            "nomEstudiante" => $_POST["nomEstudiante"],
            "paternoEstudiante" => $_POST["paternoEstudiante"],
            "maternoEstudiante" => $_POST["maternoEstudiante"],
            "ciEstudiante" => $_POST["ciEstudiante"],
            "matriculaEstudiante" => $_POST["matriculaEstudiante"],
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
    /* PARA PERFIL DE ESTUDIANTE */
    static public function ctrInfoDatosEstudiante($id)
    {
        $respuesta = ModeloEstudiante::mdlInfoDatosEstudiante($id);
        return $respuesta;
    }

    static public function ctrEditEstudiante()
    {
        require "../modelo/estudianteModelo.php";

        $imgProdActual = $_POST["imgActEstudiante"];

        $imgProducto = $_FILES["ImgEstudiante"];

        if ($imgProducto["name"] == "") {
            $imagen = $imgProdActual;
        } else {

            $imagen = $imgProducto["name"];
            $archImagen = $imgProducto["tmp_name"];

            move_uploaded_file($archImagen, "../assest/dist/img/estudiantes/" . $imagen);
        }

        $pass1 = $_POST["password"];
        $passActual = $_POST["passwordActual"];

        $password = "";

        if ($pass1 == $passActual) {
            $password = $pass1;
        } else {
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        }

        $data = array(
            "idEstudiante" => $_POST["idEstudiante"],
            "nomEstudiante" => $_POST["nomEstudiante"],
            "paternoEstudiante" => $_POST["paternoEstudiante"],
            "maternoEstudiante" => $_POST["maternoEstudiante"],
            "ciEstudiante" => $_POST["ciEstudiante"],
            "matricula" => $_POST["matricula"],
            "telefonoEstudiante" => $_POST["telefonoEstudiante"],
            "nacimientoEstudiante" => $_POST["nacimientoEstudiante"],
            "direccionEstudiante" => $_POST["direccionEstudiante"],
            "estadoEstudiante" => $_POST["estadoEstudiante"],
            "credencialAcceso" => $_POST["credencialAcceso"],
            "imgEstudiante" => $imagen,
            "password" => $password,
        );

        /* var_dump($data); */

        $respuesta = ModeloEstudiante::mdlEditEstudiante($data);
        echo $respuesta;
    }

    static public function ctrEliEstudiante()
    {
        require "../modelo/estudianteModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloEstudiante::mdlEliEstudiante($data);
        echo $respuesta;
    }

    static public function ctrCantidadEstudiantes()
    {
        $respuesta = ModeloEstudiante::mdlCantidadEstudiantes();
        return $respuesta;
    }
    /* PARA ESTUDIANTE-CURSO */
    public function ctrEstudianteCurso(){
        $respuesta = ModeloEstudiante::mdlInfoEstudiantesCurso();
        return $respuesta;
    }
    static public function ctrRegGrupoAsig()
    {
        date_default_timezone_set("America/La_Paz");
        $fecha=date("Y-m-d");

        require "../modelo/estudianteModelo.php";
        $data = array(
            "nomEstudiante" => $_POST["nomEstudiante"],
            "nomCurso" => $_POST["nomCurso"],
            "nombreGrupo" => $_POST["nombreGrupo"],
            "fechaAsignacion" => $fecha,
        );
        $respuesta = ModeloEstudiante::mdlRegGrupoAsig($data);
        echo $respuesta;
    }

    static public function ctrInfoEstuGrupo($id)
    {
        $respuesta = ModeloEstudiante::mdlInfoEstuGrupo($id);
        return $respuesta;
    }

    static public function ctrEditGrupoAsig()
    {
        require "../modelo/estudianteModelo.php";

        date_default_timezone_set("America/La_Paz");
        $fecha=date("Y-m-d");

        $data = array(
            "idAsignacion" => $_POST["idAsignacion"],
            "nomEstudiante" => $_POST["nombreEstudiante"],
            "nomCurso" => $_POST["nombreCurso"],
            "nombreGrupo" => $_POST["nombreGrupo"],
            "fecha" => $fecha,
        );
        $respuesta = ModeloEstudiante::mdlEditGrupoAsig($data);
        echo $respuesta;
        /* var_dump($data); */
    }
    
    
}
