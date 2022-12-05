<?php
session_start();

require("../database/database.php");
require("../database/queries.php");

connect();

//Usuarios administradores
if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0){
    //Comprobamos si está clicado el botón
    if(isset($_POST['close-Sesion-Button'])){
    session_destroy();
    header("Location: ../index.php");
    unset($_POST['close-Sesion-Button']);
    }
    
    if (isset($_POST['proyect-admin'])){
    header("Location: ./admin-proyects.php");
    unset($_POST['tasks-admin']);
    }

    if(isset($_POST['user-admin'])){
    header("Location: ./admin-users.php");
    unset($_POST['tasks-admin']);
    }

    if(isset($_POST['tasks-admin'])){
    header("Location: ./admin-tasks.php");
    unset($_POST['tasks-admin']);
    }
    

    //Cargamos el html con las opciones de añadir usuario y proyecto
    require("../page-sections/header.html");
    
    echo "<div class='container-main'>";
    require("./admin-show-users.php");
    require("./admin-show-proyects.php");
    require("./admin-show-tasks.php");
    echo "</div>";

    //Cerrar sesión de usuario
    require("../page-sections/close-session.html");
    

} elseif (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 1){
    header("Location: ./user.php");
} else{
    header("Location: ../index.php");
}

close_conexion();
?>