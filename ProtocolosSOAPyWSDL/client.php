<?php
// Cargamos la librería nusoap
require_once("lib/nusoap.php");
require_once("./page-section/header.html");

// Conectamos con el servidos
$client = new soapclient('http://localhost/Actividad05/server.php?wsdl');

echo "<main>";
echo "<div class='containerh2'>";
echo "<h2> Programación de servicios web </h2>";
echo "</div>";

// Cargamos las diferentes secciones
echo "<div class='container'>";
require_once("./page-section/add-category.php");
require_once("./page-section/add-product.php");
echo "</div>";

echo "<div class='container'>";
require_once("./page-section/show-products-by-category.php");
echo "</div>";
echo "</main>";

?>