<?php

    //inclumos las clases
    require("./classes/explorer.php");
    require("./classes/warrior.php");
    require("./classes/wizard.php");

    require("./files/getWinner.php");

    //Definimos los personajes en un array
    $characters = array();

    $characters[0] = new Explorer("Star-Lord", 1);
    $characters[1] = new Warrior("Thanos", 3);
    $characters[2] = new Warrior("Thor", 4);
    $characters[3] = new Wizard("Loki", 4);

    echo "<h1>READY TO PLAY? </h1>";
    echo "<h2> Ejemplo de juego </h2>";
    echo "<h3> Jugadores: </h3>";
    for($i=0;$i<count($characters);$i++) { 
		echo "$characters[$i]<br>";
	} 
    
    //Jugada 1
    echo "<hr>";
    echo "<h3> Ronda 1: </h3>";

    //Usamos algunas de los métodos definidos previamente en las clases de estos objetos. 
    $step1 = rand(1,5);
    $characters[0]->setObjects($step1);
    echo $characters[0]->printObjects($step1);

    $step2 = rand(1,5);
    $characters[1]->setEnemies($step2);
    echo $characters[1]->printEnemies($step2);

    $step3 = rand(1,5);
    $characters[2]->setDamage($step3);
    echo $characters[2]->printDamage($step3);

    $step4 = rand(1,5);
    $characters[3]->setSecrets($step4);
    echo $characters[3]->printSecrets($step4);

    //Jugada 2
    echo "<hr>";
    echo "<h3> Ronda 2: </h3>";

    $step5 = rand(1,5);
    $characters[0]->getHidden($step5);
    echo $characters[0]->printHidden($step5);

    $step6 = rand(1,5);
    $characters[1]->setEnemies($step6);
    echo $characters[1]->printEnemies($step6);

    $step7 = rand(1,5);
    $characters[2]->setEnemies($step7);
    echo $characters[2]->printEnemies($step7);

    $step8 = rand(1,5);
    $characters[3]->setSpells($step8);
    echo $characters[3]->printSpells($step8);

    //Final
    echo "<hr>";
    echo "<h3> Resultados: </h3>";

    echo $characters[0]->printResult();
    echo $characters[1]->printResult();
    echo $characters[2]->printResult();
    echo $characters[3]->printResult();

    //Función definida para obtener el ganador, según sus puntos finales
    $winner = getWinner($characters);

    echo "<h3>And the winner is... " . $winner->getName() . "!!!</h3>";
?>