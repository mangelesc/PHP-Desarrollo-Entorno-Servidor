<?php

    class Character {
        protected $name;
        protected $species; //Por defecto Unknown
        protected $experience = 0;

        //Añadimos un array static, con las especies conocidas de los personajes
        protected static $KnownSpecies = ["Unknown", "Human", "Mutant", "Titan", "Asgardians", "Eternals", "Celestial"];

        function __construct($name, $species){
		$this->name = $name;
		$this->species = $species;
        }

        function getName(){
            return $this->name;
        }
        function setName($name){
            $this->$name = $name;
        }

        function getKnownSpecies(){
            return self::$KnownSpecies;
        }
        function addKnownSpecies($newSpecies){
            //Método para añadir una nueva especie conocida al array static
            array_push(self::$KnownSpecies, $newSpecies);
        }

        function getSpecies(){
            return $this->species;
        }
        function setSpecies($species){
            /* Al tener un array con especies, pasaríamos la posición de la especie por parámetro 
            Por ello, comprobamos que el valor introducido esté en rango
            Si no lo está, la especie está definida como "Unknown" por defecto
            */
            if ( is_numeric($species) && $species>0 && $species<count(self::$KnownSpecies)){
                $this->$species = self::$KnownSpecies[$species];
            } else {
                $this->$species = self::$KnownSpecies[0];
            }
        }

        function getExperience(){
            return $this->experience;
        }
        function setExperience($experience){
            /*Suponiendo que NO SE PUEDE RESTAR experiencia, hacemos el control, 
            y sumamos los puntos de experiencia introducidos por parámetro. 
            */
            if (is_numeric($experience)  && $experience > 0){
                $this->$experience += $experience;
            } else {
                return "Ups, valor incorrecto";
            }
        }


        function __toString(){
		return $this->name.
				" | Species: ".$this->species.
				" | Experience: ".$this->experience;
        }


    }
?>