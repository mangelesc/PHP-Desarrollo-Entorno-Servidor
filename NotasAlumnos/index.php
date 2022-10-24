<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <?php
        ECHO "<h1><b>DAW - PRÁCTICA 02 - M07</b><h1>
        <h4><b>MARÍA ÁNGELES C.</b></h4><br>";
        
        /*------------ 
        ACTIVIDAD 1.2
        ------------ */
        /*Escribe un programa en el que se declare un array asociativo para guardar las notas de unos 
        alumnos. Las claves del array serán los nombres de los alumnos y los valores serán las notas de cada uno.
        El programa deberá hacer las operaciones necesarias para mostrar los siguientes mensajes (los datos que 
        se muestran son de ejemplo, los tuyos cambiarán en función de los valores del array):
        La nota más alta es la de David con un 9.
        La nota más baja es la de Sandra con un 3.
        La nota media de la clase es 6.4.
        Además, se mostrarán los nombres de los alumnos, acompañados de su nota, ordenados por esta última (ascendentemente).
        */

        //Función que devuelve un arrays la nota más alta y el nombre del alumno
        function notaMasAlta($listaNotas){
            //Asignamos -1 a la variable nota, ya que es un valor más bajo del rango de notas
            $notaMax = -1;
            $alumnoMax = "";

            //Recorremos el array pasado por parámetro
            foreach($listaNotas as $clave => $valor){
                //Si el valor es mayor que el valor actual de $notaMax
                //Reasignamos los valores de esa posición a las variables $nota y $alumno
                if ($valor > $notaMax){
                    $notaMax = $valor;
                    $alumnoMax = $clave;
                }
            }
            return "La nota más alta es la de $alumnoMax con un $notaMax.<br>";
        }

        //Función que devuelve un arrays la nota más baja y el nombre del alumno
        function notaMasBaja($listaNotas){
            //Asignamos 11 a la variable nota, ya que es un valor más alto del rango de notas
            $notaMin = 11;
            $alumnoMin = "";

            //Recorremos el array pasado por parámetro
            foreach($listaNotas as $clave => $valor){
                //Si el valor es menor que el valor actual de $notaMax
                //Reasignamos los valores de esa posición a las variables $nota y $alumno
                if ($valor < $notaMin) {
                    $notaMin = $valor;
                    $alumnoMin = $clave;
                }
            }
            return "La nota más baja es la de $alumnoMin con un $notaMin.<br>";
            }
            

        //Función que devuelve la nota media 
        function notaMedia($listaNotas){
            //Asignamos 11 a la variable nota, ya que es un valor más alto del rango de notas
            $total = 0;

            //Recorremos el array pasado por parámetro
            foreach($listaNotas as $clave => $valor){
                //sumamos el total de todas las notas
                $total += $valor;
            }
            //Calculamos la media del total
            $media = round($total/count($listaNotas), 2);

            return "La nota media de la clase es $media <br>";
        }


        echo "<u>ACTIVIDAD 1.2</u><br>";

        //Imprimimos la clase A(con el caso extremo de 10)
        $AlumnosClaseA = array("Ángeles" => 7, "Albeto" => 8, "Jorge" => 5.5, "Julia"=> 6.5, 
        "Daniel" => 10, "María" => 5, "Francisco" => 4);

        echo "<br><b>CLASE A: </b><br>";
        foreach($AlumnosClaseA as $clave => $valor){
            echo "<b>Alumno:</b> $clave. Nota:  $valor<br>";
        }

        echo notaMasAlta($AlumnosClaseA), notaMasBaja($AlumnosClaseA), notaMedia($AlumnosClaseA);


        //Imprimimos la clase b (Con el caso extremo de 0)
        $AlumnosClaseB = array("Ángeles" => 8, "Diego" => 5.8, "Elvira" => 6, "Mar"=> 7, 
        "Fernando" => 7, "Elena" => 0, "Enrique" => 5);

        echo "<br><b>CLASE B: </b><br>";
        foreach($AlumnosClaseB as $clave => $valor){
            echo "<b>Alumno:</b> $clave. Nota:  $valor<br>";
        }
        echo notaMasAlta($AlumnosClaseB), notaMasBaja($AlumnosClaseB), notaMedia($AlumnosClaseB);

        ?>
    </body>
</html>