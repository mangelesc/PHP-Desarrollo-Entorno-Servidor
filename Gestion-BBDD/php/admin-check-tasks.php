<?php
if(isset($_POST['check-tasks-button'])){
    $tasks_proyect_ct = get_tasks_by_proyect($_POST['proyect_ct']);
    $num_filas_ct = get_num_rows($tasks_proyect_ct);

    if($num_filas_ct == 0){
    echo 
    "<div class='actions'>
        <p>¡Vaya! No hay <b>ninguna tarea</b> asignada actualmente a este proyecto</p>;
    </div>";
    }
    else{
        ?>
        <!-- Tabla que muestra las tareas de un proyecto a un admin -->
        <div class='table-div'>
            <h4>Tareas del proyecto seleccionado </h4>
            <table border="1">
                <tr>
                    <td>PROYECTO</td>
                    <td>TAREA</td>
                    <td>USUARIO</td>
                    <td>ESTADO</td>

                    <!-- PHP para recorrer las tareas encontradas -->
                    <?php 
                    while($fila_ct = get_results($tasks_proyect_ct)){
                        extract($fila_ct);
                        echo 
                            "<tr>
                                <td>$nombre_proyect</td>
                                <td>$nombre</td>
                                <td>$nombre_user</td>
                                <td> ";
                                switch ($estado){ 
                                    case 1: 
                                        echo "Pendiente"; 
                                        break; 
                                    case 2: 
                                        echo "En progreso"; 
                                        break; 
                                    case 3: 
                                        echo "Finalizada"; 
                                        break; 
                                    default: 
                                        echo "Sin datos"; 
                                        break;
                                } 
                                echo "
                                </td>
                            </tr>";
                        } 
                    ?>
                </tr>
            </table>
        </div>
        <?php
    }   
}
$all_proyects_ctp = get_proyects();
$num_filas_ctp = get_num_rows($all_proyects_ctp);
echo "<div class='container'>";
if($num_filas_ctp == 0){
    echo 
    "<div class='actions'>
    <h3>Ver tareas por proyecto </h3>
    <p>¡Vaya!, no hay ningún <b>proyecto registrado</b>!!</p>
    </div>
    ";
} else{
    ?>
        <div class='actions'>
            <h3>Ver tareas por proyecto </h3>
            <form method='post' action=''>
                <label for="proyect_ct">Proyecto: </label>    
                <select name="proyect_ct" id="proyect_ct">
                <?php
                while($fila_ctp = get_results($all_proyects_ctp)){
                    extract($fila_ctp);
                    echo "<option value='$id_proyect'>$nombre_proyect</option>";
                }
                ?>
                </select>
                <div>
                    <br>
                    <input type="submit" name="check-tasks-button" value="Mostrar Tareas" />
                </div>
            </form>
        </div>
    <?php
}
?>