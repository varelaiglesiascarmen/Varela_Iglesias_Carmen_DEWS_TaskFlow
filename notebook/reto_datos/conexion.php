<?php
/*
Nivel 1: Los Cimientos (Conexión y Creación)
*/

// Instancia objeto new mysqli() > mysqli (lib nativa php para trabajar con bbdd mysql)
$conexion = new mysqli("localhost", "root", "", "tienda_master"); // clase abstracta

if ($conexion->connect_errno) {
    // die = catch de java , conexion->connect_error devuelve el error específico
    die("No conectado a la base de datos" . $conexion->connect_error);
} else {
    // consulta para ver si funcionó la conexión
    $res = $conexion->query("SELECT VERSION() as version");
    echo "<h1>Conexión exitosa. -v: " . $res->fetch_assoc()['version'] . "</h1>";
    
    // evitar problemas con los caracteres especiales
    $conexion->set_charset("utf8");
}

?>