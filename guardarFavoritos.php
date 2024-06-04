<?php include "conexion.php" ?>

<?php
session_start();

$correo = $_GET["usuario"];
$idJuego = $_GET["juego"];

if ($_SESSION["rol"] == "user"){
    $verUser = "SELECT id_usuario FROM usuarios WHERE correo = '$correo'";
    $registros = mysqli_query($conexion, $verUser);
    
    while ($registro = mysqli_fetch_row($registros)) {
        $idUser = $registro[0];
    }
    
    $seleccionFavoritosUser = "SELECT id_juego FROM favoritos WHERE id_usuario = '$idUser'";
    
    $registrosUser = mysqli_query($conexion, $seleccionFavoritosUser);
    while ($registro = mysqli_fetch_row($registrosUser)) {
        if ($idJuego == $registro[0]){
            header("Location:detalle.php?idJuego=".$idJuego);
            break;
        }
    }
    
    $insertar = "INSERT INTO favoritos (id_usuario, id_juego) VALUES ('$idUser', '$idJuego')";
    $resultado = mysqli_query($conexion, $insertar);
    
    header("Location:detalle.php?idJuego=".$idJuego);
}else{
    header("Location:detalle.php?idJuego=".$idJuego);
}

?>