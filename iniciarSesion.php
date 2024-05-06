<?php include "conexion.php" ?>

<?php
//RECORDAR QUE LA IMAGEN SI ES MAS PEQUEÑA QUE LO INDICADO SALE MAL EN EL DETALLE
mysqli_select_db($conexion, "bdfinal");

//var_dump($_POST);

//almacena lo que hay en el array asociativo
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$rol = "admin";
$contra = $_POST["contrasena"];

$hash = password_hash($contra, PASSWORD_DEFAULT);

$seleccionar = "SELECT * from usuarios where nombre=$nombre";
$registros = mysqli_query($conexion, $seleccionar);
while ($registro = mysqli_fetch_row($registros)){
    //COn esto reviso que la contraseña aportada sea la misma que la hasheada, MODIFICAR
    if (password_verify($contrasena_usuario, $hash_contrasena)) {
        echo "¡La contraseña es válida!";
    } else {
        echo "La contraseña no coincide.";
    }    
}

//header("Location:index.php");
?>