<div class="actions">
    <?php
    //Comrpobamos si se ha clicado en botón
    if(isset($_POST['modify-proyect-button'])){
        modify_proyect($_POST['chosen-modify-proyect'],$_POST['modify-proyect-name']);
        echo "<p>Proyecto <b>modificado correctamente</b>!!</p><br>";
        header('Refresh: 2;');
        unset($_POST['modify-proyect-button']);
    }
    //Obtenemos los proyectos de la BBDD
    $all_proyects_m = get_proyects();
    $num_filas_mp = get_num_rows($all_proyects_m);
    if($num_filas_mp == 0){
        //Si no hay proyecto, mostramos un mensaje
        echo 
        "<h3>Modificar proyecto: </h3>
        <p>¡Vaya!, no hay <b>ningún proyecto</b> registrado</p>";
    }
    else{
    ?>
    <!-- Formulario para modificar proyectos -->
        <h3>Modificar proyecto: </h3>
        <form method='post' action=''>
            <!-- Seleccionamos el usuario que queremos modificar -->
            <div>
            <label for="chosen-modify-proyect">Proyecto: </label>  
            <select name="chosen-modify-proyect" id="chosen-modify-proyect">
            <?php
            while($fila_mp= get_results($all_proyects_m)){
                extract($fila_mp);
                    echo "<option value='$id_proyect'>$nombre_proyect</option>";
            }
            ?>
                </select>
            </div>
            <!-- Introducimos los valores a modificar -->
            <div>
                <h4>Introduce los nuevos valores:</h4>
            </div>
            <div>
                <label for="modify-proyect-name">Proyecto: </label>
                <input type="text" required="required" maxlength="255" name="modify-proyect-name" id="modify-proyect-name" />
            </div>
            <div>
                <br />
                <input type="submit" name="modify-proyect-button" value="Modificar proyeto" />
            </div>
        </form> 
    <?php
    }
    ?>
</div>