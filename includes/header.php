<?php
// sustituye los asteriscos por el dominio
$dominio="***/fichas_Peliculas_2/";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fichas de películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo $dominio?>/style.css?<?php echo date('U'); ?>">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark z-1 container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#opciones">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="opciones">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="<?php echo $dominio?>home">Home</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="<?php echo $dominio?>peliculas">Películas</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="<?php echo $dominio?>personajes">Personajes</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="<?php echo $dominio?>sagas">Sagas</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="area_privada" target="_blank" onclick="ventanaSecundaria()">Area Privada</a>
                        </div>
                    </li>
                    <li>
                        <div class="container-fluid">
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" onclick="dia()" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-outline-warning" for="btnradio1"><i class="bi bi-brightness-high-fill"></i></label>
                                <input type="radio" class="btn-check" name="btnradio" onclick="noche()" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-warning" for="btnradio2" id="botonnight"><i class="bi bi-moon-fill"></i></label>
                            </div>
                        </div>
                    </li>

                </ul>




        </nav>



    </header>
    <main>