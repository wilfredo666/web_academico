<?php

class Conexion
{
    /* CONEXION POR PDO */
    static public function conectar()
    {
        $host = "localhost";
        $db = "web_academico";
        $userDB = "root";
        $passDB = "";

        $link = new PDO("mysql:host=" . $host . ";" . "dbname=" . $db, $userDB, $passDB);
        $link->exec("set names utf8");
        return $link;
    }
}
