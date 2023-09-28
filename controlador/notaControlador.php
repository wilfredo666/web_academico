<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegNotas" ||
        $ruta["query"] == "ctrEditNota" ||
        $ruta["query"] == "ctrEliNota" ||
        $ruta["query"] == "ctrRegHorarioNota" ||
        $ruta["query"] == "ctrEditHorarioNota" ||
        $ruta["query"] == "ctrRegModNota" ||
        $ruta["query"] == "ctrEditModNota" ||
        $ruta["query"] == "ctrBusModuloCurso" ||
        $ruta["query"] == "ctrBusNota" ||
        $ruta["query"] == "ctrNotaEstudiante"

    ) {
        $metodo = $ruta["query"];
        $Nota = new ControladorNota();
        $Nota->$metodo();
    }
}

class ControladorNota
{
    /* PARA VER LAS NOTAS DE LOS ESTUDIANTES OK */
    static public function ctrNotaEstudiante($idEstudiante, $idMateria, $idModulo, $idCurso)
    {
        $respuesta = ModeloNota::mdlNotaEstudiante($idEstudiante, $idMateria, $idModulo, $idCurso);
        return $respuesta;
    }

    /* PARA VER LOS CURSOS DEL ESTUDIANTE */
    static public function ctrInfoCursos($id)
    {
        $respuesta = ModeloNota::mdlInfoCursos($id);
        return $respuesta;
    }

    static public function ctrBusModuloCurso()
    {
        require "../modelo/notaModelo.php";
        $curso = $_POST["curso"];
        $respuesta = ModeloNota::mdlBusModuloCurso($curso);
        return $respuesta;
        /* var_dump($respuesta); */
        /*  echo json_encode($respuesta); */
    }


    static public function ctrInfoNota($id)
    {
        $respuesta = ModeloNota::mdlInfoNota($id);
        return $respuesta;
    }

    static public function ctrInfoNotasRegistradas()
    {
        $respuesta = ModeloNota::mdlInfoNotasRegistradas();
        return $respuesta;
    }

    static public function ctrInfoNotas()
    {
        $respuesta = ModeloNota::mdlInfoNotas();
        return $respuesta;
    }

    static public function ctrRegNotas()
    {
        session_start();
        require "../modelo/notaModelo.php";
        date_default_timezone_set("America/La_Paz");
        $fecha = date("Y-m-d");

        $data = array(
            "idEstudiante" => $_POST["idEstudiante"],
            "idGrupo" => $_POST["idGrupo"],
            "idCurso" => $_POST["idCurso"],
            "idModulo" => $_POST["idModulo"],
            "idMateria" => $_POST["idMateria"],
            "notas" => $_POST["notas"],
            "fecha" => $fecha,
            "usuario" => $_SESSION["idUsuario"],
        );

        $respuesta = ModeloNota::mdlRegNotas($data);
        echo $respuesta;
    }



    static public function ctrEditNota()
    {
        require "../modelo/NotaModelo.php";

        $imgProdActual = $_POST["imgActNota"];

        $imgProducto = $_FILES["ImgNota"];

        if ($imgProducto["name"] == "") {
            $imagen = $imgProdActual;
        } else {

            $imagen = $imgProducto["name"];
            $archImagen = $imgProducto["tmp_name"];

            move_uploaded_file($archImagen, "../assest/dist/img/Notas/" . $imagen);
        }

        $data = array(
            "idNota" => $_POST["idNota"],
            "nomNota" => $_POST["nomNota"],
            "costoNota" => $_POST["costoNota"],
            "contenidoNota" => $_POST["contenidoNota"],
            "estadoNota" => $_POST["estadoNota"],
            "imgNota" => $imagen,
        );

        $respuesta = ModeloNota::mdlEditNota($data);
        echo $respuesta;
    }

    static public function ctrEliNota()
    {
        require "../modelo/NotaModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloNota::mdlEliNota($data);
        echo $respuesta;
    }

    static public function ctrCantidadNotas()
    {
        $respuesta = ModeloNota::mdlCantidadNotas();
        return $respuesta;
    }

    /* ============================================= HORARIO Nota */
    static public function ctrInfoListaNotas()
    {
        $respuesta = ModeloNota::mdlInfoListaNotas();
        return $respuesta;
    }
    static public function ctrInfoHorarioNota()
    {
        $respuesta = ModeloNota::mdlInfoHorarioNotas();
        return $respuesta;
    }
    static public function ctrRegHorarioNota()
    {
        require "../modelo/NotaModelo.php";
        $data = array(
            "nomNota" => $_POST["nomNota"],
            "duracionNota" => $_POST["duracionNota"],
            "horaNota" => $_POST["horaNota"],
            "diaClases" => $_POST["diaClases"]
        );

        /* var_dump($data); */
        $respuesta = ModeloNota::mdlRegHorarioNota($data);
        echo $respuesta;
    }

    static public function ctrInfoHorarioNotas($id)
    {
        $respuesta = ModeloNota::mdlInfoHorarioNota($id);
        return $respuesta;
    }

    static public function ctrEditHorarioNota()
    {
        require "../modelo/NotaModelo.php";

        $data = array(
            "idHorarioNota" => $_POST["idHorarioNota"],
            "nombreNota" => $_POST["nombreNota"],
            "duracionNota" => $_POST["duracionNota"],
            "horaNota" => $_POST["horaNota"],
            "diaClases" => $_POST["diaClases"],
        );

        $respuesta = ModeloNota::mdlEditNota($data);
        echo $respuesta;
    }

    static public function ctrInfoDetalleNota($id)
    {
        $respuesta = ModeloNota::mdlInfoDetalleNota($id);
        return $respuesta;
    }

    /*ASIGNACION DE NotaS -> MODULOS  */
    static public function ctrNotaModulo()
    {
        $respuesta = ModeloNota::mdlNotaModulo();
        return $respuesta;
    }

    static public function ctrRegModNota()
    {
        require "../modelo/NotaModelo.php";
        $data = array(
            "nomModulo" => $_POST["nomModulo"],
            "nomNota" => $_POST["nomNota"],
        );
        $respuesta = ModeloNota::mdlRegModNota($data);
        echo $respuesta;
    }

    static public function ctrNotaModulos($id)
    {
        $respuesta = ModeloNota::mdlNotaModulos($id);
        return $respuesta;
    }

    static public function ctrEditModNota()
    {
        require "../modelo/NotaModelo.php";

        $data = array(
            "idAsignacion" => $_POST["idAsignacion"],
            "nomModulo" => $_POST["nomModulo"],
            "nomNota" => $_POST["nomNota"],
        );

        $respuesta = ModeloNota::mdlEditModNota($data);
        echo $respuesta;
    }
}
