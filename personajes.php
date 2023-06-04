<?php include 'includes/header.php'; ?>
<?php include 'includes/conexion.php'; ?>

<?php

// Consulta SQL para obtener los datos de la tabla "alumnos"
$sql = "SELECT * FROM personajes";

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
        <th onclick="sortTable(3)"><span id="arrow3"></span>Fecha de nacimiento</th>
        <th onclick="sortTable(4)"><span id="arrow4"></span>Fecha de falleciminto</th>
        
        </tr>
        </thead>
        <tbody>

      ';
  
  // Recorrer los resultados y mostrarlos en la tabla HTML
  while($fila = $resultado->fetch_assoc()) {
    echo "<tr class='tablapersonajes'>
            <td><img class='imgpersonajes' src='". $fila["url_imagen"]."'></td>
            <td><strong>" . $fila["personaje"] . "</strong></td>
            <td>" . $fila["fecha_nacimiento"] . "</td>
            <td>" . $fila["fecha_fallecimiento"] . "</td>
            <td> <a href='./personajes/ficha/". $fila["slug"]. "'>Ver ficha</a></td>
          </tr>";
  }
  
  // Cerrar la tabla HTML
  echo "  </tbody>
  </table>";
} else {
  echo "No se encontraron resultados";
}

// Cerrar la conexión
$conn->close();
?>
<?php include 'includes/footer.php'; ?>