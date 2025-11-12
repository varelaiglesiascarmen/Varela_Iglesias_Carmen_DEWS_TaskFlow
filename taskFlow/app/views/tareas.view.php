<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>
    <header>
        <h1>Mi Lista de Tareas</h1>
    </header>
    <main>

    <?php
        // llamar a la function renderizarTarea
        foreach ($tasks as $task) {
            echo renderizarTarea($task);
        }
    ?>

    </main>
    <footer>
        <p>© <?php echo date('Y'); ?> TaskFlow</p>
    </footer>
</body>

</html>