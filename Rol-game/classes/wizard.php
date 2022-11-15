<?php

    require_once("character.php");

    class Wizard extends Character {
        private $secrets = 0;
        private $spells = 0;

        function __construct($name, $species){
		parent::__construct($name, $species);
        }

        function getSecrets(){
            return $this->secrets;
        }
        function setSecrets($secrets){
            /* Hacemos el control para que no se puedan introducir 
            números negativos, y sumamos lo introducido por parámetro */
            if (is_numeric($secrets)  && $secrets > 0) {
                $this->secrets += $secrets;
            }
            
        }

        function getSpells(){
            return $this->spells;
        }
        function setSpells($spells){
            /*Suponemos que puede haber alguna opción para reducir el daño 
            causado, por lo que sólo comprobamos que el valor sea numérico */
            if(is_numeric($spells)){
                $this->spells += $spells;
            }
        }

        function finalResult(){
            $result = ($this->secrets * 5) + ($this->spells * 10);
            return $result;
        }

        //Métodos para imprimir los pasos del juego
        function printSecrets($secrets){
            return "<p><b>" . $this->name . "</b> -> Ha descubierto <b>". $secrets ." secretos</b>. 
            Tiene un total de " . $this->getSecrets() . " secretos descubiertos.</p>";
        }
        function printSpells($spells){
            //Método para imprimir los pasos del juego
            return"<p><b>" . $this->name . "</b> -> Ha lanzado <b>". 
            $spells ." hechizos</b> 
            Tiene un total de " . $this->getSecrets() . "  hechizos lanzados.</p>";
        }
        function printResult(){
            return "<p><b> El mago " . $this->name . " </b> -> Ha conseguido un total de <b>" . 
            $this->finalResult() ." puntos</b>.<p/>";
        }

        function __toString(){
		return "<b>WIZARD: </b> Name: ".parent::__toString().
                " | Secrets uncovered: ".$this->secrets.
                " | Spells cast: ".$this->spells."<br>";
        }

    }

?>