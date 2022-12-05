<div class="actions">
    <h3>Visualización de tareas </h3>
    <form method='post' action=''>
        <label for="proyect">Proyecto: </label>    
        <select name="proyect" id="proyect">
        <?php
        while($fila = get_results($all_proyects)){
            extract($fila);
            echo "<option value='$id_proyect'>$nombre_proyect</option>";
        }
        ?>
            </select>
        <div>
            <br>
            <input type="submit" name="check-tasks-button" value="Mostrar Tareas" />
        </div>
</div>