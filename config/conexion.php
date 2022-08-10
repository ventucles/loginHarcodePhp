<?php

$server="localhost";
$user="root";
$pass="";
$db="colegio"; // AGREGAR BASE DE DATOS

$mysqli = new mysqli($server,$user,$pass,$db);

        if ($mysqli->connect_error) {
            die('Error de Conexión (' . $mysqli->connect_errno . ')');
        }

?>