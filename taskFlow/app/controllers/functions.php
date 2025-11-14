<?php
function renderizarTarea($task){
    // \"priority-{$task['priority']}\" busca el tipo de prioridad de X tarea
    return "<li class=\"priority-{$task['priority']}\">{$task['title']}</li>\n";
}
?>