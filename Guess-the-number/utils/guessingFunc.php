<?php

    function clueNumber($userNumer,){
        //Función para comparar un valor con $_SESSION['randomValue']  
        $clue = "";
        if($userNumer == ($_SESSION['randomValue'])){
            $clue = 0;
        }
        elseif($userNumer < ($_SESSION['randomValue'])){
            $clue = 1;
        }
        else{
            $clue = 2;
        }
        return $clue;
    }

?>