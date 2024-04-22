<?php
include 'header.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a gamedex</title>
</head>

<body>
    <main>
        <div class="container d-flex flex-column align-items-center" style="width: 75%;">
            <h1>Bienvenido a gamedex</h1>
            <p>¡Bienvenidos a nuestra biblioteca de videojuegos, el paraíso de los jugadores!
                En esta pagina encontrarás una amplia selección de títulos que abarcan desde clásicos 
                hasta las últimas novedades del mundo de los videojuegos.</p>
            <p>Nuestra biblioteca es un lugar donde los amantes de los videojuegos pueden encontrar su nuevo juego 
                favorito. Desde emocionantes juegos de acción y trepidantes aventuras hasta desafiantes rompecabezas 
                y cautivadoras historias narrativas, aquí hay algo para cada tipo de jugador.</p>
        </div>

<?php

// Incluir el archivo de conexión
require_once('conexion.php');

include 'footer.php';
?>

</body>
</html>
