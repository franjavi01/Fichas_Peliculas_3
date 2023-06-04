<?php include 'includes/header.php' ?>
<?php include 'includes/conexion.php' ?>

<?php

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
    }

if(isset($_GET['id'])){
  $id = $_GET['id'];
   

$sql = "DELETE FROM peliculas WHERE id =$id";
$result = $conn->query($sql);

echo "<script>alert('La película se ha eliminado correctamente de la base de datos')</script>";


}

?>

<form action="CRUDpeliculas.php">
  <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
  <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
  <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
  <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
  <input type="submit" Value="volver a la lista">
</form>

<?php include 'includes/footer.php' ?>
