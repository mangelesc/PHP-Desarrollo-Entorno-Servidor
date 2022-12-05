<div class='actions'>
<?php
    if(isset($_POST['modify-user-button'])){
        //Hacemos comprobaciones para que no se puedan modificar a sí mismos, o cambiar a un 
        //nombre de usuario ya guardado en la BBDD
        $existing_user_em = get_user($_POST['modify-user-name']);
        $num_filas_emu = get_num_rows($existing_user_em);
        //Si no hay resultados, añadimos el usuario
        if ($num_filas_emu != 0){
            echo "<p>Ups, el nombre de usuario <b>no está disponible</b></p><br>";
            header('Refresh: 2;');
        }elseif (($_POST['chosen-modify-user'] != $_SESSION['id_user'])){
            modify_user($_POST['chosen-modify-user'],$_POST['modify-user-name'],
            $_POST['modify-user-pass'],$_POST['modify-user-type']);
            echo "<p>Usuario <b>modificado correctamente</b>!!</p><br>";
            header('Refresh: 2;');
        } else {
            //Mostramos un mensaje de error y refrescamos la página para que se actualicen los datos
            echo 
                "<div>
                    <p>Ups! No te puedes modificar <b>a tí mismo</b>!!</p><br>
                </div>";
            header('Refresh: 1;');
        }
        }unset($_POST['modify-user-button']);
    //Comprobamos los usuarios disponibles
    $all_users_m = get_users();
    $num_filas_ud = get_num_rows($all_users_m);
    if($num_filas_ud == 0){
    echo 
    "<h3>Modificar usuario: </h3>
    <p>¡Vaya!, no hay <b>ningún usuario</b> registrado</p> ";
    }
    else{
        ?>
        <!-- Elección de usuario a modificar -->
        <h3>Modificar usuario: </h3>
        <form method='post' action=''>
            <!-- Seleccionamos el usuario que queremos modificar -->
            <div>
            <label for="chosen-modify-user">Usuario: </label>  
            <select name="chosen-modify-user" id="chosen-modify-user">
            <?php
            while($fila_mu = get_results($all_users_m)){
                extract($fila_mu);
                    echo "<option value='$id_user'>$nombre_user</option>";
            }
            ?>
                </select>
            </div>
            <!-- Introducimos los valores a modificar -->
            <div>
                <h4>Introduce los nuevos valores:</h4>
            </div>
            <div>
                <label for="modify-user-name">Usuario: </label>
                <input type="text" required="required" maxlength="255" name="modify-user-name" id="modify-user-name" />
            </div>
            <div>
                <label for="modify-user-pass">Password: </label>
                <input type="password" required="required" maxlength="255" name="modify-user-pass" id="modify-user-pass" />
            </div>
            <div>
                <label for="modify-user-type">Tipo de usuario: </label>
                <select name="modify-user-type" id="modify-user-type">
                    <option value="0">Administrador</option>
                    <option value="1" selected>Usuario</option>
                </select>
            </div>
            <div>
                <br />
                <input type="submit" name="modify-user-button" value="Modificar usuario" />
            </div>
        </form>           
    <?php
    }
    ?>
</div>