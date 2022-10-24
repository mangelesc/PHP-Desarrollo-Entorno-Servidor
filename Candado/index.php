<?php
    //Iniciamos sesión
    session_start();
	include("form.html");

    //Comrpobamos si dentro de la sesión hay error
    //Si lo hay, lo imprimimos y borramos la variable de error. 
    if(isset($_SESSION['empty_secuencia'])){
		echo $_SESSION['empty_secuencia'];
		unset($_SESSION['empty_secuencia']);
	}
?>