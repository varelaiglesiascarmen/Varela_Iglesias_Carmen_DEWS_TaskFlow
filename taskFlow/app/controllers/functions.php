<?php
function renderizarTarea($tareas){
    if ($tareas['completado']) {
        return "<li class=\"completado\">{$tareas['titulo']}</li>\n";
    } 

    // \"priority-{$task['priority']}\" busca el tipo de prioridad de X tarea
    return "<li class=\"prioridad-{$tareas['prioridad']}\">{$tareas['titulo']}</li>\n";
}
?>