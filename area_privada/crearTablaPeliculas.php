<?php include 'includes/header.php' ?>
<?php include 'includes/conexion.php' ?>

<?php

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para crear la tabla "peliculas" si no existe previamente
$sql = "CREATE TABLE IF NOT EXISTS peliculas (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  url_imagen VARCHAR(255) NOT NULL,
  titulo VARCHAR(255) NOT NULL,
  año INT(4) NOT NULL,
  directores VARCHAR(255),
  url_ver_trailer VARCHAR(255),
  actores VARCHAR(255),
  actrices VARCHAR(255),
  genero VARCHAR(255),
  guionistas VARCHAR(255),
  productores VARCHAR(255),
  banda_sonora VARCHAR(255),
  saga VARCHAR(255),
  slug VARCHAR(255)
  )";


// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Tabla PELICULAS se ha creado correctamente dentro de la base de datos WEB_PELICULAS, o ya existía')</script>";
} else {
echo "<script>alert('Error al crear la tabla: ' . $conn->error.' ')</script>";
}

?>

<form action="crearTablaPersonajes.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" Value="Crear Tabla PERSONAJES">
</form>

<?php include 'includes/footer.php' ?>


