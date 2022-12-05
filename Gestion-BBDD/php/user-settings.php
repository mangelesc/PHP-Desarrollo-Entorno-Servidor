<?php
    session_start();
    //Comprobamos si se ha iniciado sesión, y si lo está redireccionamos
    require("../database/database.php");
    require("../database/queries.php");
    connect();
    /**
     * Al setear el botón de "validate-button"
     * de la página de inicio, comprobamos si existen 
     * el usuario y la contraseña y, si existe, qué permisos tiene. 
     * Dependiendo de los permisos, redirigimos a una página u a otra. 
     */
    if (isset($_POST['validate-button'])){
        //Comprobamos que los campos no están vacios
        if(empty($_POST['user']) || empty($_POST['pass']) ){
            echo "<div class='errorMessage'>Ups, introduce <b>todos los valores</b></div>";
            header("Refresh: 2");
        } else {
            $check_user = validate_user($_POST['user'], $_POST['pass']);
            $num_rows = get_num_rows($check_user);
            if ($num_rows == 0){
                echo "<div class = 'errorMessage'>Ups, <b>datos erróneos</b></div>";
                header("Refresh: 2; url=".$_SERVER['HTTP_REFERER']);
            } else{
                $user = get_results($check_user);
                //Separamos el array asociativo obtenido, guardando sus valores variables
                extract($user);
                //Sistema para que no se pueda acceder a las pantallas sin tener permisos de usuario/admin
                /**
                 * Si es admin (0)
                 * Guardamos el valor de_usuerio en $_SESSION
                 * Para hacer futuras validaciones
                 * y redireccionamos a la página admin.php
                 */
                if ($tipo_usuario == 0) { 
                    $_SESSION['tipo_usuario'] = 0;
                    $_SESSION['id_user'] = $id_user;
                    header("Location: ./admin.php");
                /**
                 * Si es usuario (1)
                 * Guardamos el valor de_usuerio en $_SESSION
                 * Para hacer futuras validaciones
                 * y redireccionamos a la página user.php
                 */
                } elseif ($tipo_usuario == 1){ //Si es usuario
                    $_SESSION['tipo_usuario'] = 1;
                    $_SESSION['id_user'] = $id_user;
                    header("Location: ./user.php");

                /**
                 * Para evitar posibles errores, si no coincide con ninguno de los dos valores
                 * anteriores, redireccionamos a home y mostramos un mensaje de error. 
                 */
                }else {//Si no tiene ninguno de los dos permisos, denegamos acceso
                    echo "<div class = 'errorMessage'>Ups, <b>permisos denegados</b></div>";
                    header("Refresh: 2; url=".$_SERVER['HTTP_REFERER']);
                }
            }
            unset($_POST['validate-button']);    
        } 
    }

    /**
     * Si el usuario clica en "Cerrar Sesión", 
     * se seteará el botón closeSesionButton, 
     * y cerraremos la sesión, eliminando todas las variables de sesión
     */

    // if (isset($_POST['closeSesionButton'])){
    //     unset($_SESSION['id_user']);
    //     unset($_SESSION['tipo_usuario']);
    //     //Cerramos la conexión con la BBDD y la sesión
    //     close_conexion();
    //     session_destroy();
    //     header("Location: ../index.php");
    // }

    close_conexion()
?>