<?php include 'includes/header.php' ?>

<?php
// aquí el usuario y la contraseña para entrar en la sesión. Los valores son por defecto y se recomienda cambiarlos por valores más complejos para dificultar a los visitantes el poder de modificar la B.D.
$usuarioValido="admin";
$passwordValido="admin";

//if(isset($_POST['usuario']) && isset($_POST['pass'])){
if(isset($_POST['username'])){
    $usuario=$_POST['username'];
    $password=$_POST['password'];

    if($usuario === $usuarioValido && $passwordValido===$password){
    
    session_start();
    // Guardar datos de sesión
    $_SESSION['username'] =$usuario;

    echo "<script>alert('";
    echo "Hola ".$_SESSION["username"]. " has iniciado la sesión correctamente";
    echo "')</script>";
    echo '<form action="crearDB.php">
    <p>Rellena los campos con los datos que te proporcione tu servidor de hosting<p>
    <label for="servername">Servidor: </label>
    <input type="text" id="servername" name="servername" required>
    <br>
    <label for="username">Usuario: </label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password: </label>
    <input type="text" id="password" name="password">
    <br>
    <label for="dbname">Nombre Base Datos: </label>
    <input type="text" id="dbname" name="dbname" value="web_peliculas" readonly style="background:grey;">
    <br>
    <input type="submit" Value="Enviar">
</form>'; 
    

    }

    else{
        echo "<script>alert('usuario y/o contraseña no coinciden')</script>";  
        echo "<a href='index.php'> << Volver atrás</a>";    
    }
}

else{
?>
    <form action="" method="post" class="sesion">
    
    <label for="usarname">Usuario:</label>
    <input type="text" name="username" id="usarname"><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" id="password"><br>

    <input type="submit">
    </form>

    <a href="recuperacion.php">He olvidado la contraseña</a>

  <?php } ?>

    
<?php include 'includes/header.php' ?>