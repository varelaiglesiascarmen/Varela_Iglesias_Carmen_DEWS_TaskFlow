<?php include 'header.php';?>

    <?php
        // llamar a la function renderizarTarea
        foreach ($tareas as $tarea) {
            echo renderizarTarea($tarea);
        }
    ?>

<?php include 'footer.php'; ?>