<!-- Formulario para añadir una producto nuevo -->
<div class="actions">
    <h3>Añadir producto</h3>
    <form method="post" action="">
        <div>
            <label for="add-product-name">Producto: </label>
            <input type="text" required="required" maxlength="50" name="add-product-name" id="add-product-name" />
        </div>
        <!-- Seleccionamos Usuario -->
        <div>
            <label for="add-product-category">Categoría: </label>
            <select name="add-product-category" required="required" id="add-product-category">
                <!-- Mostramos las categorías disponibles en la BBDD -->
                <?php
                $all_categories = $client->show_all_categories();
                foreach($all_categories as $category){
                    echo "<option value='$category->id_categoria'>$category->nombre</option>";
                }
                ?>
            </select>
        </div>
        <div>
            <br />
            <input type="submit" name="add-product-button" value="Añadir producto" />
        </div>
    </form>
    <?php
        //Comprobamos si se clica el botón
        if(isset($_POST['add-product-button'])){
            if(empty($_POST['add-product-name'] || !isset($_POST['add-product-category']))){
                // Comprobamos que todos los datos se han introducido
                echo "<p>Ups, ningún campo puede estar <b>vacío</b></p><br>";
                header('Refresh: 2;');
            } else {
                // Complemaos la petición y mostramos un  mensaje al usuario
                $client->querie_add_product($_POST['add-product-name'],$_POST['add-product-category']);
                echo "<p>Producto añadido</p><br>";
                header('Refresh: 2;');
            }
        // Unseteamos el botón
        unset($_POST['add-product-button']);
        }
    ?> 
</div>
    