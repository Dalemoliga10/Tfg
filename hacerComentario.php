<?php include "conexion.php" ?>

<?php
session_start();
mysqli_select_db($conexion, "bdfinal");

$correo = $_POST["correo"];
$comentario = $_POST["comentario"];
$idJuego = $_SESSION["juego"];
$_SESSION["juego"] = '';

$verUser = "SELECT id_usuario FROM usuarios WHERE correo = '$correo'";
$registros = mysqli_query($conexion, $verUser);

while ($registro = mysqli_fetch_row($registros)) {
    $idUser = $registro[0];
}

$insertar = "INSERT INTO comentarios (id_usuario, id_juego, Comentario) VALUES ('$idUser', '$idJuego', '$comentario')";
$resultado = mysqli_query($conexion, $insertar);
?>