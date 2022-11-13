<?php

    //Iniciamos sesión
    session_start();

	require("utils/personal-trainer.php");


	//No usa sesión, muestra mensaje de rroe y redirecciona automáticamente
	//pasados 2 seg = Refresh: 2, a la página de donde vengo = .$_SERVER['HTTP_REFERER']

    if (isset($_POST['next1Button'])){
        if(empty($_POST['yearBirth']) || $_POST['name'] == "" ){
            echo "Ups, introduce <b>todos los valores</b>";
            header("Refresh: 2; url=".$_SERVER['HTTP_REFERER']);
        }

        elseif($_POST['yearBirth'] > date('Y') || $_POST['yearBirth'] <= 0){
            echo "Ups, introduce una <b>fecha</b> válida";
            header("Refresh: 2; url=".$_SERVER['HTTP_REFERER']);
        }

        else {
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['age'] = yearsOld($_POST['yearBirth']);

            header("Location: ./html/form2.html");
        }
    }

    if (isset($_POST['next2Button'])){
        if(empty($_POST['height'] || $_POST['weight'])){
            echo "Ups, introduce <b>todos los valores</b>";
            header("Refresh: 2; url=".$_SERVER['HTTP_REFERER']);
        }

        elseif($_POST['height'] <= 0 || $_POST['weight'] <= 0){
            echo "Ups, introduce un <b>valor positivo</b>";
            header("Refresh: 2; url=".$_SERVER['HTTP_REFERER']);
        }

        else {
            $_SESSION['imc'] = imc($_POST['weight'], $_POST['height']);
            $_SESSION['imcSacle'] = imcScale($_SESSION['imc']);

            header("Location: ./html/form3.php");
        }
    }


    if (isset($_POST['resetButton'])){

        unset($_SESSION['name']);
        unset($_SESSION['age']);
        unset($_SESSION['imc']);
        unset($_SESSION['imcSacle']);

        header("Location: index.php");
    }

?>