<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegMateria" ||
        $ruta["query"] == "ctrEditMateria" ||
        $ruta["query"] == "ctrEliMateria" ||
        $ruta["query"] == "ctrRegHorarioMateria" ||
        $ruta["query"] == "ctrEditHorarioMateria" ||
        $ruta["query"] == "ctrEliAsigHorario" ||
        $ruta["query"] == "ctrRegModMateria" ||
        $ruta["query"] == "ctrEditModMateria" ||
        $ruta["query"] == "ctrBusMateria"
    ) {
        $metodo = $ruta["query"];
        $Materia = new ControladorMateria();
        $Materia->$metodo();
    }
}

class ControladorMateria
{
    static public function ctrInfoMateriasRegistradas()
    {
        $respuesta = ModeloMateria::mdlInfoMateriasRegistradas();
        return $respuesta;
    }

    static public function ctrInfoMaterias()
    {
        $respuesta = ModeloMateria::mdlInfoMaterias();
        return $respuesta;
    }

    static public function ctrRegMateria()
    {
        require "../modelo/materiaModelo.php";

        $imagen = $_FILES["ImgMateria"];

        $nomImagen = $imagen["name"];
        $archImagen = $imagen["tmp_name"];

        move_uploaded_file($archImagen, "../assest/dist/img/materias/" . $nomImagen);

        $data = array(
            "nomMateria" => $_POST["nomMateria"],
            "costoMateria" => $_POST["costoMateria"],
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

        $imgProdActual = $_POST["imgActMateria"];

        $imgProducto = $_FILES["ImgMateria"];

        if ($imgProducto["name"] == "") {
            $imagen = $imgProdActual;
        } else {

            $imagen = $imgProducto["name"];
            $archImagen = $imgProducto["tmp_name"];

            move_uploaded_file($archImagen, "../assest/dist/img/materias/" . $imagen);
        }

        $data = array(
            "idMateria" => $_POST["idMateria"],
            "nomMateria" => $_POST["nomMateria"],
            "costoMateria" => $_POST["costoMateria"],
            "contenidoMateria" => $_POST["contenidoMateria"],
            "estadoMateria" => $_POST["estadoMateria"],
            "imgMateria" => $imagen,
        );

        $respuesta = ModeloMateria::mdlEditMateria($data);
        echo $respuesta;
    }

    static public function ctrEliMateria()
    {
        require "../modelo/materiaModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloMateria::mdlEliMateria($data);
        echo $respuesta;
    }

    static public function ctrCantidadMaterias()
    {
        $respuesta = ModeloMateria::mdlCantidadMaterias();
        return $respuesta;
    }

    /* ============================================= HORARIO MATERIA */
    static public function ctrInfoListaMaterias()
    {
        $respuesta = ModeloMateria::mdlInfoListaMaterias();
        return $respuesta;
    }
    static public function ctrInfoHorarioMateria()
    {
        $respuesta = ModeloMateria::mdlInfoHorarioMaterias();
        return $respuesta;
    }
    static public function ctrRegHorarioMateria()
    {
        require "../modelo/materiaModelo.php";
        $data = array(
            "nomMateria" => $_POST["nomMateria"],
            "duracionMateria" => $_POST["duracionMateria"],
            "horaMateria" => $_POST["horaMateria"],
            "diaClases" => $_POST["diaClases"]
        );

        /* var_dump($data); */
        $respuesta = ModeloMateria::mdlRegHorarioMateria($data);
        echo $respuesta;
    }

    static public function ctrInfoHorarioMaterias($id)
    {
        $respuesta = ModeloMateria::mdlInfoHorarioMateria($id);
        return $respuesta;
    }

    static public function ctrEditHorarioMateria()
    {
        require "../modelo/materiaModelo.php";

        $data = array(
            "idHorarioMateria" => $_POST["idHorarioMateria"],
            "nombreMateria" => $_POST["nombreMateria"],
            "duracionMateria" => $_POST["duracionMateria"],
            "horaMateria" => $_POST["horaMateria"],
            "diaClases" => $_POST["diaClases"],
        );

        $respuesta = ModeloMateria::mdlEditMateria($data);
        echo $respuesta;
    }
/* PARA MOSTRAR DETALLE DEL CURSO */
    static public function ctrDetalleCurso($id)
    {
        $respuesta = ModeloMateria::mdlDetalleCurso($id);
        return $respuesta;
    } 
    
    static public function ctrCantidadModulo($id)
    {
        $respuesta2 = ModeloMateria::mdlCantidadModulo($id);
        return $respuesta2;
    } 

    static public function ctrMateriasModulo($id)
    {
        $respuesta2 = ModeloMateria::mdlMateriasModulo($id);
        return $respuesta2;
    }

    static public function ctrDetalleCursoSeleccionado($id){
        $respuesta = ModeloMateria::mdlInfoDetalleCursoSeleccionado($id);
        return $respuesta;
    }
    
    static public function ctrInfoDetalleMateria($id)
    {
        $respuesta = ModeloMateria::mdlInfoDetalleMateria($id);
        return $respuesta;
    }

    static public function ctrEliAsigHorario()
    {
        require "../modelo/materiaModelo.php";
        $data = $_POST["id"];

        $respuesta = ModeloMateria::mdlEliAsigHorario($data);
        echo $respuesta;
    }

    /*ASIGNACION DE MATERIAS -> MODULOS  */
    static public function ctrMateriaModulo()
    {
        $respuesta = ModeloMateria::mdlMateriaModulo();
        return $respuesta;
    }

    static public function ctrRegModMateria()
    {
        require "../modelo/materiaModelo.php";
        $data = array(
            "nomModulo" => $_POST["nomModulo"],
            "nomMateria" => $_POST["nomMateria"],
        );
        $respuesta = ModeloMateria::mdlRegModMateria($data);
        echo $respuesta;
    }

    static public function ctrMateriaModulos($id)
    {
        $respuesta = ModeloMateria::mdlMateriaModulos($id);
        return $respuesta;
    }
    
    static public function ctrEditModMateria()
    {
        require "../modelo/materiaModelo.php";

        $data = array(
            "idAsignacion" => $_POST["idAsignacion"],
            "nomModulo" => $_POST["nomModulo"],
            "nomMateria" => $_POST["nomMateria"],
        );

        $respuesta = ModeloMateria::mdlEditModMateria($data);
        echo $respuesta;
    }

    /* PARA BUSCAR MATERIAS DEL MUDULO */
    static public function ctrMateriaMod($id)
    {
        $respuesta = ModeloMateria::mdlMateriaMod($id);
        return $respuesta;
    }
    static public function ctrMatMod($id)
    {
        $respuesta = ModeloMateria::mdlMatMod($id);
        return $respuesta;
    }
    
    
}
