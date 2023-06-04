<?php 

//Consulta a tu proveedor de hosting los datos de conexión a la BD y sustituye los asteriscos 
$servername = "***";
$username = "***";
$password = "***";
$dbname = "web_peliculas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

?>