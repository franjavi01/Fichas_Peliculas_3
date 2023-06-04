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
      $id=$_GET['id'];
    }
    
    
    
    $sql = "SELECT * FROM peliculas WHERE id =$id";
    $result = $conn->query($sql);
    
    
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
    
<form action="actualizarPelicula.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="text" name="id" value="<?php echo $row['id']?>" style="display:none">
    <label for="imagen">Url de la imagen:</label>
    <input type="text" id="imagen" name="url_imagen" value="<?php echo $row['url_imagen']?>">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" value="<?php echo $row['titulo']?>">
    <label for="year">Año:</label>
    <input type="number" id="year" name="año" value="<?php echo $row['año']?>">
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
    <label for="trailer">Url del trailer:</label>
    <input type="text" id="trailer" name="url_ver_trailer" value="<?php echo $row['url_ver_trailer']?>">
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
    <label for="genero">Genero:</label>
    <input type="text" id="genero" name="genero" value="<?php echo $row['genero']?>">
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
    <label for="bsonora">Banda sonora:</label>
    <input type="text" id="bsonora" name="banda_sonora" value="<?php echo $row['banda_sonora']?>">
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
    <input type="submit" value="Editar película">
      </form>

    <hr>

    <form action="CRUDpeliculas.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="text" name="id" value="<?php echo $row['id']?>" style="display:none">
    <input type="submit" value="Salir sin editar">
    
    </form>
    
    
    <?php
      }
    } else {
      echo "0 peliculas encontradas";
    }

    ?>

<?php include 'includes/footer.php' ?>