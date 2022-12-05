<div class="actions">
    <?php
    //Comprobamos si se clica el botón
    if(isset($_POST['add-user-button'])){
        if(empty($_POST['add-user-name']) || empty(['add-user-pass'])){
            echo "<p>Ups, ningún campo puede estar <b>vacío </b></p><br>";
            header('Refresh: 2;');
        } else {
            
            //Para evitar que se repitan los nombres de usuario, hacemos una comprobación
            $existing_user = get_user($_POST['add-user-name']);
            $num_filas_au = get_num_rows($existing_user);
            //Si no hay resultados, añadimos el usuario
            if ($num_filas_au == 0){
                add_user($_POST['add-user-name'], $_POST['add-user-pass'], $_POST['add-user-type']);
                echo "<p>Usuario añadido </p><br>";
                header('Refresh: 2;');
            } else {
                echo "<p>Ups, el nombre de usuario <b>no está disponible</b></p><br>";
                header('Refresh: 2;');
            }
        }
    unset($_POST['add-user-button']);
    }
?> 
<!-- Formulario para añadir un nuevo usuario -->
    <h3>Añadir usuarios</h3>
    <form method="post" action="">
        <div>
            <label for="add-user-name">Usuario: </label>
            <input type="text" required="required" maxlength="255" name="add-user-name" id="add-user-name" />
        </div>
        <div>
            <label for="add-user-pass">Password: </label>
            <input type="password" required="required" maxlength="255" name="add-user-pass" id="add-user-pass" />
        </div>
        <div>
            <label for="add-user-type">Usuario: </label>
            <select name="add-user-type" id="add-user-type">
                <option value="0">Administrador</option>
                <option value="1" selected>Usuario</option>
            </select>
        </div>
        <div>
            <br />
            <input type="submit" name="add-user-button" value="Añadir usuario" />
        </div>
    </form>
</div>