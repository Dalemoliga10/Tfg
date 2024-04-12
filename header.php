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
    
    <div class="container-fluid d-flex align-items-center" style="height: 100px;">
        <!-- Hay que poner la imagen para que no moleste al form -->
        <img src="imagenes/logo gameDex.png" style="width:10%;">
        <div class="container" style="width: 100%;">
            <form action="listado.php" id="miniform" name="miniform" method="get">
                <div class="d-flex align-items-center justify-content-center">
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Buscar" style="width: 60%;">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button> 
                </div>
            </form>
        </div>
    </div>
</header>
