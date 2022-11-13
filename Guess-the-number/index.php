<?php

    //Iniciamos sesión
    session_start();

	//Incuimos los html
    include "html/header.html";
    include "html/form.html";
	
    //Comprobamos si se ha declarado empty_number
    //si es el caso, lo imprimimimos y unseteamos
    if(isset($_SESSION['empty_number'])){
		echo $_SESSION['empty_number'];
		unset($_SESSION['empty_number']);
	}

    //Comprobamos si se ha declarado result
    //si es el caso, lo imprimimimos y unseteamos
    if(isset($_SESSION['result'])){
		echo $_SESSION['result'];
		unset($_SESSION['result']);
	}
	

?>