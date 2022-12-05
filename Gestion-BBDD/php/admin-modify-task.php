<div class = "actions">
    <?php
    //Comprobamos si está clicado el botón
    if(isset($_POST['modify-task-button'])){
        try{
            modify_task($_POST['select-modify-task-user'],$_POST['modify-task-name'],$_POST['modify-task-user'], $_POST['modify-task-proyect'], $_POST['modify-task-status']);
            echo "<p>Tarea modificada</p><br>";
            header('Refresh: 2;');
        } catch(mysqli_sql_exception){
            echo "<p>Ups, error al modificar la tarea</p><br>";
            header('Refresh: 2;');
        }
        unset($_POST['modify-task-button']);
    } 
    //Comprobamos las tareas 
    $all_tasks_mt = get_tasks();
    $num_filas_mt = get_num_rows($all_tasks_mt);
    if($num_filas_mt == 0){
        echo "
        <p>¡Vaya!, no hay <b>ningúna tarea</b> registrada</p>";
    } else {
        ?>
        <h3>Tarea a modificar: </h3>
        <form method='post' action=''>
            <div>
            <label for="select-modify-task-user">Tarea: </label>    
            <select name="select-modify-task-user" id="select-modify-task-user">
            <?php
            while($fila_mt = get_results($all_tasks_mt)){
                extract($fila_mt);
                echo "<option value='$usuario'>$nombre ( $nombre_proyect | $nombre_user ) </option>";
            }
            ?>
            </select>
            <br>
            </div>
            <!-- Introducimos los nuevos valores -->
            <h3>Introduce los nuevos valores </h3>
            <div>
                <label for="modify-task-name">Tarea: </label>
                <input type="text" required="required" maxlength="255" name="modify-task-name" id="modify-task-name" />
            </div>
            <!-- Seleccionamos Usuario -->
            <div>
                <label for="modify-task-user">Usuario: </label>
                <select name="modify-task-user" id="modify-task-user">
                <?php
                    $all_userst_atu = get_users();
                    while($fila_atu = get_results($all_userst_atu)){
                        extract($fila_atu);
                            echo "<option value='$id_user'>$nombre_user</option>";
                    }
                ?>
                </select>
            </div>
            <!-- Seleccionamos Proyecto -->
            <div>
                <label for="modify-task-proyect">Proyecto: </label>
                <select name="modify-task-proyect" id="modify-task-proyect">';
                <?php
                    $all_users_mtu = get_proyects();
                    while($fila_mtu = get_results($all_users_mtu)){
                        extract($fila_mtu);
                            echo "<option value='$id_proyect'>$nombre_proyect</option>";
                    }
                ?>
                </select>
            </div>
            <div>
                <label for="modify-task-status">Estado: </label>
                <select name="modify-task-status" id="modify-task-status">
                    <option value="1"selected>Pendiente</option>
                    <option value="2" >En progreso</option>
                    <option value="3" >Finalizada</option>
                </select>
            </div>
            <div>
                <br />
                <input type="submit" name="modify-task-button" value="Modificar tarea" />
            </div>
        </form>
    <?php
    } 
    ?>
</div>