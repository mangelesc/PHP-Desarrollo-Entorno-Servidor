<!-- Tabla que muestra las tareas de un proyecto a un admin -->
<div class="actions">
    <h5>Tareas del proyecto seleccionado </h5>
    <table border="1">
        <tr>
            <td>PROYECTO</td>
            <td>TAREA</td>
            <td>ESTADO</td>

            <!-- PHP para recorrer las tareas encontradas -->
            <?php 
            while($fila = get_results($tasks_proyect)){
                extract($fila);
                echo 
                    "<tr>
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
</div>