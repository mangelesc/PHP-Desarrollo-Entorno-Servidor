
<div = class="info">
    <h4>Usuarios: </h4>

<?php
//Obtenemos los usuarios de la BBDD
$get_all_users = get_users();
$num_filas_allu = get_num_rows($get_all_users);
if($num_filas_allu == 0){
    echo 
    "<p>¡Vaya! No hay <b>ninguna tarea</b> asignada actualmente a este proyecto</p>";
}
else{
    ?>
    <!-- Tabla que muestra las tareas de un proyecto a un admin -->
    <table border="1" class="table">
        <tr>
            <td>Id Usuario</td>
            <td>Nombre</td>
            <td>Tipo de usuario</td>
            <!-- PHP para recorrer las tareas encontradas -->
            <?php 
            while($fila_allu = get_results($get_all_users)){
                extract($fila_allu);
                echo 
                    "<tr>
                        <td>$id_user</td>
                        <td>$nombre_user</td>
                        <td> ";
                        switch ($tipo_usuario){ 
                            case 0: 
                                echo "Administrador"; 
                                break; 
                            case 1: 
                                echo "Usuario"; 
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
    <input type="submit" name="user-admin" value="GESTIÓN DE USUARIOS" />
</form>
</div>