<?php include 'includes/header.php'; ?>
<?php include 'includes/conexion.php'; ?>

<?php

// Consulta SQL para obtener los datos de la tabla "peliculas"
$sql = "SELECT * FROM peliculas";

// Ejecutar la consulta SQL
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
?>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar.." title="Escriba el valor a buscar">
<?php
  // Crear la tabla HTML
  echo '<table id="myTable">
  <thead>

        <tr class="header">
        
        <th>Imagen</th>
        <th onclick="sortTable(2)"><span id="arrow2"></span>Título</th>
        <th onclick="sortTable(3)"><span id="arrow3"></span>año</th>
        <th onclick="sortTable(4)"><span id="arrow4"></span>director</th>
        
        </tr>
        </thead>
        <tbody>

      ';
  
  $pelis="";
  // Recorrer los resultados y mostrarlos en la tabla HTML
  while($fila = $resultado->fetch_assoc()) {
    echo "<tr class='tablaPeliculas'>
            <td><img class='imgPeliculas' src='". $fila["url_imagen"]."'></td>
            <td><strong>" . $fila["titulo"] . "</strong></td>
            <td>" . $fila["año"] . "</td>
            <td>" . $fila["directores"] . "</td>
            <td> <a href='./peliculas/ficha/". $fila["slug"] . "'>Ver ficha</a></td>
          </tr>";
    $pelis.="agregapeli(" .chr(34).$fila["titulo"] .chr(34).",".chr(34).$fila["año"].chr(34).",".chr(34).$fila["directores"].chr(34).",".chr(34).$fila["url_imagen"].chr(34).",".chr(34).$fila["id"].chr(34).");
    ";
  }
  // Cerrar la tabla HTML
  echo "  </tbody>
  </table>";
} else {
  echo "No se encontraron resultados";
}

// Cerrar la conexión
$conn->close();
include 'includes/footer.php';
// echo "<script>".$pelis."</script>";

?>
