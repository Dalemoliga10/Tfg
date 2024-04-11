<!doctype html>
<html lang="es">
<head>
    <title>Sistema CRUD de inventario de productos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" type="image/x-icon" href="imagenes/icono_gameDex.png">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <!-- Incluimos css con iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<header>
    <div class="container-fluid d-flex align-items-center">
        <div class="container">
            <span>Bienvenido a gamedex</span>
        </div>
        <div class="container">
            <img src="imagenes/logo gameDex.png">
        </div>
        <div class="container">
            <form action="listado.php" id="miniform" name="miniform" method="get">
                <p>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Buscar">
                    <button><input type="submit" value="buscar" style="width: 100%;"></button> 
                </p>
            </form>
        </div>
    </div>
</header>
