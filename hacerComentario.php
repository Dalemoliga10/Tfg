<?php include "conexion.php" ?>

<?php
session_start();
mysqli_select_db($conexion, "bdfinal");

$correo = $_POST["correo"];
$comentario = $_POST["comentario"];
$idJuego = $_SESSION["juego"];
$_SESSION["juego"] = '';

//Controla que el usuario no le de por cambiar el correo
if ($correo == $_SESSION["correo"]) {
    $verUser = "SELECT id_usuario FROM usuarios WHERE correo = '$correo'";
    $registros = mysqli_query($conexion, $verUser);

    while ($registro = mysqli_fetch_row($registros)) {
        $idUser = $registro[0];
    }
    $valoracion = $_POST["valoracion"];
    $insertar = "INSERT INTO comentarios (id_usuario, id_juego, Comentario, valoracion) VALUES ('$idUser', '$idJuego', '$comentario', '$valoracion')";
    $resultado = mysqli_query($conexion, $insertar);

    //Parte valoracion
    $total = 0.0;
    $contador = 0;
    $verValoraciones = "SELECT valoracion FROM comentarios WHERE id_juego ='$idJuego'";

    $registros = mysqli_query($conexion, $verValoraciones);

    while ($registro = mysqli_fetch_row($registros)) {
        $total = $total + $registro[0];
        $contador++;
    }

    if ($contador == 0) {
        $contador = 1;
    }

    $resultado = round($total / $contador,1);

    $insertar = "UPDATE juegos SET valoracion = $resultado WHERE id = '$idJuego'";

    mysqli_query($conexion, $insertar);
    header("Location:detalle.php?id_juego=" . $idJuego);
} else {
    header("Location:detalle.php?id_juego=" . $idJuego);
}


?>