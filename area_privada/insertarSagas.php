<?php include 'includes/header.php' ?>
<?php include 'includes/conexion.php' ?>

<?php

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si hay errores de conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
    }

//Creación automática del slug
function createSlug($str, $delimiter = '-'){

  $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
  return $slug;

}



// Obtener datos POST en caso de que existan
if (isset($_GET['saga'])) {
    $imagen = $_GET['url_imagen'];
    $saga = $_GET['saga'];
    $slug =   createSlug($saga);
    
// Consulta SQL para obtener los datos de la tabla "personajes"
$sql = "INSERT INTO sagas (url_imagen, saga, slug)
VALUES ('$imagen','$saga', '$slug');";

// Ejecutar la consulta SQL
$resultado = $conn->query($sql);

echo "<script>alert('$saga se ha insertado correctamente en la base de datos')</script>";



echo '<a href="insertarSagas.php">Añadir otra saga</a><br>';
echo '<a href="CRUDsagas.php">Volver a Lista</a>';

}

else{

?>

<form action="">
  <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
  <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
  <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
  <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
  <label for="imagen">Imagen: </label>
  <input type="text" id="imagen"  name="url_imagen">
  <br>
  <label for="saga">Saga: </label>
  <input type="text" id="saga"  name="saga">
  <br>
  <input type="submit" value="Insertar saga">
</form>

<?php } ?>

<?php include 'includes/footer.php' ?>