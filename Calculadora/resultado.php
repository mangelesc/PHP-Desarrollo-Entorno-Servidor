<?php
    //Iniciamos sesión
    session_start();
	
    //Incluímos el formulario, por si el usuario desea realizar otro cálculo tras oobtener el resultado. 
	include("form.html");

    //Usando switch, calculamos la operación seleccionada y el símbolo
    switch ($_SESSION['operacion']) {
        case 1:
            $simbolo = "+";
            $resultado = $_SESSION['n1'] + $_SESSION['n2'];
            break;
        case 2:
            $simbolo = "-";
            $resultado = $_SESSION['n1'] - $_SESSION['n2'];
            break;
        case 3:
            $simbolo = "*";
            $resultado = $_SESSION['n1'] *$_SESSION['n2'];
            break;
        case 4:
            $simbolo = "/";
            $resultado = $_SESSION['n1'] / $_SESSION['n2'];	
            break;		
    }

    //Imprimimos el resultado. 
    echo "<br>El resultado de <b>2" . $_SESSION['n1'] . $simbolo . $_SESSION['n2'] . " es: " . $resultado . "</b>"; 
?>