<?php

class Conectar{

    public static function conexion(){

        $conexion=new mysqli("localhost", "userpg", "userpg", "pinchoges");

        $conexion->query("SET NAMES 'utf8'");

        return $conexion;

    }

}

?>
