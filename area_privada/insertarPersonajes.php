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
if (isset($_GET['personaje'])) {
    $imagen = $_GET['url_imagen'];
    $personaje = $_GET['personaje'];
    $descripcion = $_GET['descripcion'];
    $sexo = $_GET['sexo'];
    $nacimiento = $_GET['fecha_nacimiento'];
    $fallecimiento = $_GET['fecha_fallecimiento'];
    $entierro = $_GET['lugar_entierro'];
    $conyuge = $_GET['conyuge'];
    $slug =   createSlug($personaje);


// Consulta SQL para obtener los datos de la tabla "personajes"
$sql = "INSERT INTO personajes (url_imagen, personaje, descripcion, sexo, fecha_nacimiento, fecha_fallecimiento, lugar_entierro, conyuge, slug)
VALUES ('$imagen','$personaje', '$descripcion ', '$sexo','$nacimiento','$fallecimiento', '$entierro', '$conyuge', '$slug');";

// Ejecutar la consulta SQL
$resultado = $conn->query($sql);

echo "<script>alert('$personaje se ha insertado correctamente en la base de datos')</script>";


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
  <label for="personaje">Personaje: </label>
  <input type="text" id="personaje"  name="personaje">
  <br>
  <label for="sexo">Sexo:</label>
    <select name="sexo" id="sexo">
      <option value="0">...</option>
      <option value="Varón">Varón</option>
      <option value="Mujer">Mujer</option>
    </select>
  </label>
  <br>
  <label for="biografia">Biografia: </label>
  <input type="text" id="biografia"  name="descripcion">
  <label for="nacimiento">Fecha de nacimiento: </label>
  <input type="date" id="nacimiento"  name="fecha_nacimiento">
  <br>
  <label for="fallecimiento">Fecha de fallecimiento: </label>
  <input type="date" id="fallecimiento"  name="fecha_fallecimiento">
  <br>
  <label for="entierro">Lugar del entierro: </label>
  <input type="text" id="entierro"  name="lugar_entierro">
  <br>
  <label for="conyuge">Conyuge: </label>
  <input type="text" id="conyuge"  name="conyuge">
  <br>
  <input type="submit" value="Insertar personaje">
</form>

<?php } ?>

<form action="CRUDpersonajes.php">
  <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
  <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
  <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
  <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
  <input type="submit" Value="volver a la lista">
</form>

<?php include 'includes/footer.php' ?>