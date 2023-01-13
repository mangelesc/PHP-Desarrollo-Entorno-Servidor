<div class="actions">   
<!-- Formulario para añadir una nueva categoría -->
    <h3>Añadir categoría</h3>
    <form method="post" action="">
        <div>
            <label for="add-category-name">Categoria: </label>
            <input type="text" required="required" maxlength="50" name="add-category-name" id="add-category-name" />
        </div>
        <div>
            <br />
            <input type="submit" name="add-category-button" value="Añadir categoría" />
        </div>
    </form>
    <?php
        //Comprobamos si se clica el botón
        if(isset($_POST['add-category-button'])){
            if(empty($_POST['add-category-name'])){
                // Comprobación para que los campos no estén vacíos
                echo "<p>Ups, ningún campo puede estar <b>vacío </b></p><br>";
                header('Refresh: 2;');
            } else {
                // Mostramos mensaje si se ha completado la consulta
                $client->querie_add_category($_POST['add-category-name']);
                echo "<p>Categoría añadida </p><br>";
                header('Refresh: 2;');
            }
            // Unseteamos el botón
        unset($_POST['add-category-button']);
        }
    ?> 
</div>