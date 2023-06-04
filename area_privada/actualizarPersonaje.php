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
    
if(isset($_GET['id'])){
        
    $id = $_GET['id'];
    $imagen = $_GET['url_imagen'];
    $personaje = $_GET['personaje'];
    $descripcion = $_GET['descripcion'];
    $sexo = $_GET['sexo'];
    $nacimiento = $_GET['fecha_nacimiento'];
    $fallecimiento = $_GET['fecha_fallecimiento'];
    $entierro = $_GET['lugar_entierro'];
    $conyuge = $_GET['conyuge'];
    $slug = createSlug($personaje);
    
    $sql = "UPDATE personajes SET
      url_imagen = '$imagen',
      personaje = '$personaje',
      descripcion = '$descripcion',
      sexo = '$sexo',
      fecha_nacimiento = '$nacimiento',
      fecha_fallecimiento = '$fallecimiento',
      lugar_entierro = '$entierro',
      conyuge = '$conyuge',
      slug = '$slug'
      
    WHERE id = '$id';";
      
      $result = $conn->query($sql);
      
      echo "<script>alert('$personaje se ha actualizado correctamente en la base de datos')</script>";

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