<?php
//Obtenemos los proyectos de la BBDD
$get_all_proyects = get_proyects();
$num_filas_allp = get_num_rows($get_all_proyects);
?>
<div = class="info">
<?php
if($num_filas_allp == 0){
    echo 
    "<h4>Proyectos</h4>
    <p>¡Vaya! No hay <b>ninguna tarea</b> asignada actualmente a este proyecto</p>";
}
else{
    ?>
    <h4>Proyectos </h4>
    <table border="1" class="table">
        <tr>
            <td>Id Proyecto</td>
            <td>Nombre</td>
            <?php 
            while($fila_allp = get_results($get_all_proyects)){
                extract($fila_allp);
                echo 
                    "<tr>
                        <td>$id_proyect</td>
                        <td>$nombre_proyect</td>
                    </tr>";
                } 
            ?>
        </tr>
    </table>
    
<?php
} 
?>
<form method="post" action="" >
    <input type="submit" name="proyect-admin" value="GESTIÓN DE PROYECTOS" />
</form>
</div>