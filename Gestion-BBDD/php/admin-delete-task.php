<div class="actions">
<?php 
    //Comrpobamos si estác cliacdo en botón
    if(isset($_POST['delete-task-button'])){
        try{
            delete_task($_POST['del-task-user']);
            echo "<p>Tarea <b>borrada correctamente</b>!!</p><br>";
            header('Refresh: 2;');
        }catch(mysqli_sql_exception){
            echo "<p>Ups, error al <b>eliminar la tarea</b>!</p><br>";
        }
    unset($_POST['delete-task-button']);
    }

    $all_tasks_d = get_all_tasks();
    $all_tasks_dinfo = get_tasks();
    $num_filas_d = get_num_rows($all_tasks_d);
    if($num_filas_d == 0){
        echo 
        "<h3>Tarea a eliminar: </h3>
        <p>¡Vaya!, no hay ningún proyecto registrado, por lo que no hay <b>ninguna tarea</b></p>";
    }
    else{
        ?>
        <!-- Elección de tarea a eliminar -->
        <h3>Tarea a eliminar: </h3>
        <form method='post' action=''>
            <div>
            <label for="del-task-user">Tarea: </label>    
            <select name="del-task-user" id="del-task-user">
            <?php
            while($fila_d = get_results($all_tasks_dinfo)){
                extract($fila_d);
                echo "<option value='$usuario'>$nombre ( $nombre_proyect | $nombre_user ) </option>";
            }
            ?>
            </select>
            <br>
            </div>
                <div>
                    <br>
                    <input type="submit" name="delete-task-button" value="Eliminar tarea" />
                </div>
            </form>  
            <?php
    }
?>
</div>