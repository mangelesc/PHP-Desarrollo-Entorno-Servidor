<div class="actions">
<?php
    //Comprobamos si se clica el botón
    if(isset($_POST['delete-user-button'])){
        //Comprobación para que el usuario no se borre a sí mismo
        if ($_POST['delete-user'] != $_SESSION['id_user']){
            try{
            delete_user($_POST['delete-user']);
            unset($_POST['delete-user-button']);
            //Mostramos un mensaje de éxito y refrescamos la página para que se actualicen los datos
            echo "<p>Usuario <b>borrado correctamente</b>!!</p><br>";
            header('Refresh: 2;');
            } catch(mysqli_sql_exception){
                echo "<p>Ups, no puedes eliminar un usuario <b>asociado a una tarea</b></p>!<br>";
                header('Refresh: 2;');
            }
        } else {
            //Mostramos un mensaje de error y refrescamos la página para que se actualicen los datos
            echo  "<p>Ups! No te puedes borrar <b>a tí mismo</b>!!</p><br>";
            header('Refresh: 2;');
        }
    unset($_POST['delete-user-button']);
    }

    //Obtenemos los usuarios creados
    $all_users = get_users();
    $num_filas_u = get_num_rows($all_users);
    if($num_filas_u == 0){
        echo 
        "<h3>Usuario a eliminar: </h3>
        <p>¡Vaya!, no hay <b>ningún usuario</b> registrado</p>";
    }

    else{
        ?>
        <!-- Elección de usuario a eliminar -->
        <h3>Usuario a eliminar: </h3>
        <form method='post' action=''>
            <label for="delete-user">Usuario: </label>    
            <select name="delete-user" id="delete-user">
            <?php
            while($fila = get_results($all_users)){
                extract($fila);
                echo "<option value='$id_user'>$nombre_user</option>";
            }
            ?>
                </select>
            <div>
                <br>
                <input type="submit" name="delete-user-button" value="Eliminar usuario" />
            </div>
        </form>  
        <?php
    }
?>
</div>