<?php include "../conexion.php" ?>

<?php

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$id = $_POST["id"];

$modificar = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos' WHERE id_usuario = '$id'";
mysqli_query($conexion, $modificar);
header("Location:../dashboard.php");
?>