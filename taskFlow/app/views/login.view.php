<?php include 'header.php'; 
include '../data.php';?>

<form action="tareas.view.php?accion=login" method="post">
    <h2>Iniciar Sesión</h2>
    <input type="email" name="email" placeholder="Correo electrónico" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
    <?php if (isset($error)) {
        echo "<p style='color: red;'>";
    } ?>
</form>

<?php include 'footer.php'; ?>