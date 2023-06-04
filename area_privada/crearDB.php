<?php include 'includes/header.php' ?>
<?php include 'includes/conexion.php' ?>


<?php

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
  die("Conexión fallida: ".$conn->connect_error." <a href='index.php'> << Volver atrás</a>");
}

// Crear la base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS web_peliculas";
if ($conn->query($sql) === TRUE) {
  echo "<script>alert('Base de datos web_peliculas se ha creado correctamente, o ya existía')</script>";
} else {
  echo "<script>alert('Error creando la base de datos: '. $conn->error' ')</script>";
}
// Cerrar la conexión
$conn->close();

?>

<hr>

<p>1 - Si ya estan creadas las tablas. Puedes insertar, editar y borrar datos en cada tabla</p> 

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

<hr>

<p>2 - Si no estan creadas las tablas, crealas paulatinamente</p>

<form action="crearTablaPeliculas.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" Value="Crear Tabla PELICULAS">
</form>

<?php include 'includes/footer.php' ?>