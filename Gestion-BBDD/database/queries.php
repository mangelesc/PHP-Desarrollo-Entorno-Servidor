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
 * usuario
 */

function validate_user ($user,$pass){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * from usuario
        where nombre_user = '$user' and pass = '$pass'");
	return $result;
}

function add_user($name, $pass, $type){
    $result = mysqli_query($GLOBALS["con"], 
        "INSERT INTO usuario(nombre_user, pass, tipo_usuario) values
            ('$name', '$pass', $type)");
	return $result;
}

function get_users(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * from usuario");
	return $result;
}

function get_user($user){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * from usuario where nombre_user = '$user';");
	return $result;
}

function modify_user($user, $nombre_user, $pass, $tipo_usuario){
    $result = mysqli_query($GLOBALS["con"], 
        "UPDATE usuario set  
		nombre_user = '$nombre_user',
        pass = '$pass',
        tipo_usuario = '$tipo_usuario'
        where id_user = '$user';");
	return $result;
}

function delete_user($user){
    $result = mysqli_query($GLOBALS["con"], 
        "DELETE from usuario where id_user = '$user';");
	return $result;
}

/**
 * Gestión de la tabla 
 * proyecto
 */
function add_proyect($name){
    $result = mysqli_query($GLOBALS["con"], 
        "INSERT INTO proyecto(nombre_proyect) values
            ('$name')");
	return $result;
}

function get_proyects(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * from proyecto");
	return $result;

}

function modify_proyect($proyect, $nombre_proyect){
    $result = mysqli_query($GLOBALS["con"], 
        "UPDATE proyecto set  
		nombre_proyect = '$nombre_proyect'
        where id_proyect = '$proyect';");
	return $result;
}

function delete_proyect($proyect){
    $result = mysqli_query($GLOBALS["con"], 
        "DELETE from proyecto where id_proyect = '$proyect';");
	return $result;
}

/**
 * Gestión de la tabla 
 * tarea
 */
function add_task($name, $user, $proyect, $status){
    $result = mysqli_query($GLOBALS["con"], 
        "INSERT INTO tarea(nombre, usuario, proyecto, estado) values
            ('$name', $user, $proyect, $status)");
	return $result;
}

function get_tasks(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT p.nombre_proyect, t.nombre, t.estado, t.usuario, u.nombre_user
            FROM proyecto p
            INNER JOIN tarea t on p.id_proyect = t.proyecto
            LEFT JOIN  usuario u on u.id_user = t.usuario;");
    return $result;
}

function get_all_tasks(){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT * FROM tarea ;");
    return $result;
}

function get_tasks_by_user($id_user){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT u.id_user, p.nombre_proyect, t.nombre, t.estado 
            FROM usuario u 
            INNER JOIN tarea t on u.id_user = t.usuario 
            LEFT JOIN proyecto p on t.proyecto = p.id_proyect 
            WHERE u.id_user = '$id_user';");
    return $result;
}

function get_tasks_by_proyect($id_proyect){
    $result = mysqli_query($GLOBALS["con"], 
        "SELECT p.nombre_proyect, t.nombre, t.estado, u.id_user, u.nombre_user
            FROM proyecto p
            INNER JOIN tarea t on p.id_proyect = t.proyecto
            LEFT JOIN  usuario u on u.id_user = t.usuario
            WHERE p.id_proyect = '$id_proyect';");
    return $result;
}

function modify_task($id_user, $new_name, $new_id_user, $id_proyect, $new_status) {
    $result = mysqli_query($GLOBALS["con"], 
        "UPDATE tarea set  
		usuario = $new_id_user,
        proyecto = $id_proyect,
        nombre = '$new_name',
        estado = $new_status
        where usuario = $id_user;");
	return $result;
    
}

function delete_task($task_user){
    $result = mysqli_query($GLOBALS["con"], 
        "DELETE from tarea where usuario = '$task_user';");
	return $result;
}

?>