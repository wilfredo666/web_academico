<?php
$ruta = parse_url($_SERVER['REQUEST_URI']);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "ctrRegNoticia" ||
        $ruta["query"] == "ctrEditNoticia" ||
        $ruta["query"] == "ctrEliNoticia" ||
        $ruta["query"] == "ctrBusNoticia"
    ) {
        $metodo = $ruta["query"];
        $Noticia = new ControladorNoticia();
        $Noticia->$metodo();
    }
}

class ControladorNoticia
{
    static public function ctrInfoNoticias(){
        $respuesta = ModeloNoticia::mdlInfoNoticias();
        return $respuesta;
    }

    static public function ctrRegNoticia()
    {
        require "../modelo/noticiaModelo.php";

        $imagen=$_FILES["ImgNoticia"];

        $nomImagen=$imagen["name"];
        $archImagen=$imagen["tmp_name"];
    
        move_uploaded_file($archImagen,"../assest/dist/img/noticias/".$nomImagen);

        $data = array(
            "nomNoticia" => $_POST["nomNoticia"],
            "fechaNoticia" => $_POST["fechaNoticia"],
            "contenidoNoticia" => $_POST["contenidoNoticia"],
            "imgNoticia" => $nomImagen,
        );

        $respuesta = ModeloNoticia::mdlRegNoticia($data);
        echo $respuesta;
    }

    static public function ctrInfoNoticia($id)
    {
        $respuesta = ModeloNoticia::mdlInfoNoticia($id);
        return $respuesta;
    }

    static public function ctrEditNoticia()
    {
        require "../modelo/noticiaModelo.php";

        $imgProdActual=$_POST["imgActNoticia"];
    
        $imgProducto=$_FILES["ImgNoticia"];
        
        if($imgProducto["name"]==""){
          $imagen=$imgProdActual;
        }else{
          
          $imagen=$imgProducto["name"];
          $archImagen=$imgProducto["tmp_name"];
          
          move_uploaded_file($archImagen,"../assest/dist/img/noticias/".$imagen);
        }

        $data = array(
            "idNoticia" => $_POST["idNoticia"],
            "nomNoticia" => $_POST["nomNoticia"],
            "fechaNoticia" => $_POST["fechaNoticia"],
            "contenidoNoticia" => $_POST["contenidoNoticia"],
            "estadoNoticia" => $_POST["estadoNoticia"],
            "imgNoticia" => $imagen,
        );

        $respuesta = ModeloNoticia::mdlEditNoticia($data);
        echo $respuesta;
    }
}
