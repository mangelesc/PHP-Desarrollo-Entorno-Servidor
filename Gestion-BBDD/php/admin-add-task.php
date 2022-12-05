<div class="actions">
    <?php
    //Comprobamos si se clica el botón
    if(isset($_POST['add-task-button'])){
        if(empty($_POST['add-task-name'] || !isset($_POST['add-task-user'])|| !isset($_POST['add-task-proyect']))){
            echo "<p>Ups, ningún campo puede estar <b>vacío</b></p><br>";
            header('Refresh: 2;');
        } else {
            try{
            add_task($_POST['add-task-name'],$_POST['add-task-user'], $_POST['add-task-proyect'], $_POST['add-task-status']);
            echo "<p>Tarea añadida</p><br>";
            header('Refresh: 2;');
            } catch(mysqli_sql_exception){
                echo "<p>Ups, el usuario elegido <b>ya tiene una tarea</b> asignada en ese proyecto</p><br>";
                header('Refresh: 2;');
            }
        }
    unset($_POST['add-task-button']);
    }
    ?> 
    <!-- Formulario para añadir una tarea nueva -->
    <h3>Añadir tarea</h3>
    <form method="post" action="">
        <div>
            <label for="add-task-name">Tarea: </label>
            <input type="text" required="required" maxlength="255" name="add-task-name" id="add-task-name" />
        </div>
        <!-- Seleccionamos Usuario -->
        <div>
            <label for="add-task-user">Usuario: </label>
            <select name="add-task-user" required="required" id="add-task-user">
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
            <label for="add-task-proyect">Proyecto: </label>
            <select required="required" name="add-task-proyect" id="add-task-proyect">
            <?php
                $all_userst_atp = get_proyects();
                while($fila_atp = get_results($all_userst_atp)){
                    extract($fila_atp);
                        echo "<option value='$id_proyect'>$nombre_proyect</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <label for="add-task-status">Estado: </label>
            <select name="add-task-status" id="add-task-status">
                <option value="1"selected>Pendiente</option>
                <option value="2" >En progreso</option>
                <option value="3" >Finalizada</option>
            </select>
        </div>
        <div>
            <br />
            <input type="submit" name="add-task-button" value="Añadir tarea" />
        </div>
    </form>
</div>