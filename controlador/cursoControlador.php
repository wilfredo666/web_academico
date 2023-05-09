<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegCurso" ||
        $ruta["query"] == "ctrEditCurso" ||
        $ruta["query"] == "ctrEliCurso" ||
        $ruta["query"] == "ctrRegHorarioCurso" ||
        $ruta["query"] == "ctrEditHorarioCurso" ||
        $ruta["query"] == "ctrBusCurso"
    ) {
        $metodo = $ruta["query"];
        $Curso = new ControladorCurso();
        $Curso->$metodo();
    }
}

class ControladorCurso
{
    static public function ctrInfoCursosRegistradas()
    {
        $respuesta = ModeloCurso::mdlInfoCursosRegistradas();
        return $respuesta;
    }

    static public function ctrInfoCursos()
    {
        $respuesta = ModeloCurso::mdlInfoCursos();
        return $respuesta;
    }

    static public function ctrRegCurso()
    {
        require "../modelo/cursoModelo.php";

        $imagen = $_FILES["ImgCurso"];

        $nomImagen = $imagen["name"];
        $archImagen = $imagen["tmp_name"];

        move_uploaded_file($archImagen, "../assest/dist/img/Cursos/" . $nomImagen);

        $titulo = strtoupper($_POST["nomCurso"]);
        $data = array(
            "nomCurso" => $titulo,
            "contenidoCurso" => $_POST["contenidoCurso"],
            "imgCurso" => $nomImagen,
        );

        $respuesta = ModeloCurso::mdlRegCurso($data);
        echo $respuesta;
    }

    static public function ctrInfoCurso($id)
    {
        $respuesta = ModeloCurso::mdlInfoCurso($id);
        return $respuesta;
    }

    static public function ctrEditCurso()
    {
        require "../modelo/cursoModelo.php";

        $imgProdActual = $_POST["imgActCurso"];

        $imgProducto = $_FILES["ImgCurso"];

        if ($imgProducto["name"] == "") {
            $imagen = $imgProdActual;
        } else {

            $imagen = $imgProducto["name"];
            $archImagen = $imgProducto["tmp_name"];

            move_uploaded_file($archImagen, "../assest/dist/img/cursos/" . $imagen);
        }

        $data = array(
            "idCurso" => $_POST["idCurso"],
            "nomCurso" => $_POST["nomCurso"],
            "descCurso" => $_POST["descCurso"],
            "imgCurso" => $imagen,
        );
        $respuesta = ModeloCurso::mdlEditCurso($data);
        echo $respuesta;
    }

    static public function ctrEliCurso()
    {
        require "../modelo/cursoModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloCurso::mdlEliCurso($data);
        echo $respuesta;
    }

    static public function ctrCantidadCursos()
    {
        $respuesta = ModeloCurso::mdlCantidadCursos();
        return $respuesta;
    }

    /* ============================================= HORARIO Curso */
    static public function ctrInfoListaCursos()
    {
        $respuesta = ModeloCurso::mdlInfoListaCursos();
        return $respuesta;
    }
    static public function ctrInfoHorarioCurso()
    {
        $respuesta = ModeloCurso::mdlInfoHorarioCursos();
        return $respuesta;
    }
    static public function ctrRegHorarioCurso()
    {
        require "../modelo/CursoModelo.php";
        $data = array(
            "nomCurso" => $_POST["nomCurso"],
            "duracionCurso" => $_POST["duracionCurso"],
            "horaCurso" => $_POST["horaCurso"],
            "diaClases" => $_POST["diaClases"]
        );

        /* var_dump($data); */
        $respuesta = ModeloCurso::mdlRegHorarioCurso($data);
        echo $respuesta;
    }

    static public function ctrInfoHorarioCursos($id)
    {
        $respuesta = ModeloCurso::mdlInfoHorarioCurso($id);
        return $respuesta;
    }

    static public function ctrEditHorarioCurso()
    {
        require "../modelo/CursoModelo.php";

        $data = array(
            "idHorarioCurso" => $_POST["idHorarioCurso"],
            "nombreCurso" => $_POST["nombreCurso"],
            "duracionCurso" => $_POST["duracionCurso"],
            "horaCurso" => $_POST["horaCurso"],
            "diaClases" => $_POST["diaClases"],
        );

        $respuesta = ModeloCurso::mdlEditCurso($data);
        echo $respuesta;
    }

    static public function ctrInfoDetalleCurso($id)
    {
        $respuesta = ModeloCurso::mdlInfoDetalleCurso($id);
        return $respuesta;
    }
}
