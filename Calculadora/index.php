<?php
    //Iniciamos sesión
    session_start();
	
	include("form.html");

    //Comprobamos si dentro de la sesión hay error
    //Si lo hay, lo imprimimos y borramos la variable de error. 
    if(isset($_SESSION['empty_number1'])){
		echo $_SESSION['empty_number1'];
		unset($_SESSION['empty_number1']);
	}

    if(isset($_SESSION['empty_number2'])){
		echo $_SESSION['empty_number2'];
		unset($_SESSION['empty_number2']);
	}

    if(isset($_SESSION['empty_operacion'])){
		echo $_SESSION['empty_operacion'];
		unset($_SESSION['empty_operacion']);
	}
	
?>