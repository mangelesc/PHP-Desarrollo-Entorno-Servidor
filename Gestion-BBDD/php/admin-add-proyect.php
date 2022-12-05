<div class="actions">
    <?php
    //Comprobamos si se clica el botón,
    if(isset($_POST['add-proyect-button'])){
        
        if(empty($_POST['add-proyect-name'])){
            echo "<p>Ups, el campo no puede estar <b>vacío</b></p><br>";
            header('Refresh: 2;');
        } else {
            add_proyect($_POST['add-proyect-name']);
            echo "<p>Proyecto añadido</p><br>";
            header('Refresh: 2;');
    
        }
    unset($_POST['add-proyect-button']);
    }
?>
<!-- Formulario para añadir proyectos -->
    <h3>Añadir proyectos</h3>
    <form method="post" action="">
        <label for="add-proyect-name">Proyecto: </label>
        <input type="text" required="required" maxlength="255" name="add-proyect-name" id="add-proyect-name" />
        <div>
            <br />
            <input type="submit" name="add-proyect-button" value="Crear proyecto" />
        </div>
    </form>
</div>