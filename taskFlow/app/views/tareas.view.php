<?php include 'header.php'; ?>

<?php
    print ("<ul>");
    
    // llamar a la function renderizarTarea
    foreach ($tareas as $tarea) {
        echo renderizarTarea($tarea);
    }

    print ("</ul>");
?>

<?php include 'footer.php'; ?>