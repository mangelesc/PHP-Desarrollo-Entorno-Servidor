<div class="actions">
<?php
    // Comrpobamos si la consulta devuelve algún dato
    if(count($all_categories) == null){
        echo "
        <h3>Ver productos por categoría </h3>
        <p>¡Vaya!, no hay ninguna <b>categoría registrada</b>!!</p>
        </div>
        ";
    } else{
        ?>
        <h3>Ver productos por categoría </h3>
        <form method='post' action=''>
            <div>
                <label for="check-product-category">Categoría: </label>
                <select name="check-product-category" required="required" id="check-product-category">
                    <?php
                    // Ya se ha llamado anteriormente a la función
                    $all_categories = $client->show_all_categories();
                    foreach($all_categories as $category){
                        echo "<option value='$category->id_categoria'>$category->nombre</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <br />
                <input type="submit" name="check-products-button" value="Ver productos" />
            </div>
        </form>
<?php
    }
    //Comprobamos si se clica el botón
    if(isset($_POST['check-products-button'])){
        $products_by_category = $client->show_products_by_category($_POST['check-product-category']);

        // Comprobamos si hay productos de la categoría seleccionada, sino mostramos un mensaje indicándolo
        if(count($products_by_category) == null){
        echo 
        "<p>¡Vaya! No hay <b>ninguna producto</b> asignada actualmente a esta categoría</p>
        </div>";
        header('Refresh: 2;');
        }
        else{
?>
        </div>
        <!-- Tabla para mostrar los productos de la categoria seleccionada -->
        <div class='actions'>
            <h3><b> <?php
                echo $products_by_category[0]->nombre
            ?> 
            <b></h3>
            <table border="1">
                <tr>
                    <td>ID PRODUCTO</td>
                    <td>NOMBRE</td>

                    <!-- Mostramos los datos devueltos en la consulta -->
                    <?php 
                    foreach($products_by_category as $product){
                        echo 
                            "<tr>
                                <td>".$product->id_producto."</td>
                                <td>".$product->nombre_p."</td>
                            </tr>";
                        } 
                    ?>
                </tr>
            </table>
        </div>
<?php
    } 
}
?> 
