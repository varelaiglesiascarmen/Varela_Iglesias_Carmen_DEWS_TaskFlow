<?php
// Nivel 1: Lógica con Funciones
// Problema 1: Calcular Descuento
function calcularDescuento($precio, $categoria)
{

    switch ($categoria) {
        case "electronica":
            $precio = $precio * 0.15;
            break;
        case "ropa":
            $precio = $precio * 0.10;
            break;
        case "alimentacion":
            $precio = $precio * 0.5;
            break;
        default:
            echo "Inserte una categoria valida";
            break;
    }

    return $precio;
}

// Problema 2: EL juego "FizzBuzz"
function fizzBuzz($numero)
{
    return match (true) {
        // si un numero es divisible por 3 y 5 a la vez, tambien lo es por 15
        $numero % 15 === 0 => "FizzBuzz",
        $numero % 3 === 0 => "Fizz",
        $numero % 5 === 0 => "Buzz",
        default => $numero,
    };

}

// Problema 3: Validador de contraseña
function validarContraseña($pass)
{
    $tipo = "";

    // strlen > devuelve el num de caracteres
    if (strlen($pass) <= 8) {
        $tipo = " debil";
    } else {
        // preg_match > comprueba si la cadena cumple un patrón
        if ($tieneMayus = preg_match('/[A-Z]/', $pass) && $tieneNum = preg_match('/[0-9]/', $pass)) {
            $tipo = " fuerte";
        } else {
            $tipo = " media";
        }
    }

    return "La contraseña " . $pass . ", es de tipo" . $tipo;
}

// Nivel 2: Manipulación Avanzada de Arrays
// Problema 4: Encontrar el alor máximo
function encontrarMaximo($array)
{
    $maximo = $array[0];

    foreach ($array as $valor){
        if ($valor > $maximo) {
            $maximo = $valor;
        }
    }
}

//Problema 5: Filtrar Usuarios por cirterio
function filtrarUsuarios($usuarios) {
    $resultrados = [];

    foreach ($usuarios as $usuario){
        $mensaje = "El usuario " . $usuario['nombre'] . " es ";
        
        // mayor de edad o no
        if ($usuario['edad'] >= 18) {
            $mensaje .= "mayor de edad";
        } else {
            $mensaje .= "menor de edad";
        }

        // Activo o no
        if ($usuario['activo'] === true) {
            $mensaje .= " y está activo.";
        } else {
            $mensaje .= " y no está activo.";
        }

        // "crea" un array donde va guardadndo los mensajes por cada usuario
        $resultados[] = $mensaje;

    }

    return $resultados;
}

?>