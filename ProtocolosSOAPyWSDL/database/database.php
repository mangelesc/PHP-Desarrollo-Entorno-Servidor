<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db_name = "Actividad05Angeles";
$con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]) or die("Error al conectar con la base de datos");

function connect(){
	mysqli_select_db($GLOBALS["con"], $GLOBALS["db_name"]);
}

function createDB(){
    create_database();
    mysqli_select_db($GLOBALS["con"], $GLOBALS["db_name"]);
	create_table_category();
	create_table_product();
}

/**
 * Creamos la BBDD, si no existe
 */
function create_database(){
    mysqli_query($GLOBALS["con"], "CREATE DATABASE IF NOT EXISTS ".$GLOBALS["db_name"].";");
}

/**
 * Creamos las tablas si no se han creado previamente
 */
function create_table_category(){
    mysqli_query($GLOBALS["con"], "CREATE TABLE IF NOT EXISTS categoria(
		id_categoria int auto_increment, 
		nombre varchar(50) not null,
        PRIMARY KEY (id_categoria)
        );");
}
function create_table_product(){
    mysqli_query($GLOBALS["con"], "CREATE TABLE IF NOT EXISTS producto(
		id_producto int auto_increment, 
		nombre_p varchar(50) not null,
        categoria int not null,
        PRIMARY KEY (id_producto),        
        FOREIGN KEY (categoria) REFERENCES categoria(id_categoria)
        );");
}

/**Cerrar conexión */
function close_conexion(){
	mysqli_close($GLOBALS["con"]);
}
?>