<?php
	//Iniciamos la sesión
	session_start();

	include("form.html");

	//Función que devuelve el resultado de la operación introducida por parámetro
	//

	//Comprobamos si el input está vacios
	//Si están vacios, añadimos una variable en $_SESSION
	//con un mensaje de error.
	if(empty($_POST["number1"])){
        $_SESSION['empty_number1'] = "Ups, debes introducir el operando 1<br>";
        }
	
	if(empty($_POST["number2"])){
        $_SESSION['empty_number2'] = "Ups, debes introducir el operando 2<br>";
        }

	if(!isset($_POST["operacion"])){
		$_SESSION['empty_operacion'] = "Ups, debes seleccionar una operación <br>";
	}

	//Si en la sesión existe algún error
	if(isset($_SESSION['empty_number1']) || isset($_SESSION['empty_number2']) || isset($_SESSION['empty_operacion'])){
		//Redireccionamos a index.php
		header("Location: index.php");
	}

	//Si no hay errores, redireccionamos a otra página
	else{
		//Añadimos el valor de las variables al array $_SESSION para poder usarlas el la otra pagina
		$_SESSION['n1'] = $_POST["number1"];
		$_SESSION['n2'] = $_POST["number2"];
		$_SESSION['operacion'] = $_POST["operacion"];

		//Redireccionamos a resultado.php
		header("Location: resultado.php");
	}
?>