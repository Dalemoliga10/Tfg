<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Listado de Favoritos</title>
</head>
<style>
.card {
    transition: background-color 0.5s ease;
    /* transición */
}
.card:hover {
    color: #3E5F8A;
    transition: border 0.5s ;
    transition: color 0.5s ;
    background-color: #CFB53B;
}
</style>

<body>
    <h1 class="d-flex justify-content-center">Tus juegos favoritos</h1>
    <?php
    //Igual que el listado,solo que coge los favoritos del usuario
    session_start();
    include "../headerDashboard.php";
    require_once("../conexion.php");
        $id = $_SESSION["id"];

    $selectedOptions = array();

    $consultarFavoritos = "SELECT id_juego FROM favoritos where id_usuario = '$id'";
    $registrosFavoritos = mysqli_query($conexion, $consultarFavoritos);

    while ($registro = mysqli_fetch_row($registrosFavoritos)) {
        $idJuego = $registro[0];
        $consultar = "SELECT * FROM juegos WHERE id = '$idJuego'";

        $registros = mysqli_query($conexion, $consultar);


    ?>

        <?php while ($registro = mysqli_fetch_row($registros)) {
            echo "<a href='../detalle.php?idJuego=$registro[0]' style='text-decoration:none;'>";
            echo "<div class='container-fluid d-flex flex-column mb-4' style='width: 75%;'>";
        ?>
            
                <!-- Ya he sacado los datos basados en el nombre, ahora filtro por etiqueta -->
                <div class="card mb-1">
                    <div class="card-body d-flex flex-column flex-md-row">

                        <div class="col-md-3 order-md-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <?php echo '<img width="80%" height="80%" src="../imagenes/' . $registro[5] . '">'; ?>
                            </div>
                        </div>

                        <div class="col-md-9 order-md-2">
                            <div class="d-flex justify-content-center">
                                <div style="font-weight: bold;">
                                    <?php echo $registro[1]; ?>
                                </div>
                            </div>
                            <div>
                                <?php echo $registro[3]; ?>
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center mb-2">
                        <?php
                        //Dentro de este contenedor voy a llamar al nombre de las etiquetas
                        //Para que el usuario vea a que etiquetas pertenece

                        $consultarEtiqueta = "SELECT nombre FROM etiquetas WHERE id = '$registro[9]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)) {
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 20px;padding:5px;'>" . $nombre[0] . "</div>";
                        }

                        $consultarEtiqueta2 = "SELECT nombre FROM etiquetas WHERE id = '$registro[10]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta2);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)) {
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 20px;padding:5px;'>" . $nombre[0] . "</div>";
                        }

                        $consultarEtiqueta3 = "SELECT nombre FROM etiquetas WHERE id = '$registro[11]'";
                        $registroEtiqueta = mysqli_query($conexion, $consultarEtiqueta3);
                        while ($nombre = mysqli_fetch_row($registroEtiqueta)) {
                            echo "<div style='border:black 1px solid;margin-right:15px;border-radius: 15px;padding:5px;'>" . $nombre[0] . " </div>";
                        }

                        ?>
                        <!-- Eliminar el juego favorito -->
                        <a href="../user/eliminarFavorito.php?juego=<?php echo $registro[0]; ?>" style="color:red;">
                            <i class="bi bi-trash" style="font-size: 5.25rem;"></i>
                        </a>

                    </div>
                </div>
            </div>
    <?php
        echo "</a>";
        }
    } ?>
        <a href="../dashboard.php" style="text-align: center;"><i class="bi-arrow-return-left px-3" style="font-size:4rem; color:black;"></i></a>




    <?php
    include "../footer.php";
    ?>
</body>

</html>