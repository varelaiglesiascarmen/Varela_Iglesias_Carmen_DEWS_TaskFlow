<?php
session_start();
// $usuarios_bbdd
function handleLogin($email, $password, $usuarios_bbdd) {

    if (isset($usuarios_bbdd[$email]) && $usuarios_bbdd[$email]['password'] === $password) {
        $_SESSION['user_id'] = $usuarios_bbdd[$email]['id'];
        $_SESSION['user_name'] = $usuarios_bbdd[$email]['nombre'];
        return true;
    }
    return false;
}

function handleLogout(){
    session_destroy();
    header ('Location: login.php');
    exit();
}

function checkAuth(){
    return isset($_SESSION['user_id']);
}
?>