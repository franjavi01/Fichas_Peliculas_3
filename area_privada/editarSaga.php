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
      $id=$_GET['id'];
    }
    
    
    
    $sql = "SELECT * FROM sagas WHERE id =$id";
    $result = $conn->query($sql);
    
    
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
    
<form action="actualizarSaga.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="text" name="id" value="<?php echo $row['id']?>" style="display:none">
    <label for="imagen">Url de la imagen:</label>
    <input type="text" id="imagen" name="url_imagen" value="<?php echo $row['url_imagen']?>">
    <label for="saga">Saga:</label>
    <input type="text" id="saga" name="saga" value="<?php echo $row['saga']?>">
    
    
    <input type="submit" value="Editar saga">
    
    </form>

    <hr>

    <form action="CRUDsagas.php">
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