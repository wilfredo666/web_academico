<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegGrupo" ||
        $ruta["query"] == "ctrEditGrupo" ||
        $ruta["query"] == "ctrEliGrupo" ||
        $ruta["query"] == "ctrRegHorarioGrupo" ||
        $ruta["query"] == "ctrEditHorarioGrupo" ||
        $ruta["query"] == "ctrBusGrupo"
    ) {
        $metodo = $ruta["query"];
        $Grupo = new ControladorGrupo();
        $Grupo->$metodo();
    }
}

class ControladorGrupo
{
    static public function ctrInfoGruposRegistradas()
    {
        $respuesta = ModeloGrupo::mdlInfoGruposRegistradas();
        return $respuesta;
    }

    static public function ctrInfoGrupos()
    {
        $respuesta = ModeloGrupo::mdlInfoGrupos();
        return $respuesta;
    }

    static public function ctrRegGrupo()
    {
        require "../modelo/grupoModelo.php";

        $data = array(
            "nomGrupo" => $_POST["nomGrupo"],
            "nomCurso" => $_POST["nomCurso"],
            "fechaInicio" => $_POST["fechaInicio"],
            "turno" => $_POST["turno"],
            "horaInicio" => $_POST["horaInicio"],
            "horaFin" => $_POST["horaFin"],
        );

        $respuesta = ModeloGrupo::mdlRegGrupo($data);
        echo $respuesta;
    }

    static public function ctrInfoGrupo($id)
    {
        $respuesta = ModeloGrupo::mdlInfoGrupo($id);
        return $respuesta;
    }

    static public function ctrEditGrupo()
    {
        require "../modelo/grupoModelo.php";

        $data = array(
            "idGrupo" => $_POST["idGrupo"],
            "nomGrupo" => $_POST["nomGrupo"],
            "nomCurso" => $_POST["nombreCurso"],
            "fechaInicio" => $_POST["fechaInicio"],
            "turno" => $_POST["turno"],
            "horaInicio" => $_POST["horaInicio"],
            "horaFin" => $_POST["horaFin"],
            "estadoGrupo" => $_POST["estadoGrupo"],
        );

        $respuesta = ModeloGrupo::mdlEditGrupo($data);
        echo $respuesta;
    }

    static public function ctrEliGrupo()
    {
        require "../modelo/grupoModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloGrupo::mdlEliGrupo($data);
        echo $respuesta;
    }

    static public function ctrCantidadGrupos()
    {
        $respuesta = ModeloGrupo::mdlCantidadGrupos();
        return $respuesta;
    }

    /* ============================================= HORARIO Grupo */
    static public function ctrInfoListaGrupos()
    {
        $respuesta = ModeloGrupo::mdlInfoListaGrupos();
        return $respuesta;
    }
    static public function ctrInfoHorarioGrupo()
    {
        $respuesta = ModeloGrupo::mdlInfoHorarioGrupos();
        return $respuesta;
    }
    static public function ctrRegHorarioGrupo()
    {
        require "../modelo/GrupoModelo.php";
        $data = array(
            "nomGrupo" => $_POST["nomGrupo"],
            "duracionGrupo" => $_POST["duracionGrupo"],
            "horaGrupo" => $_POST["horaGrupo"],
            "diaClases" => $_POST["diaClases"]
        );

        /* var_dump($data); */
        $respuesta = ModeloGrupo::mdlRegHorarioGrupo($data);
        echo $respuesta;
    }

    static public function ctrInfoHorarioGrupos($id)
    {
        $respuesta = ModeloGrupo::mdlInfoHorarioGrupo($id);
        return $respuesta;
    }

    static public function ctrEditHorarioGrupo()
    {
        require "../modelo/GrupoModelo.php";

        $data = array(
            "idHorarioGrupo" => $_POST["idHorarioGrupo"],
            "nombreGrupo" => $_POST["nombreGrupo"],
            "duracionGrupo" => $_POST["duracionGrupo"],
            "horaGrupo" => $_POST["horaGrupo"],
            "diaClases" => $_POST["diaClases"],
        );

        $respuesta = ModeloGrupo::mdlEditGrupo($data);
        echo $respuesta;
    }

    static public function ctrInfoDetalleGrupo($id)
    {
        $respuesta = ModeloGrupo::mdlInfoDetalleGrupo($id);
        return $respuesta;
    }
}
