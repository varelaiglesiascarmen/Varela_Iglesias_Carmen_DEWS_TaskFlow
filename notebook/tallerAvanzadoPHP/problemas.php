<?php
            // ******** Categoria 1 ******** //
// Ejercicio 1: Mostrar conjunto de variables
$name = "Carmen"; // nombre
$lastName = "Varela Iglesas"; // apellidos
$age = 26; // edad
$height = 1.60; // altura
$studente = true; // estudiante (true/false)

// imprimir info
echo "Mi nombre es $name $lastName, tengo $age años, mido $height metros y " . ($studente ? "soy" : "no soy") . " estudiante.";

echo "<hr>";

// Ejerc 2: Info producto
$productName = "Tablet"; // nombre del producto
$productPrice = 250; // precio del producto
$stock = 8; // unidades en stock
$sale = false; // en oferta (true/false)

// imprimir info
echo "El producto $productName tiene un precio de $productPrice euros, quedan $stock unidades en stock y " . ($sale ? "está" : "no está") . " en oferta.";

echo "<hr>";

// Ejerc 3: Const de App
define("NOMBRE_SITIO", "Mi tienda Online");
define("VERSION_APP", 1.0);

echo "<hr>";

            // ******** Categoria 2 ******** //
//Ejercicio 4: Calculadora
$num1 = 10;
$num2 = 5;

// suma, resta, multiplicacion y division
$suma = $num1 + $num2;
$resta = $num1 - $num2;
$multiplicacion = $num1 * $num2;
$division = $num1 / $num2;

// imprimir resultados
echo "La suma de $num1 y $num2 es: $suma <br> La resta de $num1 y $num2 es: $resta <br> La multiplicación de $num1 y $num2 es: $multiplicacion <br> La división de $num1 y $num2 es: $division";

echo "<hr>";

// Ejerc 5 : actualizacion stock
$stock = 100;
$vendidos = 25;
$pedido = 50;

$stockActual = $stock - $vendidos; // stock actual
$stockTotal= $stockActual + $pedido; // stock total despues del pedido

// imrpimir stock
echo "El stock actual es: $stockActual unidades, más el pedido hay fianlmente $stockTotal unidades";

echo "<hr>";

// Ejerc 6: Concatenacion de textos
$name = "Oskar";
$apellido = "Calvo";
$curso="Desarrollo Web en entorno Servidor";
$fraseCompleta = "El profesor de $curso es $name $apellido.";

//imprimir
echo $fraseCompleta;

echo "<hr>";

// Ejercicio 7: Comparaciones simples
$edad = 20;
$edadMinima = 18;

// comprobacion de si es mayor o igual que la edad minima
var_dump($edad >= $edadMinima); // true

$contrasenaGuardadad="1234";
$contrasenaIntroducida="123";

// comprobacion de si es igual o no la contrasñea
var_dump($contrasenaGuardadad === $contrasenaIntroducida); // false

echo "<hr>";

//Ejer 8: ¿Par o impar?
$numero = 7;

if ($numero % 2 ==0){
    echo "El número $numero es par.";
} else {
    echo "El número $numero es impar.";
}

echo "<hr>";

            // ******** Categoria 3 ******** //
// Ejerc 9: Control de acceso
$edad = 17;

if($edad >= 18){
    echo "Acceso permitido";
} else {
    echo "Acceso denegado";
}

echo "<hr>";

// Ejerc 10: calificacion deexamen
$nota = 7.5;

if($nota >= 9){
    echo "Sobresaliente";
} else if($nota == 7 && $nota <=8.9){
    echo "Notable";
} else if($nota == 5 && $nota <=6.9){
    echo "Aprobado";
} else {
    echo "Suspenso";
}

echo "<hr>";

// Ejerc 11: menu dia con switch
$diaSemana = "lunes";

switch($diaSemana){
    case "lunes":
        echo "Hoy lentejas";
        break;
    case "miércoles":
        echo "Hoy paella";
        break;
    case "viernes":
        echo "Hoy pescado al horno";
        break;   
    default:
        echo "Hoy chicharrone";
        break;
}

echo "<hr>";

//Ejerc 12: Verificiacion de user
$rolUsuario = "admin";
$usuarioActivo = true;
if($usuarioActivo == true & $rolUsuario == "admin"){
    echo "Acceso permitido";
} else {
    echo "Acceso denegado";
}

echo "<hr>";
            // ******** Categoria 4 ******** //
// Ejerc 13: Tabla de multiplicar 7
$numero = 7;

for($i=1; $i<=10; $i++){
    echo "$numero x 0 = 0 <br> + $numero x $i = " . ($numero * $i) . "<br>";
}

echo "<hr>";

// Ejer 14: Cuenta atras fin de año
$contador=10;

while($contador > 0){
    echo $contador;
    $contador--;
}

echo "Feliz año nuevo!";

echo "<hr>";

// Ejerc 15: Recorrer nombres
$alumnos=["Ana", "Juan", "Pedro", "Sofía"];

foreach($alumnos as $alumno){
    echo "Hola $alumno!<br>";
}

echo "<hr>";

// Ejr 16: Listar productos
$productos = [
    ["nombre" => "Teclado", "precio" => 50],
    ["nombre" => "Ratón", "precio" => 25],
    ["nombre" => "Monitor", "precio" => 200]
];

foreach($productos as $producto){  
    echo "Producto: " . $producto["nombre"] . "<br>";
    echo "Precio: " . $producto["precio"] . "<br>";
}

echo "<hr>";

            // ******** Categoria 5 ******** //
// Ejerc. 17: Array asociativo
$usuario = array(
    "nombre" => "Carmen",
    "edad"=> "26",
    "email" => "cvi0004@alu.medac.es",
    "estudiante" => true,
);

echo "Mi nombre es: " . $usuario["nombre"] 
    . ", tengo " . $usuario["edad"] . " años y mi email es: " 
    . $usuario["email"] 
    . " y " . ($usuario["estudiante"] ? "sí soy estudiante." : "no soy estudiante.");
echo "<hr>";

//Ejer 18: array notas
$notas = [8.5, 4.2, 7.0, 9.8, 5.5, 3.9];

foreach($notas as $nota){
    if($nota >= 5){
        echo $nota . "<br>";
    }
}

echo "<hr>";

// Ejer 19: Lista de compra avanzada
$listaCompra = [
    "Frutas" => ["Manzanas", "Plátanos", "Naranjas"],
    "Lácteos" => ["Leche", "Queso"],
    "Limpieza" => ["Detergente", "Lejía"]
];

foreach ($listaCompra as $categoria => $productos) {
    // imprime las categoria (frutas, lacteos, limpieza)
    echo "$categoria:<br>"; 
    // imprime los productos (mabzanas, platanos,etc)
    foreach ($productos as $producto) {
        echo "- $producto<br>"; 
    }
    echo "<br>"; 
}

echo "<hr>";

// Ejerc 20: total del carrito
$productos = [
    ["nombre" => "Teclado", "precio" => 50],
    ["nombre" => "Ratón", "precio" => 25],
    ["nombre" => "Monitor", "precio" => 200]
];

$total = 0;

foreach($productos as $producto){
    // suma uno por uno y lo guaraa en la variable $total
    $total = $total + $producto["precio"];  
}

echo "El coste total del carrito es: $" . $total;

?>