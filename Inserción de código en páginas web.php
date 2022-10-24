<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 01</title>
</head>
<body>
    <?php
    ECHO "<b>DAW - PRÁCTICA 01 - M07 <br> MARÍA ÁNGELES C. </b><br><br>";
    
    /*------------ 
    ACTIVIDAD 1.1
    ------------ */
    /* Escribir un programa en que se declare una variable que contenga un valor numérico (el que tú quieras). 
    Este valor representará una cantidad en euros. El programa calculará el equivalente a otras dos monedas: 
    dólares americanos y yenes. La equivalencia entre euro y dólar y euro y yen deberá guardarse en constantes. 
    Se mostrará el siguiente mensaje:
    XX euros equivalen a YY dólares y ZZ yenes.*/

    echo "<u>ACTIVIDAD 1.1</u><br>";

    //declaramos las variables y constantes
    define("DOLARES_EQUIVALENCIAEU", 0.98);
    define("YENES_EQUIVALENCIAEU", 141.87);
    $euros = 10; 

    //calculamos la equivalencia en ambas monedas, y redondeamos los resultados
    $dolares = $euros * DOLARES_EQUIVALENCIAEU;
    $dolares = sprintf("%.2f", $dolares);
    $yenes = $euros * YENES_EQUIVALENCIAEU;
    $yenes = sprintf("%.2f", $yenes);

    //imprimimos los resultados
    echo "$euros euros equivalen a $dolares dólares y a $yenes yenes.<br>";



    /*------------ 
    ACTIVIDAD 1.2
    ------------ */
    /* En una escuela tenemos tres clases y queremos saber la cantidad de pupitres que necesitamos tener en total. 
    Dependerá del número de alumnos por aula. Hay que tener en cuenta que en cada pupitre caben 2 alumnos. Haz un programa 
    en PHP en que se definan tres variables que contengan el número de alumnos que hay en cada clase, y muestre el número 
    total de pupitres que necesitaremos */

    echo "<br><u>ACTIVIDAD 1.2</u><br>";

    //Definimos una función para calcular el número de pupitres, que recibe por parámetro el total de alumnos
    function total_pupitres($alumnos){

        $pupitres = 0;
        
        //Si el total de alumnos es par, el total de pupitres será la división del total entre 2
        if ($alumnos % 2 == 0) {
            $pupitres = $alumnos/2;
        
        //Si es impar, redundeamos hacia el siguiente valor
        } else {
            $pupitres = round(($alumnos/2), 0, PHP_ROUND_HALF_UP);
        }

        return $pupitres;
    }

    //Probamos la función, con los dos posibles resultados
    
    //OPCION 1: Suponemos que cada clase necesita sus propios pupitres, por lo que llamamos a la función en cada caso.
    //Definimos las variables, usando cantidades pares e impares para comprobar que la función funciona correctamente
    $clase1 = 17;
    $clase2 = 19;
    $clase3 = 20;
    
    //Calculamos el total de pupitres que necesita por cada clase
    $PupClase1 = total_pupitres($clase1);
    $PupClase2 = total_pupitres($clase2);
    $PupClase3 = total_pupitres($clase3);

    //Llamamos a la función e imprimimos el resultado
    $totalPupitres = $PupClase1 + $PupClase2 + $PupClase3;
    echo "La clase 1 con $clase1 alumnos, necesitará $PupClase1 pupitres.<br>";
    echo "La clase 2 con $clase2 alumnos, necesitará $PupClase2 pupitres.<br>";
    echo "La clase 3 con $clase3 alumnos, necesitará $PupClase3 pupitres.<br><br>";

    //OPCIÓN 2: Suponemos que se calcula el total de alumnos y con el total se calcula el número de pupitres. 
    //Definimos las variables
    $clase1i = 17;
    $clase2i = 19;
    $clase3i = 20;
    
    //Sumamos el total de alumnos
    $totalAlumnosI = $clase1i + $clase2i + $clase3i;

    //Llamamos a la función e imprimimos el resultado
    $totalPupitresI = total_pupitres($totalAlumnosI);
    echo "Hay un total de $totalAlumnosI alumnos en la escuela.<br>Se necesitarán $totalPupitresI pupitres.<br>";
    
    
    /*------------ 
    ACTIVIDAD 1.3
    ------------ */
    /*Escribir un programa que guarde en tres variables los coeficientes de una ecuación de segundo grado. 
    Debe guardar en otras dos variables los resultados, y mostrarlos por pantalla. Para hacer la raíz cuadrada, 
    usar la función de PHP sqrt (número). */
    echo "<br><u>ACTIVIDAD 1.3</u><br>";
    
    //Declaramos una función para resolver ecuaciones de segundo grado (https://www.youtube.com/watch?v=IGhjsc8lEKY)
    function ecuacion_segundo_grado($a,$b,$c) {
        $paso1 = sqrt(pow($b,2) - 4 * $a * $c);
        $paso2 = 2 * $a;

        //Como btenemos dos resultados, guardamos cada uno de ellos en una variable
        $resultMas = (-$b + $paso1) / 2;
        $resultMas = sprintf("%.2f", $resultMas);

        $resutlMenos =  (-$b - $paso1) / 2;
        $resutlMenos = sprintf("%.2f", $resutlMenos);

        //Devuelvemos un array con los dos resultados
        $listaResultados = [$resultMas, $resutlMenos];
        return $listaResultados;
    }

    //Definimos las variables y llamamos a la función 
    $a1 = 1;
    $b1 = 1;
    $c1 = -2;

    $ecu1 = ecuacion_segundo_grado($a1,$b1,$c1);
    echo "Incognitas: a = $a1 , b = $b1 , c = $c1<br>Resultados: + = $ecu1[0], - = $ecu1[1]<br> <br>";

    //Ralizamos otra prueba para asegurar que el código funciona    
    $a2 = -5;
    $b2 = 4;
    $c2 = 3;

    $ecu2 = ecuacion_segundo_grado($a2,$b2,$c2);
    echo "Incognitas: a = $a2 , b = $b2  , c = $c2<br>Resultados: + = $ecu2[0], - = $ecu2[1]<br>";



    /*------------ 
    ACTIVIDAD 1.4
    ------------ */
    /*Escribir un programa que, dado el diámetro de una pizza, nos muestre su área y la longitud del borde. 
    Los resultados deben mostrarse con un máximo de 2 decimales. Para utilizar el número π en PHP puedes observar 
    este link: http://php.net/manual/es/math.constants.php. */
    
    echo "<br><u>ACTIVIDAD 1.4</u><br>";

    //Definimos una función para calcular el área de un círculo (A = π * r²)
    function area_circulo ($diametro){
        $radio = $diametro/2;
        $area = M_PI * pow($radio, 2);
        $area = sprintf("%.2f", $area);

        return $area;
    }

    //Definimos una función para calcular el perímetro de un círculo (p = 2 * π * r)
    function perimetro_circulo ($diametro){
        $radio = $diametro/2;
        $perimetro = 2 * M_PI * $radio;
        $perimetro = sprintf("%.2f", $perimetro);

        return $perimetro;
    }

    //Llamamos a la función y probamos varios valores
    $pizzaGrande = 32;
    $areaPizzaGrande = area_circulo($pizzaGrande);
    $perimPizzaGrande = perimetro_circulo($pizzaGrande);
    echo "Tu pizza de $pizzaGrande cm de diámetro, tiene: <br> - $areaPizzaGrande cm de área <br> - $perimPizzaGrande cm de perímetro.<br><br>";
    
    
    $pizzaPequena = 19.5;
    $areaPizzaPequena = area_circulo($pizzaPequena);
    $perimPizzaPequena = perimetro_circulo($pizzaPequena);
    echo "Tu pizza de $pizzaPequena cm de diámetro, tiene: <br> - $areaPizzaPequena cm de área <br> - $perimPizzaPequena cm de perímetro.<br>";



    /*------------ 
    ACTIVIDAD 1.5
    ------------ */
    /*A un trabajador le pagan por horas a razón de 30€/h. A partir de las 40 horas de trabajo, la tarifa por hora se 
    incrementa en un 50%. Escribe un programa en que, a partir de un número de horas trabajadas, se muestre como resultado 
    el sueldo del trabajador. Los valores del precio por hora y el incremento deben almacenarse en constantes. */

    echo "<br><u>ACTIVIDAD 1.5</u><br>";
    
    //Definimos las constantes
    define("PRECIO_HORA", 30);
    define("INCREMENTO", PRECIO_HORA*0.5);
    define("MAX_HORAS", 40);

    //Definimos la función
    function horas_trabajadas($horas){
        $total = 0 ;

        /*Si $horas es mayor que MAX_HORAS, le restamos MAX_HORAS y a las horas restantes realizamos el incremento en las restante,
        y multiplicamos por el precio/h */
        if ($horas > MAX_HORAS) { 
            $h_incremento = $horas - MAX_HORAS;
            $h_incremento = $h_incremento * (PRECIO_HORA + INCREMENTO);
            $total = ((MAX_HORAS * PRECIO_HORA) + $h_incremento);

        //Si es menos a MAX_HORAS, multiplicamos por el precio/ hora
        } else {
            $total = $horas * PRECIO_HORA;
        }

        return $total;
    }

    //Llamamos a la función y probamos varias opciones para comprobar que funciona correctamente
    
    // Opción con horas inferiores al maximo de horas
    $menos_horas = 35;
    $sin_incremento = horas_trabajadas($menos_horas);
    echo "Has trabajado $menos_horas horas.<br>Tu suelto total es: $sin_incremento €<br><br>";
    
    //TEST: Opción con horas superiores al maximo de horas
    $mas_horas = 45;
    $con_incremento = horas_trabajadas($mas_horas);
    echo "Has trabajado $mas_horas horas.<br>Tu suelto total es: $con_incremento €<br><br>";

    ?>

</body>
</html>