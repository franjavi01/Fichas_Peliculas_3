<?php include 'includes/header.php' ?>
<?php include 'includes/conexion.php' ?>

<?php

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para crear la tabla "sagas" si no existe previamente
$sql = "CREATE TABLE IF NOT EXISTS sagas (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  url_imagen VARCHAR(255) NOT NULL,
  saga VARCHAR(255) NOT NULL,
  slug VARCHAR(255)
 )";

// Ejecutar la consulta SQL sagas
if ($conn->query($sql) === TRUE) {
echo "<script>alert('Tabla SAGAS se ha creado correctamente dentro de la base de datos WEB_PELICULAS, o ya existía')</script>";
} else {
echo "<script>alert('Error al crear la tabla: ' . $conn->error.' ')</script>";
}

$conn->close();

?>

<form action="CRUDpeliculas.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" Value="CRUD de peliculas">
</form>

<form action="CRUDpersonajes.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" Value="CRUD de personajes">
</form>

<form action="CRUDsagas.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" Value="CRUD de sagas">
</form>

<?php include 'includes/footer.php' ?>

