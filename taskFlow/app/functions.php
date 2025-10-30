<?php
function obtenerClasePrioridad($tasks, $priority){

    foreach ($tasks as $task) {
        // añade los datos a una nueva variable $taskClasses
        $taskClasses = 'task-item';

        // si la tarea está completada lo guarda como completada
        if ($task['completed']) {
            $taskClasses .= ' completed';
        }

        // guarda las tareas segun la prioridad
        switch ($task['priority']) {
            case 'alta':
                $taskClasses .= ' priority-alta';
                break;
            case 'media':
                $taskClasses .= ' priority-media';
                break;
            case 'baja':
                $taskClasses .= ' priority-baja';
                break;
        }
    }

    return $taskClasses;
}

function renderizarTarea($taskClasses, $task){
    //llamar a la function anterior
    $taskClasses = obtenerClasePrioridad($task);

    // devuelve las tareas en una lista con su css correspondiente
    return "<li class='$taskClasses'>{$task['title']}</li>";
}

?>