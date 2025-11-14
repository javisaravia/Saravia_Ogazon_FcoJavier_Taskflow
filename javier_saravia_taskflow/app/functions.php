<?php

function obtenerClasePrioridad(string $prioridad): string
{
    switch ($prioridad) {
        case 'alta':
            return 'prioridad-alta';
        case 'media':
            return 'prioridad-media';
        case 'baja':
            return 'prioridad-baja';
        default:
            return '';
    }
}

function renderizarTarea(array $tarea): string
{
    // defensivamente usamos valores por defecto para evitar warnings si faltan índices
    $prioridad = $tarea['prioridad'] ?? '';
    $completado = $tarea['completado'] ?? false;
    $titulo = $tarea['titulo'] ?? '';

    $clasePrioridad = obtenerClasePrioridad($prioridad);
    $claseCompletada = $completado ? 'completada' : '';
    $clasesCSS = trim($clasePrioridad . ' ' . $claseCompletada);

    // sanitizamos el título para evitar inyección de HTML
    $tituloSeguro = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');

    return "<li class='{$clasesCSS}'>{$tituloSeguro}</li>";
}
?>