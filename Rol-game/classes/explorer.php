<?php

    require_once("character.php");

    class Explorer extends Character {
        private $objects = 0;
        private $hidden = 0;

        function __construct($name, $species){
		parent::__construct($name, $species);
        }

        public function getObjects(){
            return $this->objects;
        }
        function setObjects($objects){
            /* Comprobamos que el valor es numérico y positivo, 
            y sumamos lo introducido por parámetro */
            if (is_numeric($objects)  && $objects > 0) {
                $this->objects += $objects;
            }
        }

        function getHidden(){
            return $this->hidden;
        }
        function setHidden($hidden){
            /*Comprobamos que el valor es numérico y positivo, 
            y sumamos lo introducido por parámetro */
            if(is_numeric($hidden)  && $hidden > 0){
                $this->hidden += $hidden;
            }
        }

        function finalResult(){
            $result = ($this->objects * 10) + ($this->hidden * 5);
            return $result;
        }

        //Métodos para imprimir los pasos del juego
        function printObjects($objects){
            return "<p><b>" . $this->name . "</b> -> Ha descubierto<b> ". 
            $objects ." objetos</b>. 
            Tiene un total de " . $this->getObjects() . " objetos descubiertos.</p>";
        }
        function printHidden($hidden){
            //Método para imprimir los pasos del juego
            return "<p><b>" . $this->name . "</b> -> Ha pasado desapercibido<b> ". 
            $hidden ." veces</b>. 
            Tiene un total de " . $this->getHidden() . " veces inadvertido.</p>";
        }
        function printResult(){
            return "<p><b>El explorador " . $this->name . "</b> -> Ha conseguido un total de<b> " . 
            $this->finalResult() ." puntos</b>.</p>";
        }

        function __toString(){
		return "<b>EXPLORER:</b> Name: ".parent::__toString().
                " | Objects found: ".$this->objects.
                " | Times unnoticed: ".$this->hidden."<br>";
        }

    }

?>
