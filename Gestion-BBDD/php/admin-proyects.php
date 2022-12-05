<?php
session_start();

require("./back-to-admin.php");
require("../database/database.php");
require("../database/queries.php");

connect();

//2. Usuarios administradores
if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 0){
    
    //Cargamos el html con las opciones de añadir usuario y proyecto
    require("../page-sections/header.html");
    echo "<main>";

    //Gestión de Proyectos
    echo "<div class='container'>";
    require("./admin-add-proyect.php");
    require("./admin-modify-proyect.php");
    require("./admin-delete-proyect.php");
    echo "</div>";
    
    //Volver a la página admin
    require("../page-sections/back-button.html");
    echo "</main>";
} else 
    header("Location: ../index.php");

close_conexion();
?>