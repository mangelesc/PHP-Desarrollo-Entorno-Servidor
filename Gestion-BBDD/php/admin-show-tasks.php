<?php
//Obtenemos las tareas de la BBDD
$get_all_tasks = get_tasks();
$num_filas_allt = get_num_rows($get_all_tasks);
?>
<div = class="info">
    <h4>Tareas </h4>
<?php
if($num_filas_allt == 0){
    echo 
    "<p>¡Vaya! No hay <b>ninguna tarea</b> asignada actualmente a este proyecto</p>";
}
else{
    ?>
    <!-- Tabla que muestra las tareas de un proyecto a un admin -->
    <table border="1" class="table">
        <tr>
            <td>Proyecto</td>
            <td>Usuario</td>
            <td>Tarea</td>
            <td>Estado</td>
            <!-- PHP para recorrer las tareas encontradas -->
            <?php 
            while($fila_allt = get_results($get_all_tasks)){
                extract($fila_allt);
                echo 
                    "<tr>
                        <td>$nombre_user</td>
                        <td>$nombre_proyect</td>
                        <td>$nombre</td>
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
<?php 
} 
?>
<form method="post" action="" >
    <input type="submit" name="tasks-admin" value="GESTIÓN DE TAREAS" />
</form>
</div>