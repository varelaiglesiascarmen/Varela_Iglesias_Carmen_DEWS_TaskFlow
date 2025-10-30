<?php
if (isset($_GET['termino_busqueda'])) {
    $termino = htmlspecialchars($_GET['termino_busqueda']);
} else {
    $termino = "Ningún término introducido";
}

return "Has buscado: $termino";
?>