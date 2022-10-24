<?php
	//Iniciamos la sesión
	session_start();

	include("form.html");

	//Función que devuelve un array con los valores intermendios 
	//de dos números introducidos por parámetro en un array
	function ValoresIntermedios ($minVal, $maxVal){
		$resultado = array();
		for ($i=$minVal+1;$i<$maxVal; $i++){
			$resultado[] = $i;
		}

		return $resultado;
		}
	
	//Comprobamos si los inputs están vacios
	//Si están vacios, añadimos una variable en $_SESSION
	//con un mensaje de error.
	//**Es importante haber iniciado sesión en todas las páginas**
	if(empty($_POST["min"])){
        $_SESSION['empty_min'] = "Ups, debes introducir un valor mínimo<br>";
        }
    if(empty($_POST["max"])){
        $_SESSION['empty_max'] = "Ups, debes introducir un valor máximo<br>";
    }

	//Si en la sesión existe algún error
	if(isset($_SESSION['empty_min']) || isset($_SESSION['empty_max'])){
		//Redireccionamos a index.php
		header("Location: index.php");
	}

	//Si no existe, imprimimos los resultados
	else{
		$min = $_POST["min"];
		$max = $_POST["max"];
		$resultado = ValoresIntermedios($min, $max); 
		echo "Los valores intermendios de los números $min y $max son: <br>";

		for($i=0;$i<count($resultado);$i++){ //sizeof($miArray2)
			echo "$resultado[$i] <br>";
		}
	}
	
?>