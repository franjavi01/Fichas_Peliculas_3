<?php include 'includes/header.php'; ?>
<?php 
$miJSON = file_get_contents('cards.json');
$datos = json_decode($miJSON, true);

echo '<div class="container cards">';
echo '<div class="row">';
foreach($datos as $dato){
echo '<div class="card text-center" style="background: linear-gradient(rgba(200, 200,200, .3), rgba(200, 200, 200, .3)), url('.$dato['background'].') center center no-repeat;">';
echo '<div class="card-body">';
echo '<h3 class="card-title">'.$dato['titulo'].'</h3>';
echo '<p class="card-text">'.$dato['texto'].'</p>';
echo '<a href="'.$dato['enlace'].'" class="btn btn-primary">Entrar</a>';
echo '</div>';
echo '</div>';
}
echo '</div>';
echo '</div>';


?>
<?php include 'includes/footer.php'; ?>

    