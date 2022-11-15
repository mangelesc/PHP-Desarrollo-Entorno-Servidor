<?php

    require_once("character.php");

    class Warrior extends Character {
        private $enemies = 0;
        private $damage = 0;

        function __construct($name, $species){
		parent::__construct($name, $species);
        }

        function getEnemies(){
            return $this->enemies;
        }
        function setEnemies($enemies){
            /* Hacemos el control para que no se puedan introducir 
            números negativos, y sumamos lo introducido por parámetro */
            if (is_numeric($enemies)  && $enemies > 0) {
                $this->enemies += $enemies;
            }
            
        }

        function getDamage(){
            return $this->damage;
        }
        function setDamage($damage){
            /*Suponemos que puede haber alguna opción para reducir el daño 
            causado, por lo que sólo comprobamos que el valor sea numérico */
            if(is_numeric($damage)){
                $this->damage += $damage;
            }
        }
        
        function finalResult(){
            $result = ($this->enemies * 10) + ($this->damage * 5);
            return $result;
        }

        //Métodos para imprimir los pasos del juego
        function printEnemies($enemies){
            return "<p><b>" . $this->name . "</b> -> Ha abatido a<b> ". $enemies ." enemigos</b>. 
            Tiene un total de " . $this->getEnemies() . " objetos descubiertos.</p>";
        }
        function printDamage($damage){
            //Método para imprimir los pasos del juego
            return "<p><b>" . $this->name . "</b> -> Ha sufrido<b> ". 
            $damage ." puntos de daño</b> 
            Tiene un total de " . $this->getDamage() . "  de daño.</p>";
        }
        function printResult(){
            return "<p><b> El guerrero " . $this->name . "</b> -> Ha conseguido un total de<b> " . 
            $this->finalResult() ." puntos</b>.<p/>";
        }

        function __toString(){
		return "<b>WARRIOR</b>: Name: ".parent::__toString().
                " | Enemies killed: ".$this->enemies.
                " | Damage suferred: ".$this->damage."<br>";
        }

    }

?>