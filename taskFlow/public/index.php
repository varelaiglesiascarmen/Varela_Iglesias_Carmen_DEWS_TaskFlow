<?php
// Cargar todas las herramientas necesarias
require_once '../app/controllers/functions.php';
require_once '../app/models/data.php';
require_once '../app/controllers/AuthControlle.php';

$accion = $_GET['accion'] ?? 'login';

switch ($accion) {
    case 'login':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (handleLogin($email, $password, $usuarios_bbdd)) {
                print("Login successful");
                header('Location: index.php?accion=dashboard');
                exit();
            } else {
                $error = "Credenciales incorrectas.";
            }
        } 
        
        //else {
            include '../app/views/login.view.php';
        //}
        break;

    case 'dashboard':
        if (!checkAuth()) {
            header('Location: index.php?accion=login');
            exit();
        }

        $tareas = [
            [
                'titulo' => 'Implementar Login',
                'completado' => true,
                'prioridad' => 'alta'
            ],
            [
                'titulo' => 'Añadir Pruebas Unitarias',
                'completado' => false,
                'prioridad' => 'media'
            ]
        ];

        include '../app/views/tareas.view.php';
        break;

    case 'logout':
        handleLogout();
        break;

    default:
        echo "Error 404: Página no encontrada.";
        break;

}

?>