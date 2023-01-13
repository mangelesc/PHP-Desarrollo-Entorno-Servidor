<?php
/***********************
 * Datos de la BBDD *
 ***********************/
$host = "localhost";
$user = "root";
$pass = "root";
$db_name = "Actividad06Angeles";
$con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]) or die("Error al conectar con la base de datos");


/***********************
 * Creamos y conectamos la BBDD *
 ***********************/
function connect(){
	mysqli_select_db($GLOBALS["con"], $GLOBALS["db_name"]);
}

/***********************
 * Consultas a la BBDD *
 ***********************/
function get_num_rows($result){
	return mysqli_num_rows($result);
}

function get_results($results){
	return mysqli_fetch_array($results);
}

function querie_get_poblacion(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT poblacion from locales;"
    );
	return $result;
}

function querie_get_tipo(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT tipo from locales;"
    );
	return $result;
}

function existing_place($place){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * from locales
        where poblacion = '$place';"
    );
	return $result;
}

function querie_cities(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * from poblacion;"
    );
	return $result;
}

function querie_locales_by_place($place){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT l.nombre, l.coordenadas, l.idCiudad, l.tipo, p.poblacion 
        from locales l
        INNER JOIN poblacion p on l.idCiudad = p.idPoblacion
        where p.poblacion = '$place';"
    );
	return $result;
}

function querie_locales_by_type($type){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT l.nombre, l.coordenadas, l.idCiudad, l.tipo, p.poblacion 
        from locales l
        INNER JOIN poblacion p on l.idCiudad = p.idPoblacion
        where l.tipo = '$type';"
    );
	return $result;
}

/**Cerrar conexión */
function close_conexion(){
	mysqli_close($GLOBALS["con"]);
}
?>