<?php
// tests/AuthTest.php
use PHPUnit\Framework\TestCase;
// Incluimos los ficheros que contienen la lógica que queremos probar
require_once '../app/models/data.php';
require_once '../app/controllers/AuthControlle.php';
class AuthTest extends TestCase
{
    // Prueba para el "camino feliz" (login correcto)
    public function testLoginConCredencialesValidas()
    {
        global $usuarios_bbdd; // Accedemos a los usuarios de prueba
        // Actuar: llamamos a la función
        $resultado1 = handleLogin(
            'cvi0004@alu.medac.es',
            'Holicaracoli01;',
            $usuarios_bbdd
        );

        $resultado2 = handleLogin(
            'pmh5023@alu.medac.es',
            '1234;',
            $usuarios_bbdd
        );
        // Aserción: Afirmamos que el resultado debe ser verdadero
        $this->assertTrue($resultado1 . '&&' . $resultado2);
    }
    // Prueba para el "camino triste" (login incorrecto)
    public function testLoginConCredencialesInvalidas()
    {
        global $usuarios_bbdd;
        // Actuar: llamamos con una contraseña errónea
        $resultado = handleLogin(
            'maricarmen@taskflow.com',
            'tikitaka',
            $usuarios_bbdd
        );
        // Aserción: Afirmamos que el resultado debe ser falso
        $this->assertFalse($resultado);
    }
}
?>