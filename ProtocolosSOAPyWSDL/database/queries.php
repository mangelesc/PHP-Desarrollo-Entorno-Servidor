<?php

$con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"],$GLOBALS["db_name"]) or die("Error al conectar con la base de datos");

function get_num_rows($result){
	return mysqli_num_rows($result);
}

function get_results($results){
	return mysqli_fetch_array($results);
}

/**
 * Gestión de la tabla 
 * categoria
 */
function querie_add_category($name){
    mysqli_query($GLOBALS["con"], 
        "INSERT INTO categoria(nombre) values
        ('$name')");
}

function querie_get_categories(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * from categoria");
	return $result;
}


/**
 * Gestión de la tabla 
 * producto
 */
function querie_add_product($name, $category){
    mysqli_query($GLOBALS["con"], 
        "INSERT INTO producto(nombre_p, categoria) values
        ('$name', '$category')");
}

function querie_get_product_by_category($categoria){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT p.id_producto, p.nombre_p, c.nombre from producto p 
        INNER JOIN categoria c on p.categoria = c.id_categoria
        where p.categoria = '$categoria';");
	return $result;
}

?>