<?php include "../conexion.php" ?>

<?php
//RECORDAR QUE LA IMAGEN SI ES MAS PEQUEÑA QUE LO INDICADO SALE MAL EN EL DETALLE

//var_dump($_POST);

//almacena lo que hay en el array asociativo
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$id = $_POST["id"];

$modificar = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos' WHERE id_usuario = '$id'";
mysqli_query($conexion, $modificar);
header("Location:../admin/listadoUsuarios");
?>