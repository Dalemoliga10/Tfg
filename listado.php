<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <?php
    include "header.php";
    require_once("conexion.php");
    $nombre = $_GET['nombre'];

    // Seleccionamos la Base de Datos
    mysqli_select_db($conexion, "bdfinal");

    $consultar = "SELECT * FROM juegos WHERE nombre LIKE '$nombre%' ORDER BY id";

    $registros = mysqli_query($conexion, $consultar);
    ?>
    <p class="d-flex justify-content-center">Juegos que comienzan por <?php echo $nombre ?></p>
    <div class="container-fluid d-flex flex-column mb-4" style="width: 75%;">
        <?php while ($registro = mysqli_fetch_row($registros)) { ?>
            <div class="card mb-1">
                <div class="card-body d-flex flex-column flex-md-row">
                    
                    <div class="col-md-3 order-md-1">
                        <div class="d-flex justify-content-center align-items-center">
                            <?php echo '<img width="80%" height="80%" src="imagenes/' . $registro[4] . '">'; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-9 order-md-2">
                        <div class="d-flex justify-content-center">
                            <div style="font-weight: bold;">
                                <?php echo $registro[1]; ?>
                            </div>
                        </div>
                        <div>
                            <?php echo $registro[2]; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php
    include "footer.php";
    ?>
</body>

</html>