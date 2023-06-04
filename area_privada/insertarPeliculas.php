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
if (isset($_GET['titulo'])) {
    $imagen     = $_GET['url_imagen'];
    $titulo  = $_GET['titulo'];
    $year     = $_GET['año'];
    $director     = $_GET['directores'] ?? null;
    $trailer       = $_GET['url_ver_trailer'];
    $genero       = $_GET['genero'];
    $actores       = $_GET['actores'] ?? null;
    $actrices       = $_GET['actrices'] ?? null;
    $guionistas       = $_GET['guionistas'] ?? null;
    $productores       = $_GET['productores'] ?? null;
    $bsonora       = $_GET['banda_sonora'];
    $saga       = $_GET['saga'] ?? null;
    $slug =   createSlug($titulo);


// Consulta SQL para obtener los datos de la tabla "personajes"
$sql = "INSERT INTO peliculas (url_imagen, titulo, año, directores, url_ver_trailer, actores, actrices, guionistas, productores, banda_sonora, saga, slug)
VALUES ('$imagen','$titulo', '$year', '$director', '$trailer', '$actores', '$actrices', '$guionistas', '$productores', '$bsonora', '$saga', '$slug');";

// Ejecutar la consulta SQL
$resultado = $conn->query($sql);

echo "<script>alert('$titulo se ha insertado correctamente en la base de datos')</script>";





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
  <label for="pelicula">Título de la película: </label>
  <input type="text" id="pelicula"  name="titulo">
  <br>
  <label for="year">Año: </label>
  <input type="number" id="year" name="año">
  <br>
  <label>Director:</label><br>
  <?php
  $sql = "SELECT personaje FROM personajes";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
  echo '<input type="checkbox" id="directores" name="directores" value="'.$fila["personaje"].'"><label for="directores">'.$fila["personaje"].'</label>';
  echo '<br>';
    }
  }
  ?>
  <br>
  <label for="trailer">Url del trailer: </label>
  <input type="text" id="trailer"  name="url_ver_trailer">
  <br>
  <label>Actores:</label><br>
  <?php
  $sql = "SELECT personaje FROM personajes WHERE sexo ='Varón'";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
  echo '<input type="checkbox" id="actores" name="actores" value="'.$fila["personaje"].'"><label for="actores">'.$fila["personaje"].'</label>';
  echo '<br>';
    }
  }
  ?>
  <br>
  <label>Actrices:</label><br>
  <?php
  $sql = "SELECT personaje FROM personajes WHERE sexo ='Mujer'";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
  echo '<input type="checkbox" id="actrices" name="actrices" value="'.$fila["personaje"].'"><label for="actrices">'.$fila["personaje"].'</label>';
  echo '<br>';
    }
  }
  ?>
  <br>
  <label for="genero">Genero: </label>
  <input type="text" id="genero"  name="genero">
  <br>
  <label>Guionistas:</label><br>
  <?php
  $sql = "SELECT personaje FROM personajes";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
  echo '<input type="checkbox" id="guionistas" name="guionistas" value="'.$fila["personaje"].'"><label for="guionistas">'.$fila["personaje"].'</label>';
  echo '<br>';
    }
  }
  ?>
  <br>
  <label>Productores:</label><br>
  <?php
  $sql = "SELECT personaje FROM personajes";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
  echo '<input type="checkbox" id="productores" name="productores" value="'.$fila["personaje"].'"><label for="productores">'.$fila["personaje"].'</label>';
  echo '<br>';
    }
  }
  ?>
  <br>
  <label for="bsonora">Url de la banda sonora: </label>
  <input type="text" id="bsonora"  name="banda_sonora">
  <br>
  
  <br>
  <label>Saga:</label><br>
  <?php
  $sql = "SELECT saga FROM sagas";
  $resultado = $conn->query($sql);
  if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
  echo '<input type="radio" id="saga" name="saga" value="'.$fila["saga"].'"><label for="saga">'.$fila["saga"].'</label>';
  echo '<br>';
    }
  }
  ?>
  <br>
  <input type="submit">
</form>



<?php } ?>

<form action="CRUDpeliculas.php">
  <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
  <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
  <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
  <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
  <input type="submit" Value="volver a la lista">
</form>

<?php include 'includes/footer.php' ?>
