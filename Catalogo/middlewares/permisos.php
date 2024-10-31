<?php

function fucionPermisos($respuesta) {
    if (!isset($respuesta->usuario) || $respuesta->usuario->rol !== 'Administrador') {
        
        echo "<h1>Error: Acceso denegado</h1>";
        echo '<li><a href="' . BASE_URL . 'listar" style="font-size: 30px; font-weight: bold;">Click aquí para volver a la página de inicio</a></li>';
        exit;
    }
}

?>