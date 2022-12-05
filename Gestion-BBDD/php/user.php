<?php 
session_start();

// require("../php/user-settings.php");
require("../database/database.php");
require("../database/queries.php");

connect();

//3. Usuarios no administradores
if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 1){
    
    if(isset($_POST['close-Sesion-Button'])){
    session_destroy();
    header("Location: ../index.php");
    unset($_POST['close-Sesion-Button']);
    }

    require("../page-sections/header.html");

    //Mostrar todas las tareas que tienen asignadas
    $tasks = get_tasks_by_user($_SESSION['id_user']);
    $num_filas = get_num_rows($tasks);
    if($num_filas == 0){
        echo 
        "<div class='container'>
            <div class='actions'>
                <p>¡Vaya!</p>
                <p>No tienes ninguna tarea actualmente</p>
            </div>
        </div>";
    }
    else{
        require("../page-sections/user-page.php");
    }

    //Cerrar sesión de usuario
    require("../page-sections/close-session.html");

} elseif (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0){
    header("Location: ./admin.php");
} else{
    header("Location: ../index.php");
}
close_conexion();

?>