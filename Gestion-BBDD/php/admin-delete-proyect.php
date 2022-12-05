<div class="actions">
<?php
    if(isset($_POST['delete-proyect-button'])){
        try {
            delete_proyect($_POST['delete-proyect']);
            echo "<p>Proyecto <b>borrado correctamente</b>!!</p><br>";
            header('Refresh: 2;');   
        }catch(mysqli_sql_exception){
            echo "<p>Ups, no puedes eliminar un proyecto <b>asociado a una tarea</b>!</p><br>";
            header('Refresh: 2;');
        }
        unset($_POST['delete-proyect-button']);
    }
    $all_proyects = get_proyects();
    $num_filas_p = get_num_rows($all_proyects);
    if($num_filas_p == 0){
        echo 
        " <h3>Eliminar Proyecto: </h3>
        <p>¡Vaya!, no hay ningún <b>proyecto registrado</b>!!</p><br>";
    }
    else{
        ?>
        <!-- Elección de proyecto a eliminar -->
            <h3>Proyecto a eliminar: </h3>
            <form method='post' action=''>
                <div>
                <label for="delete-proyect">Proyecto: </label>    
                <select name="delete-proyect" id="delete-proyect">
                <?php
                while($fila = get_results($all_proyects)){
                    extract($fila);
                    echo "<option value='$id_proyect'>$nombre_proyect</option>";
                }
                ?>
                </select>
                </div>
                <div>
                    <br>
                    <input type="submit" name="delete-proyect-button" value="Eliminar proyecto" />
                </div>
            </form>
        
        <?php
    }
?>
</div>