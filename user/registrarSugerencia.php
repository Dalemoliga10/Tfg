<?php include "../conexion.php" ;
include ("../headerDashboard.php");
?>

<?php
mysqli_select_db($conexion, "bdfinal");
session_start();

$nombre = $_POST["nombre"];
$desc = $_POST["descripcion"];
$enlacePC = $_POST["enlacePC"];
$enlaceMovil = $_POST["enlaceMovil"];
$enlaceConsola = $_POST["enlaceConsola"];
$paginaOficial = $_POST["pagOficial"];

$insertar = "INSERT INTO sugerencias_juegos (nombre,Descripcion,enlace_pc,enlace_movil,enlace_consola, pagOficial) VALUES ('$nombre', '$desc', '$enlacePC', '$enlaceMovil', '$enlaceConsola', '$paginaOficial')";

mysqli_query($conexion, $insertar);
header('Location: ../dashboard.php');



?>