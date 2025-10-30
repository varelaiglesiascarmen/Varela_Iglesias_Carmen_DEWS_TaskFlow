<?php
// Mostrar los alumnos aprobados y la media de toda la clase

$alumnos = [
    ["nombre" => "Ana", "nota" => 8],
    ["nombre" => "Luis", "nota" => 4],
    ["nombre" => "Carmen", "nota" => 7],
    ["nombre" => "Pablo", "nota" => 5],
];

// imprimir info alumnos
function mostraralumnos ($alumnos){
    foreach ($alumnos as $alumno){
        echo "Nombre: " . $alumno["nombre"] . " | Nota: " . $alumno["nota"] . "\n";
    }
}

// calcular media alumnos
function calcularMedia($alumnos){
    $suma = 0;

    foreach ($alumnos as $alumno){
       $suma = $suma + $alumno["nota"];
    }

    $media= "La media de la clase es de:  " . ($suma / count($alumnos));

    return $media;
}

// alumnos aprobados
function alumnosAprobados($alumnos){
    $aprobados = [];

    foreach ($alumnos as $alumno){
        if ($alumno["nota"] >= 5){
            $aprobados[] = $alumno;
        }
    }

    if (count($aprobados) === 0){
        return "No ha aprobado nadie";
    }

    return $aprobados;
}

// buscar alumnos por nombre
function buscarNombre($alumnos, $nombre){
    foreach ($alumnos as $alumno){
        if ($alumno["nombre"] === $nombre){
            return $alumno;
        }
    }
    return "Alumno no encontrado";
}

?>