<?php
    //Iniciamos sesión
    //La sesión dura 30'(si no hago ninguna acción).
    session_start();
	include("form.html");

    //Comprobamos si dentro de la sesión hay error
    //Si lo hay, lo imprimimos y después borramos la variable de error. 
    if(isset($_SESSION['empty_min'])){
		echo $_SESSION['empty_min'];
		unset($_SESSION['empty_min']);
	}
	if(isset($_SESSION['empty_max'])){
		echo $_SESSION['empty_max'];
		unset($_SESSION['empty_max']);
	}
?>