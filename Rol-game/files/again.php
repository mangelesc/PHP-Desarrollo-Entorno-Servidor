<?php

    /**Si está seteado el botón "again" redireccionamos a index.
     * Como no se ha iniciado sesión y los puntos se consigen usando 
     * la función rand(), se obtendrán nuevos resultados. 
     */
    if (isset($_POST['again'])){
        header("Location: ../index.php");
    }
?>