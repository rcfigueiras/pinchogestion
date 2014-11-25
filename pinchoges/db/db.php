<?php

class Conectar{

    public static function conexion(){

        $conexion=new mysqli("localhost", "perso", "perso", "personas");

        $conexion->query("SET NAMES 'utf8'");

        return $conexion;

    }

}

?>
