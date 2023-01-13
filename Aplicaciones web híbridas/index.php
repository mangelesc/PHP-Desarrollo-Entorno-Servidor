<?php
    //Iniciamos sesión
    session_start();

    require_once("./database/database.php");
    // Conectamos con la BBDD
    connect();

    // Cargamos las diferentes secciones
    require_once("./page-sections/header.html");
    require_once("./page-sections/choose-place.php");
    require_once("./page-sections/choose-type.php");

    close_conexion();
?>
