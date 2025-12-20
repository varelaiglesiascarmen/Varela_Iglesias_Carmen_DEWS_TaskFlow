<?php

/* He creado la base de datos desde la interfaz de phpMyAdmin*/

/* 
--------------------------------------------
Nivel 1: Los Cimientos (Conexión y Creación)
--------------------------------------------
*/

// Incluir 'conexion.php'
include 'conexion.php';

// Si la tabla no existe, crearla
$firstStone = "
    CREATE TABLE IF NOT EXISTS productos(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR (50), 
        precio DECIMAL (10,2)
    );
";

$sql = $conexion->prepare($firstStone);
$sql->execute();

// prepara la consulta a la bbdd
$firstProduct = $conexion->prepare("INSERT INTO productos (nombre,precio) VALUES ('Teclado mecánico',50.00)");
// Ejecuta la consulta en la bbdd
$firstProduct->execute();
// cierra la conexion
$firstProduct->close();

//--------------------------------------------------------------------

// Creación de la funcion insertarProducto
function insertProduct($nombre, $precio)
{
    // acceder a la conesión de la bbdd a través de la variable $mysqli
    global $conexion;
    // prepara la consulta, los ? le está diciendo a la bbdd que ahí van a ir valores que mas adelantes seran sustituidos por los reales
    $addRecord = $conexion->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
    // vincula los parámetros a ? a la query con bind_param (medida de segurida que lee antes de ejecutar la consulta para evitar codigos maliciosos)
    $addRecord->bind_param("sd", $nombre, $precio);
    // mira si ha funcionado la ejecución
    if ($addRecord->execute()) {
        $addRecord->close();
        // si no falla = true
        return true;
    } else {
        // imprimir error de debug si falla
        echo "Error SQL al insertar $nombre: " . $addRecord->error;
        $addRecord->close();
        // si falla = false
        return false;
    }
}

// prueba de la función insertProduct
insertProduct("Monitor Curvo", 250.99);

// lote inicial, desde foreach 
$listProducts = [
    ['Ratón', 25.50],
    ['Webcam HD', 15.00],
    ['Impresora', 180.35]
];

// Recorrer el array e insertar cada producto
foreach ($listProducts as $addNewProduct) {
    $nombre = $addNewProduct[0];
    $precio = $addNewProduct[1];
    // Llamada a la función insertProduct
    insertProduct($nombre, $precio);
}

/* 
--------------------------------------------
Nivel 2: El Explorador (Consultas Básicas)
--------------------------------------------
*/

// Consulta Simple: Realiza un SELECT * FROM productos. Ordena los resultados por precio descendente.
$recordSet = $conexion->query("SELECT * FROM productos WHERE precio > 20 ORDER BY precio DESC");

// Recorre el resultado con while y muestra los nombres en una lista <ul> 
echo "<ul>";

// fetch_assoc() devuelve un array asociativo con los campos
while ($row = $recordSet->fetch_assoc()) {
    echo "<li>" . $row['nombre'] . " (" . $row['precio'] . " €)</li>";
}

echo "</ul>";

// ¿cuantos productos hay?
$recordSet = $conexion->query("SELECT COUNT(*) as total FROM productos");
$totalProducts = $recordSet->fetch_assoc()['total'];
echo "<p>Total de productos en la tabla: " . $totalProducts . "</p>";

// buscar por id
$id = 3;
$sql = $conexion->prepare("SELECT * FROM productos WHERE id = ?");
// bind_param (medida de segurida que lee antes de ejecutar la consulta para evitar codigos maliciosos)
$sql->bind_param("i", $id);

$sql->execute();
$resultado = $sql->get_result();

if ($conexion->affected_rows === 0) {
    echo "<p>No se ha encontrado ningun producto con ID $id </p>";
} else {
    $producto = $resultado->fetch_assoc();
    echo "<p>Producto con ID $id: " . $producto['nombre'] . " (" . $producto['precio'] . " €)</p>";
}

// redondear precios a 0 decimales
$recordSet = $conexion->query("SELECT ROUND(AVG(precio), 0) as promedio FROM productos");
$promedio = $recordSet->fetch_assoc()['promedio'];
echo "<p>Promedio de mercado redondeado: " . $promedio . " €</p>";

/* 
--------------------------------------------
Nivel 3: El Manipulador (Actualización y Borrado)
--------------------------------------------
*/
$precio = 45.00;
$nombre = "Teclado mecánico";
// modificar el precio de un producto
$updateRecord = $conexion->prepare("UPDATE productos SET precio = ? WHERE nombre = ?");
// vincula los parámetros a ? a la query con bind_param (medida de segurida que lee antes de ejecutar la consulta para evitar codigos maliciosos)
$updateRecord->bind_param("ds", $precio, $nombre);
$updateRecord->execute();

//subida de precios del 10% a todos los productos
$updateRecord = $conexion->prepare("UPDATE productos SET precio = precio * 1.10;");
$updateRecord->execute();

// eliminar id = 2
$id = 2;
$sql = $conexion->prepare("DELETE FROM productos WHERE id = ?");
// bind_param (medida de segurida que lee antes de ejecutar la consulta para evitar codigos maliciosos)
$sql->bind_param("i", $id);
$sql->execute();

// si se ha borrado correctamente, dilo
if ($conexion->affected_rows > 0) {
    echo "<p>Producto con ID $id borrado </p>";
} else {
    echo "<p>No se ha encontrado ningun producto con ID $id </p>";
}

// capturar errore en rojo
try {
    $selectRecord = $conexion->prepare("SELECT * FROM productosss;");
    $selectRecord->execute();
} catch (mysqli_sql_exception $e) {
    echo "<p style='color:red;'>Error en la consulta: " . $e->getMessage() . "</p>";
}

/* 
--------------------------------------------
Nivel 4: El Arquitecto (Tablas Relacionales)
--------------------------------------------
*/
// crear nueva mysql_tabla
$secondTable = "
    CREATE TABLE IF NOT EXISTS categorias(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR (50)
    );
";

$sql = $conexion->prepare($secondTable);
$sql->execute();

// modificar categorias
$sql = $conexion->prepare("ALTER TABLE productos ADD COLUMN categoria_id INT");

try {
    $sql->execute();
} catch (mysqli_sql_exception $e) {
    // capturar error si la columna ya existe
    if ($e->getCode() != 1060) {
        echo "<p style='color:red;'>Error al modificar la tabla: " . $e->getMessage() . "</p>";
    }
}

// insertar categorias
$sql = $conexion->prepare("INSERT INTO categorias (nombre) VALUES (?)");
$categories = ['Periféricos', 'Monitores'];

foreach ($categories as $category) {
    $sql->bind_param("s", $category);
    $sql->execute();
}

// añadir categoria_id a categorías correspondientes
$sql = $conexion->prepare("UPDATE productos SET categoria_id = ? WHERE nombre = ?");
$categoryMap = [
    'Ratón' => 1,
    'Teclado mecánico' => 1,
    'Webcam HD' => 1,
    'Impresora' => 1,
    'Monitor Curvo' => 2
];

foreach ($categoryMap as $productName => $categoryId) {
    $sql->bind_param("is", $categoryId, $productName);
    $sql->execute();
}

// mostrar productos en tabla
$sql = "SELECT p.nombre AS nombre_producto, c.nombre AS nombre_categoria 
        FROM productos p 
        INNER JOIN categorias c ON p.categoria_id = c.id";

$resultado = $conexion->query($sql);

// Comprobar si hay resultados y generar la tabla
if ($resultado && $resultado->num_rows > 0): ?>

<!-- cuando estamos en php y usamos html, hay q cerrar php -->
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $fila['nombre_producto'] ?></td>
                    <td><?= $fila['nombre_categoria'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No se encontraron productos o la consulta falló.</p>
<?php endif; 

// ordenar la tabla x categoriaa
$sql = "SELECT c.nombre AS categoria, COUNT(p.id) AS total_productos
        FROM categorias c
        INNER JOIN productos p ON c.id = p.categoria_id
        GROUP BY c.id";

$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0): ?>

    <h3>Resumen de Inventario</h3>
    <table class="resumen-table">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Nº de Productos</th>
            </tr>
        </thead>
        <tbody>
            <?php while($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><strong><?= $fila['categoria'] ?></strong></td>
                    <td><?= $fila['total_productos'] ?> unidades</td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php else: ?>
    <p>No hay datos disponibles para el resumen.</p>
<?php endif; 


// Paso final, cerrar la conexión
// $cierreConexion = $mysqli->close();

?>