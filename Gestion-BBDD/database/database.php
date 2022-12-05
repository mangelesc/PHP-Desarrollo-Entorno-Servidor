<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db_name = "Actividad04Angeles";
$con = mysqli_connect($GLOBALS["host"], $GLOBALS["user"], $GLOBALS["pass"]) or die("Error al conectar con la base de datos");

function connect(){
	mysqli_select_db($GLOBALS["con"], $GLOBALS["db_name"]);
}

function createDB(){
    create_database();
    mysqli_select_db($GLOBALS["con"], $GLOBALS["db_name"]);
	create_table_user();
	create_table_proyect();
    create_table_task();

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
function create_table_user(){
    mysqli_query($GLOBALS["con"], "CREATE TABLE IF NOT EXISTS usuario(
		id_user int auto_increment, 
		nombre_user varchar(255) not null,
        pass varchar(255) not null,
        tipo_usuario tinyint not null,
        PRIMARY KEY (id_user, nombre_user)
        );");
}
function create_table_proyect(){
    mysqli_query($GLOBALS["con"], "CREATE TABLE IF NOT EXISTS proyecto(
		id_proyect int auto_increment, 
		nombre_proyect varchar(255) not null,
        PRIMARY KEY (id_proyect)
        );");
}
function create_table_task(){
    mysqli_query($GLOBALS["con"], "CREATE TABLE IF NOT EXISTS tarea(
		usuario int, 
        proyecto int,
        nombre varchar(255) not null,
        estado int not null,
        PRIMARY KEY (usuario, proyecto),
        FOREIGN KEY (usuario) REFERENCES usuario(id_user),
        FOREIGN KEY (proyecto) REFERENCES proyecto(id_proyect)
        );");
}

/**Cerrar conexión */
function close_conexion(){
	mysqli_close($GLOBALS["con"]);
}
?>