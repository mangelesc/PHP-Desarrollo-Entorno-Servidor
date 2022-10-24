<?php
	//Iniciamos la sesión
	session_start();

	include("form.html");

	//Función que devuelve un array con la letra correspondiente al 
	//número de DNI introducido por parámetro
	function LetraDNI ($numero){
		$tablaLetra = array(0 => "T", 1 => "R", 2 => "W", 3=> "A",4 => "G",
		5 => "M", 6 => "Y", 7 => "F", 8 => "P", 9 => "D", 10 => "X", 11 => "B",
		12 => "N", 13 => "J", 14 => "Z", 15 => "S", 16 => "Q", 17 => "V", 18 => "H",
		19 => "L", 20 => "C", 21 => "K", 22 => "E");

		$resto = round($numero%23);

		$resultado = $tablaLetra[$resto];

		return $resultado;
		}
	
	//Comprobamos si el input está vacios
	//Si están vacios, añadimos una variable en $_SESSION
	//con un mensaje de error.
	if(empty($_POST["dni"])){
        $_SESSION['empty_dni'] = "Ups, debes introducir un número<br>";
        }

	//Si en la sesión existe algún error
	if(isset($_SESSION['empty_dni'])){
		//Redireccionamos a index.php
		header("Location: index.php");
	}

	//Si no hay errores, imprimimos los resultados
	else{
		$dni = $_POST["dni"];
		$resultado = LetraDNI($dni); 
		echo "La letra correspongiente al DNI con número $dni es: <b> $resultado </b><br>";
	}
	
?>