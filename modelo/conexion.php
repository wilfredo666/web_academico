<?php

class Conexion
{
    /* CONEXION POR PDO */
    static public function conectar()
    {
        /* PARA TRABAJAR DE MANERA LOCAL */
        /* $host = "localhost";
        $db = "web_academico";
        $userDB = "root";
        $passDB = ""; */
        
        $host = "localhost";
        $db = "u263048258_web_academico";
        $userDB = "u263048258_web_academico";
        $passDB = "Administrador123";

        $link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);
        $link->exec("set names utf8");
        return $link;
    }
}
