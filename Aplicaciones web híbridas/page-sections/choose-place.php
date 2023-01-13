<?php
$locales_places = querie_cities();
?>
<div class="container">
    <form method='post' action='./place.php'>
        <div class="section">
            <label for="chosen-place">Selecciona población: </label>
            <select name="chosen-place" id="chosen-place">
                <?php
                // Evitamos que se repitan las poblaciones
                $cities = [];
                // Seleccionamos los datos existentes en la BBDD
                while($row_places = get_results($locales_places)){
                    extract($row_places);
                    echo "<option value='$poblacion'>$poblacion</option>";
                }
                ?>                                                                                                                                                           
            </select>
        </div>
        <div class="section">
            <input type="submit" name="place-button" value="Ver mapa" />
        </div>
    </form>
</div>