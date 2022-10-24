<?php
	//Iniciamos la sesión
	session_start();

	include("form.html");
	
	//Función que devuelve $tablaLetra con los valores establecidos tras 
	//introducir la secuencia del usuario (pasada por parametro)
	function Candado($secuencia){
		$tablaLetra = [False, False, False, False, False, False, False, False];
		//Convertimos el string pasado por parámetro en un array
		$arraySecuencia = explode(",", $secuencia);

		//Recorremos el array con la secucia del usuario,
		//Cada vez que aparece una posición, se invierte el valor de esa posición en el array del candado. 
		foreach($arraySecuencia as $posicion){
			//Parseamos a int
			$indice = (int)$posicion;
			$tablaLetra[$indice] = !$tablaLetra[$indice];
		}

		return $tablaLetra;
		}
	
	//Comprobamos si el input está vacios
	//Si están vacios, añadimos una variable en $_SESSION
	//con un mensaje de error.
	if(empty($_POST["secuencia"])){
        $_SESSION['empty_secuencia'] = "Ups, debes introducir una secuencia, <br>RECUERDA! Debe estar separada por comas<br>";
        }

	//Si en la sesión existe algún error
	if(isset($_SESSION['empty_secuencia'])){
		//Redireccionamos a index.php
		header("Location: index.php");
	}

	//Si no hay errores, imprimimos los resultados
	else{
		$secuencia = $_POST["secuencia"];
		$resultado = Candado($secuencia); 
		echo "<br>RESULTADO DE LA SECUENCIA: <br><br>";
		//Recorremos el array para imprimirlo
		for($i=0; $i<count($resultado); $i++) {
            echo "$i: "; 
			//Si el valor el True, imprimimos "true", y si es False "false"
			echo $resultado[$i] ? "true": "false";
			echo "<br>";
        }
	}
	
?>