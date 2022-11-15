<div>
    <form action="./files/again.php" method="post">
        <fieldset>
            <legend>Actividad 3.3</legend>
            <!--Incluimos test.php, para que se quede con el mismo 
            formato que las actividades anteriores -->
            <?php include_once("./files/test.php")?>
        </fieldset>
        <br />

        <!--Si está seteado el botón "again" redireccionamos a index.
        Como no se ha iniciado sesión y los puntos se consigen usando 
        la función rand(), se obtendrán nuevos resultados. 
        -->
        <input type="submit" name="again" value="Try again" />
        
    </form>
</div>