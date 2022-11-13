<?php
	//Iniciamos sesión e inclumos los archivos necesarios
    session_start();
	include_once "guessingFunc.php";

	//Si la variable de sesión randomValue (donde almacenaremos el numero a adivinar)
	//No está declarada, se genera un nuevo valor random. 
	if(!isset($_SESSION['randomValue'])){
        $_SESSION['randomValue'] = rand(1,100);
	}  

	//Si el botón nuevoRandom está seteado
	//Generamos un nuevo valor
	if(isset($_POST['newRandom'])){
		//Eliminamos randomNumer para que se vuelva a generar
		unset($_SESSION['randomValue']);

		echo "Se ha cambiado el número!<br> Intenta adivinarlo!";
		header("Refresh: 3; url=".$_SERVER['HTTP_REFERER']);
        }


	//Si giveUp está seteado, mostramos el valor del número random
	//El usuario se rinde y mostramos el número a adivinar
    if(isset($_POST['giveUp'])){
		echo "Cobarde!!<br> El número era: ".$_SESSION['randomValue'];
		
		//Eliminamos randomNumer para que se vuelva a generar uno nuevo
		unset($_SESSION['randomValue']);
		//Mostramos 3 segundos el mensaje, y redireccionamos a la página que nos ha llamado
		header("Refresh: 3; url=".$_SERVER['HTTP_REFERER']);
    }

	//Si send está seteado, pasamos a comprobar el número que ha introducido el usuario
	if(isset($_POST['send'])){

		//Si number está vacio, 
		if(empty($_POST["number"])){
			$_SESSION['empty_number'] = "Ups, debes introducir algún número!<br>";
			//Redireccionamos a index.php
			header("Location: ../index.php");
			}

		//Si no lo está
		else{
			//Comprobamos que el valor introducido está en rango (1-100)
			if($_POST["number"] < 1 || $_POST["number"] > 100) {
				$_SESSION['empty_number'] = "Recuerda! Debes introducir un número entre 1 y 100";
				header("Location: ../index.php");
				}

			//Si está en rango
			else{
				//Usamos la funcón previamente definida para comparar number y randomValue
				switch(clueNumber($_POST["number"])){
					case 0:
						//En caso de ser iguales (el usuario acierta)
						//Unsetamos randomValue para que se genere otro valor
						$_SESSION['result'] ="¡¡ENHORABUENA LO HAS ADIVINADO!! <br> El número era: ".$_POST["number"] ."<br><br>Se ha generado un nuevo número aleatorio. <br>Introduce un número para volver a jugar";
						unset($_SESSION['randomValue']);
						break;
					case 1:
						$_SESSION['result'] ="Intenta con un número mayor a ".$_POST["number"];
						break;
					case 2:
						$_SESSION['result'] ="Intenta con un número menor a ".$_POST["number"];
						break;
				}
				header("Location: ../index.php");
				
			}
		}
	}
?>