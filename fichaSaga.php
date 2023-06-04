<?php include 'includes/conexion.php'; ?>

<?php

// Obtener el id actual de la fila
if (isset($_GET['s'])) {
  $slug = $_GET['s'];
  
}
else {
  $slug = "la-saga-desconocida";
}


// Obtener el número total de filas
$sql_count = "SELECT COUNT(*) as count FROM sagas";
$result_count = $conn->query($sql_count);
$count = $result_count->fetch_assoc()['count'];

// Consulta SQL para obtener los datos de la tabla "alumnos"
$sql = "SELECT * FROM sagas WHERE slug='$slug'";
// Ejecutar la consulta SQL
$resultado = $conn->query($sql);

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
 
  // Recorrer los resultados y mostrarlos
  while($fila = $resultado->fetch_assoc()) {

?>
<?php $saga = $fila["saga"]." ficha."; ?>
<?php include 'includes/header.php';?>


<div class="ficha">
<div class="foto">
 <img src='<?php echo $fila["url_imagen"];?>'>
</div>

<div class="datos">
  <h1><?php echo $fila["saga"] ?></h1>
    <p><span>Saga:</span> <?php echo $fila["saga"];?> <td> <a href='Sagas.php?id=" . $fila["id"] . "'>Peliculas</a></td>
</p>
  

    

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
$sql_prev = "SELECT id FROM sagas WHERE id=$prev_id";
$result_prev = $conn->query($sql_prev);
if ($result_prev->num_rows > 0) {
  echo "<a href='?id=$prev_id'><button>Anterior</button></a>";
}

// Cargar la siguiente fila disponible
$next_id = $id + 1;
$sql_next = "SELECT id FROM sagas WHERE id=$next_id";
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

<?php include 'includes/footer.php'; ?>