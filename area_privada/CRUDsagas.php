<?php include 'includes/header.php' ?>
<?php include 'includes/conexion.php' ?>

<?php

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM sagas";
$result = $conn->query($sql);

echo "<table>";
echo "<tr><th>imagen</th><th>saga</th><th>ver ficha</th><th>editar</th><th>borrar</th>";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td><img src='". $row["url_imagen"]."' class='imagenFicha'></td>";
    echo "<td>". $row["saga"]. "</td>";
    echo '<td><form action="../sagas/ficha/'. $row["slug"] .' " target="_blank" method="POST">
    <input type="text" name="id" value ="'.$row["id"].'" readonly style="display:none">
    <input type="text" name="servername" value ="'.$servername.'" readonly style="display:none">
    <input type="text" name="username" value ="'.$username.'" readonly style="display:none">
    <input type="text" name="password" value ="'.$password.'" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" value="📁"></form></td>';
    echo '<td><form action="editarSaga.php">
    <input type="text" name="id" value ="'.$row["id"].'" readonly style="display:none">
    <input type="text" name="servername" value ="'.$servername.'" readonly style="display:none">
    <input type="text" name="username" value ="'.$username.'" readonly style="display:none">
    <input type="text" name="password" value ="'.$password.'" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" value="✎">
</form></td> ';
    echo '<td><form action="borrarSaga.php">
    <input type="text" name="id" value ="'.$row["id"].'" readonly style="display:none">
    <input type="text" name="servername" value ="'.$servername.'" readonly style="display:none">
    <input type="text" name="username" value ="'.$username.'" readonly style="display:none">
    <input type="text" name="password" value ="'.$password.'" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" value="❌">
</form></td>';
    echo "</tr>";
  }
} else {
  echo "0 sagas encontradoas";
}


echo "</table>";

?>

<form action="insertarSagas.php">
    <input type="text" name="servername" value ="<?php echo $servername ?>" readonly style="display:none">
    <input type="text" name="username" value ="<?php echo $username ?>" readonly style="display:none">
    <input type="text" name="password" value ="<?php echo $password ?>" readonly style="display:none">
    <input type="text" name="dbname" value ="web_peliculas" readonly style="display:none">
    <input type="submit" Value="Insertar sagas">
</form>

<hr>

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

<?php include 'includes/footer.php' ?>