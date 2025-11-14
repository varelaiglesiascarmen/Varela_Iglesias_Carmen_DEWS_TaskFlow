<?php include 'header.php';
/*
No debo incluir aquí data.php porque ya está incluida en index.php, entonces en este .php 
lo que genera es una petición GET a index.php preguntando "existe este user?", si index.php 
responde que sí le deja pasar y si no, lo redirige a login.view.php
*/
?>

<form action="../../public/index.php?accion=login" method="POST">
    <h2>Iniciar Sesión</h2>
    <input type="email" name="email" placeholder="Correo electrónico" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
    <?php if (isset($error)): 
    /*
    En caso de no existir el user, index.php devuelve $error con el mensaje 
    "Credenciales incorrectas."
    */
        ?>
        <!-- Imprime en color rojo el mensaje de error, htmlspecialchars($error, ...): Esta función 
         es un guardia de seguridad. Su trabajo es tomar el texto de la variable $error y 
         convertir cualquier carácter especial de HTML en texto simple e inofensivo. 
         
         Esto lo que hace es prevenir ataques de inyección de código malicioso (XSS), 
         asegurando que si alguien intenta insertar código HTML o JavaScript en el mensaje no se ejecute
         -->
        <p class="error" style="color: red;"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; 
    // en caso de existir el user, continua y $error no está definido.
    ?>
</form>

<?php include 'footer.php'; ?>