<div class="container">
    <div class="actions">
        <h3>Tareas del usuario </h3>
        <table border="1">
            <tr>
                <!-- Tabla que muestra los proyectos del usuario -->
                <td>TAREA</td>
                <td>PROYECTO</td>
                <td>ESTADO</td>

                <?php 
                while($fila = get_results($tasks)){
                    extract($fila);
                    echo 
                        "<tr>
                            <td>$nombre</td>
                            <td>$nombre_proyect</td>
                            <td>
                                "; switch ($estado){ case 1: echo "Pendiente"; break; case 2: echo "En progreso"; break; case 3: echo "Finalizada"; break; default: echo
                                "Sin datos"; break; } echo "
                            </td>
                        </tr>";
                    } 
                ?>
            </tr>
        </table>
    </div>
</div>
