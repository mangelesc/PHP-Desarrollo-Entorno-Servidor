<?php
    //Iniciamos sesión
    session_start();

    require("./database/database.php");
    //Creamos si no está creada la BBDD
    createDB();
    //Establecemos la conexión
    connect();

    require("./database/queries.php");
    require("./php/add-trial-users.php");

    //1. Página principal con validación de usuarios
    require_once("./page-sections/header.html");
    require_once("./page-sections/home.html");

    close_conexion();
?>


