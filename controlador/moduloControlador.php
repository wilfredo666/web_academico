<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegModulo" ||
        $ruta["query"] == "ctrEditModulo" ||
        $ruta["query"] == "ctrEliModulo" ||
        $ruta["query"] == "ctrRegHorarioModulo" ||
        $ruta["query"] == "ctrEditHorarioModulo" ||
        $ruta["query"] == "ctrBusModulo"
    ) {
        $metodo = $ruta["query"];
        $Modulo = new ControladorModulo();
        $Modulo->$metodo();
    }
}

class ControladorModulo
{
    static public function ctrInfoModulosRegistradas()
    {
        $respuesta = ModeloModulo::mdlInfoModulosRegistradas();
        return $respuesta;
    }

    static public function ctrInfoModulos()
    {
        $respuesta = ModeloModulo::mdlInfoModulos();
        return $respuesta;
    }

    static public function ctrRegModulo()
    {
        require "../modelo/moduloModelo.php";

        $data = array(
            "nomCurso" => $_POST["nomCurso"],
            "nomModulo" => $_POST["nomModulo"],
            "costoModulo" => $_POST["costoModulo"],
            "duracionModulo" => $_POST["duracionModulo"],
        );

        $respuesta = ModeloModulo::mdlRegModulo($data);
        echo $respuesta;
    }

    static public function ctrInfoModulo($id)
    {
        $respuesta = ModeloModulo::mdlInfoModulo($id);
        return $respuesta;
    }

    static public function ctrEditModulo()
    {
        require "../modelo/moduloModelo.php";

        $data = array(
            "idModulo" => $_POST["idModulo"],
            "nombreCurso" => $_POST["nombreCurso"],
            "nomModulo" => $_POST["nomModulo"],
            "duracionModulo" => $_POST["duracionModulo"],
            "costoModulo" => $_POST["costoModulo"],
            "estadoModulo" => $_POST["estadoModulo"],
        );

        $respuesta = ModeloModulo::mdlEditModulo($data);
        echo $respuesta;
    }

    static public function ctrEliModulo()
    {
        require "../modelo/moduloModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloModulo::mdlEliModulo($data);
        echo $respuesta;
    }

    static public function ctrCantidadModulos()
    {
        $respuesta = ModeloModulo::mdlCantidadModulos();
        return $respuesta;
    }

    /* ============================================= HORARIO Modulo */
    static public function ctrInfoListaModulos()
    {
        $respuesta = ModeloModulo::mdlInfoListaModulos();
        return $respuesta;
    }
    static public function ctrInfoHorarioModulo()
    {
        $respuesta = ModeloModulo::mdlInfoHorarioModulos();
        return $respuesta;
    }
    static public function ctrRegHorarioModulo()
    {
        require "../modelo/ModuloModelo.php";
        $data = array(
            "nomModulo" => $_POST["nomModulo"],
            "duracionModulo" => $_POST["duracionModulo"],
            "horaModulo" => $_POST["horaModulo"],
            "diaClases" => $_POST["diaClases"]
        );

        /* var_dump($data); */
        $respuesta = ModeloModulo::mdlRegHorarioModulo($data);
        echo $respuesta;
    }

    static public function ctrInfoHorarioModulos($id)
    {
        $respuesta = ModeloModulo::mdlInfoHorarioModulo($id);
        return $respuesta;
    }

    static public function ctrEditHorarioModulo()
    {
        require "../modelo/ModuloModelo.php";

        $data = array(
            "idHorarioModulo" => $_POST["idHorarioModulo"],
            "nombreModulo" => $_POST["nombreModulo"],
            "duracionModulo" => $_POST["duracionModulo"],
            "horaModulo" => $_POST["horaModulo"],
            "diaClases" => $_POST["diaClases"],
        );

        $respuesta = ModeloModulo::mdlEditModulo($data);
        echo $respuesta;
    }

    static public function ctrInfoDetalleModulo($id)
    {
        $respuesta = ModeloModulo::mdlInfoDetalleModulo($id);
        return $respuesta;
    }
}
