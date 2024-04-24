<!DOCTYPE html>
<?php
$juego = $_GET["idJuego"];

include("header.php");
$busqueda = 'SELECT * FROM juegos WHERE id =' . $juego;
$registros = mysqli_query($conexion, $busqueda);

while ($registro = mysqli_fetch_row($registros)) {
?>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo "Detalle de " . $registro[1] ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 100%;
            margin: auto;
        }

        .carousel-content {
            transition: transform 0.5s ease;
            /* Animación de desplazamiento */
        }
    </style>

    <body>
        <h1 style="text-align: center;"><?php echo $registro[1] ?></h1>
        <div class="container-fluid" style="width: 85%;">

            <div class="row">
                <div class="col-lg-8">
                    <div id="theCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicadores -->
                        <ol class="carousel-indicators">
                            <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#theCarousel" data-slide-to="1"></li>
                            <li data-target="#theCarousel" data-slide-to="2"></li>
                            <!-- <li data-target="#theCarousel" data-slide-to="3"></li> -->
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <div class="item" class="carousel-content">
                                <?php echo '<img src="imagenes/' . $registro[5] . '">'; ?>
                            </div>

                            <div class="item active" class="carousel-content">
                                <?php echo '<img src="imagenes/' . $registro[6] . '">'; ?>
                            </div>

                            <div class="item" class="carousel-content">
                                <?php echo '<img src="imagenes/' . $registro[7] . '">'; ?>
                            </div>
                            <!-- <div class="item">
                                <img src="https://cdn.dribbble.com/users/324248/screenshots/3978513/planet2_800.jpg" alt="diseno" width="600" height="424">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>UX UI Diseño Gráfico</h3>
                                    <p>Curso</p>
                                </div>
                            </div> -->

                            <a class="left carousel-control" href="#theCarousel" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">anterior</span>
                            </a>
                            <a class="right carousel-control" href="#theCarousel" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="container" style="width: 100%;">
                        <!-- Evito que se salga el texto -->
                        <p style="word-wrap: break-word;"><?php echo $registro[2] ?> aaaaaaaaaaaaaaaa</p>
                    </div>
                </div>
            </div>
            <h1 style="text-align: center;">Enlaces descarga/compra</h1>
            <div class="row" style="text-align: center;">
                <div class="col-4">
                    <h2>PC</h2>
                    <?php
                    $busquedaPC = "SELECT enlace from enlaces_pc WHERE id_juego = $registro[0]";
                    $registrosPC = mysqli_query($conexion, $busquedaPC);
                    $contadorPC = 1;
                    while ($registroPC = mysqli_fetch_row($registrosPC)) {
                        echo "<a href='$registroPC[0]' target='_blank'>Enlace PC " . $contadorPC . "</a><br>";
                        $contadorPC++;
                        
                    }

                    if ($contadorPC == 1){
                        echo "Juego no disponible para esta plataforma";
                    }

                    ?>
                </div>
                <div class="col-4">
                    <h2>Consola</h2>
                    <?php
                    $busquedaCon = "SELECT enlace from enlaces_consola WHERE id_juego = $registro[0]";
                    $registrosCon = mysqli_query($conexion, $busquedaCon);
                    $contadorCon = 1;
                    while ($registroCon = mysqli_fetch_row($registrosCon)) {
                        echo "<a href='$registroCon[0]' target='_blank'>Enlace Consola " . $contadorCon . "</a><br>";
                        $contadorCon++;
                    }
                    if ($contadorCon == 1){
                        echo "Juego no disponible para esta plataforma";
                    }
                    ?>
                </div>
                <div class="col-4">
                    <h2>Movil</h2>
                    <?php
                    $busquedaMov = "SELECT enlace from enlaces_movil WHERE id_juego = $registro[0]";
                    $registrosMov = mysqli_query($conexion, $busquedaMov);
                    $contadorMov = 1;
                    while ($registroMov = mysqli_fetch_row($registrosMov)) {
                        echo "<a href='$registroMov[0]' target='_blank'>Enlace Movil " . $contadorMov . "</a><br>";
                        $contadorMov++;
                    }
                    if ($contadorMov == 1){
                        echo "Juego no disponible para esta plataforma";
                    }
                    ?>
                </div>
            </div>

            <h1 style="text-align: center;">Pagina oficial</h1>
            <div class="container" style="text-align: center;">
                <?php if(empty($registro[8])){
                    print ("Pagina oficial no existente");
                }else{  ?>
                    <a href="<?php echo $registro[8] ?>" target="_blank">Pagina oficial</a>
                <?php }?>
            </div>
        </div>


    </body>
<?php }
include("footer.php");
?>

</html>