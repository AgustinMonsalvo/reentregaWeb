<?php
    function fucionAutenticacion($respuesta) {
        session_start();
        if(isset($_SESSION['email'])){
            $respuesta->usuario = new stdClass();
            $respuesta->usuario->email = $_SESSION['email'];
            $respuesta->usuario->contraseña = $_SESSION['contraseña'];
            $respuesta->usuario->rol = $_SESSION['rol'];
            return;
        }
    }
?>