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
    
    
    
    $sql = "SELECT * FROM personajes WHERE id =$id";
    $result = $conn->query($sql);
    
    
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
    
<form action="actualizarPersonaje.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="text" name="id" value="<?php echo $row['id']?>" style="display:none">
    <label for="imagen">Url de la imagen:</label>
    <input type="text" id="imagen" name="url_imagen" value="<?php echo $row['url_imagen']?>">
    <label for="personaje">Personaje:</label>
    <input type="text" id="personaje" name="personaje" value="<?php echo $row['personaje']?>">
    <label for="descripcion">Descripción:</label>
    <input type="text" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']?>">
    <label for="sexo">Sexo:</label>
      <select name="sexo" id="sexo">
        <option value="0">...</option>
        <option value="Varon">Varón</option>
        <option value="Mujer">Mujer</option>
      </select>
    </label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']?>">
    <label for="fecha_fallecimiento">Fecha de fallecimiento:</label>
    <input type="date" id="fecha_fallecimiento" name="fecha_fallecimiento" value="<?php echo $row['fecha_fallecimiento']?>">
    <label for="lugar_entierro">Lugar del entierro:</label>
    <input type="text" id="lugar_entierro" name="lugar_entierro" value="<?php echo $row['lugar_entierro']?>">
    <label for="conyuge">Conyuge:</label>
    <input type="text" id="conyuge" name="conyuge" value="<?php echo $row['conyuge']?>">
    
    
    <input type="submit" value="Editar personaje">
    
    </form>

    <hr>

    <form action="CRUDpersonajes.php">
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
      echo "0 personajes encontrados";
    }

    ?>

<?php include 'includes/footer.php' ?>