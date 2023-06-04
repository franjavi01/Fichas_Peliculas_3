<?php include 'includes/conexion.php'; ?>

<?php

// Obtener el id actual de la fila
if (isset($_GET['s'])) {
  $slug = $_GET['s'];
}
else {
  $slug = 'ciudadano-kane';
}


// Obtener el número total de filas
$sql_count = "SELECT COUNT(*) as count FROM peliculas";
$result_count = $conn->query($sql_count);
$count = $result_count->fetch_assoc()['count'];

// Consulta SQL para obtener los datos de la tabla "alumnos"
$sql = "SELECT * FROM peliculas WHERE slug='$slug'";
// Ejecutar la consulta SQL
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
 
  // Recorrer los resultados y mostrarlos
  while($fila = $resultado->fetch_assoc()) {

?>
<?php $titulo=$fila["titulo"]." ficha."; ?>
<?php include 'includes/header.php';?>


<div class="ficha">
<div class="foto">
 <img src='<?php echo $fila["url_imagen"];?>'>
</div>

<div class="datos">
  <h1><?php echo $fila["titulo"] ?></h1>
  
  <p><span>Año:</span> <?php echo $fila["año"];?></p>
  <p><span>Director:</span> <?php echo $fila["directores"];?></p>
  <p><span>Actores:</span> <?php echo $fila["actores"];?></p>
  <p><span>Actrices:</span> <? echo $fila["actrices"];?></p>
  <p><span>Genero:</span> <?php echo $fila["genero"];?></p>
  <p><span>Guionistas:</span> <?php echo $fila["guionistas"];?></p>
  <p><span>Productores:</span> <?php echo $fila["productores"];?></p>
  <p><span>Saga:</span> <?php echo $fila["saga"];?> <td> <a href='Sagas.php?id=" . $fila["id"] . "'>Peliculas</a></td>
</p>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $fila["url_ver_trailer"];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
   
  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $fila["banda_sonora"];?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

    

</div>

<?php
  }
  
} else {
  echo "No se encontraron resultados";
}
?>

</div>
<div class="botonera">

<?php
// Comprobar si hay una fila anterior
$prev_id = $id - 1;
$sql_prev = "SELECT id FROM peliculas WHERE id=$prev_id";
$result_prev = $conn->query($sql_prev);
if ($result_prev->num_rows > 0) {
  echo "<a href='?id=$prev_id'><button>Anterior</button></a>";
}

// Cargar la siguiente fila disponible
$next_id = $id + 1;
$sql_next = "SELECT id FROM peliculas WHERE id=$next_id";
$result_next = $conn->query($sql_next);
while ($result_next->num_rows == 0 && $next_id <= $count) {
  $next_id++;
  $sql_next = "SELECT id FROM peliculas WHERE id=$next_id";
  $result_next = $conn->query($sql_next);
}
if ($next_id <= $count) {
  echo "<a href='?id=$next_id'><button>Siguiente</button></a>";
}

// Cerrar la conexión
$conn->close();
?>
</div>


<?php include 'includes/footer.php';?>