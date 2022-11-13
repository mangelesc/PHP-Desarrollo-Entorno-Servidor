<?php
    function yearsOld($yearOfBirth) {
        //Función para calcular la edad aproximada
        $actualYear = date("Y");

        return ($actualYear - $yearOfBirth);

    }

    function imc($weight, $height){

        return round(($weight/pow($height, 2)),2);
    }

    function imcScale($imcValue){
        $imcScale = ["false","false","false","false"]; 
        if ($imcValue < 18.5) {
            $imcScale[0] = "<b>true</b>";
        }
        elseif ($imcValue >= 18.5 && $imcValue <= 24.9) {
            $imcScale[1] = "<b>true</b>";
        }
        elseif ($imcValue > 25 && $imcValue <= 50) {
            $imcScale[2] = "<b>true</b>";
        }
        elseif ($imcValue < 50) {
            $imcScale[3] = "<b>true</b>";
        }
        
        return $imcScale;
    }

?>