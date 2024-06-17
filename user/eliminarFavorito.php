<?php 
//Proceso de eliminacion de favoritos
session_start();
include_once("../conexion.php");
$juego = $_GET["juego"];

$eliminar = "DELETE FROM favoritos WHERE id_juego= $juego AND id_usuario = $_SESSION[id]";

echo $eliminar;
mysqli_query($conexion, $eliminar);
header("Location:listadoFavoritos.php");
?>