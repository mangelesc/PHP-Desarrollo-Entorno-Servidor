<?php
require_once("lib/nusoap.php");
require_once("./database/database.php");
// Creamos la BBDD
createDB();
require_once("./database/queries.php");


//CONFIGURAMOS EL ESPACIO WEB
$namespace = "http://localhost/Actividad05/server.php";
$server = new soap_server();
$server->configureWSDL("M07 | Actividad 05 | María Ángeles Córdoba", $namespace);
$server->schemTargetNamespace = $namespace;
$server->soap_defencoding = "UTF-8";


// DEFINICIÓN DE FUNCIONES

// Funciones de añadir categorí y productos definidas en ./database/database.php

function show_all_categories(){
	$all_categories = array();
	$categories = querie_get_categories();
	while($category = mysqli_fetch_assoc($categories)){
		$all_categories[] = $category;
	}
    close_conexion();
	return $all_categories;
}

function show_products_by_category($categoria){
	$all_categories = array();
	$categories = querie_get_product_by_category($categoria);
	while($category = mysqli_fetch_assoc($categories)){
		$all_categories[] = $category;
	}
    close_conexion();
	return $all_categories;
}



// DEFINICIÓN DE TIPOS COMPLEJOS
// Definimos categoria
$server->wsdl->addComplexType(
	'Category', 	//name
	'complexType', 	//typeClass
	'struct', 		//PhpClass: struct(array asociativo)
	'sequence', 	//compositor
	'', 			//restrictionBase
	array(			//elements
		'id_categoria'=>array('name'=>'id_categoria', 'type'=>'xsd:int'),
		'nombre'=>array('name'=>'nombre', 'type'=>'xsd:string'))
);

// Definimos el array de categorias
$server->wsdl->addComplexType(
	'ArrayCategory',
	'complexType',
	'array',
	'sequence',
	'SOAP-ENC:Array',
	array(),
	array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Category[]')), // atributos
	'tns:Category' //arrayType
);

// Definimos produto
$server->wsdl->addComplexType(
	'Product', 	
	'complexType', 	
	'struct', 		
	'sequence', 	
	'', 			
	array(			
		'id_producto'=>array('name'=>'id_categoria', 'type'=>'xsd:int'),
        'nombre_p'=>array('name'=>'nombre_p', 'type'=>'xsd:string'),
        'nombre'=>array('name'=>'nombre', 'type'=>'xsd:string')
		)
);

// Definimos el array de productos
$server->wsdl->addComplexType(
	'ArrayProduct',
	'complexType',
	'array',
	'sequence',
	'SOAP-ENC:Array',
	array(),
	array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Product[]')), // atributos
	'tns:Product' //arrayType
);


// REGISTRO DE FUNCIONES
$server->register(
	'querie_add_category',              //Nombre de la función a ejecutar
	array('name'=>'xsd:string'),        //Parámetros de entrada
	array(),                            //Valores devueltos
	$namespace,
	false,                              //soapaction
	'rpc',                              //Cómo se envían los mensajes
	'encoded',                          //Serialización
	'Función añade una categoría a la BBDD'
);

$server->register(
	'querie_add_product',
	array('name'=>'xsd:string', 'category'=>'xsd:int'),
	array(),
	$namespace,
	false,
	'rpc',
	'encoded',
	'Función añade una categoría a la BBDD'
);

$server->register(
	'show_all_categories',              
	array(),                            
	array('return'=>'tns:ArrayCategory'),  //Valores devueltos: tns(targetNameSpace)
	$namespace,
	false,                              
	'rpc',                              
	'encoded',                          
	'Función que devuelve un array de las categorias dsponibles en la BBDD'
);

$server->register(
	'show_products_by_category',          
	array('category'=>'xsd:int'),         
	array('return'=>'tns:ArrayProduct'), 
	$namespace,
	false,                                
	'rpc',                                
	'encoded',                            
	'Función que devuelve un array de las los productos de una categoria dsponibles en la BBDD'
);

// El servidor se mantiene a la espera de alguna petición
$server->service(file_get_contents("php://input"));
?>