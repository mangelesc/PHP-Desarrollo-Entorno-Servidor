<?php 


    function getWinner($characters){
        /**Función para comparar el resultado final de todos lsos personajes
         * y devolver el ganador
         */
        $winner = $characters[0];
        for($i=0;$i<count($characters);$i++) {
            if ($characters[$i]->finalResult() > $winner->finalResult()){
                $winner = $characters[$i];
            }
        }
        return $winner;
    } 

?>