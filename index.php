<?php
include 'header.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <form action="listado.php" id="miniform" name="miniform" method="get">
            <p>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
                <input type="submit" value="buscar">
            </p>

        </form>
<?php

// Incluir el archivo de conexión
require_once('conexion.php');

include 'footer.php';
?>

</body>
</html>
