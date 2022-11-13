<?php session_start(); ?>
<div>
    <form action="../form1.php" method="post">
        <fieldset>
            <legend>Actividad 3.2</legend>
            <h3>Entrenador Personal</h3>
            <b>¡Hola <?php echo $_SESSION['name']?>!</b>
            <br />
            <br />
            Rondas los: <?php echo $_SESSION['age']?> años
            <br />
            Tu IMC es: <?php echo $_SESSION['imc']?>
            <br />
            <br />
            Peso insuficiente: <?php echo $_SESSION['imcSacle'][0]?>
            <br />
            Peso normal: <?php echo $_SESSION['imcSacle'][1]?>
            <br />
            Sobrepeso: <?php echo $_SESSION['imcSacle'][2]?>
            <br />
            Obesidad: <?php echo $_SESSION['imcSacle'][3]?>
            <br />
        </fieldset>
        <br />
        <input type="submit" name="resetButton" value="Volver" />
    </form>
</div>
