<?php include 'header.php'; ?>

    <?php
        // llamar a la function renderizarTarea
        foreach ($tasks as $task) {
            echo renderizarTarea($task);
        }
    ?>

<?php include 'footer.php'; ?>