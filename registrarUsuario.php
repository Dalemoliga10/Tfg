<?php include "conexion.php" ?>

<?php
include ("header.php");

//Recoge datos el formulario
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$rol = "user";
$contra = $_POST["contrasena"];
$correo = $_POST["correo"];

//Busca que el correo no este ya en la base de datos
$seleccionar = "SELECT * from usuarios";
$registros = mysqli_query($conexion, $seleccionar);
$correoUsado = False;
while ($registro = mysqli_fetch_row($registros)){
    if ($correo == $registro[4]){
        $correoUsado = True;
        break;
    }
}

//Si no lo esta, hace hash a la contarseña y la sube
if ($correoUsado == False){
    $hash = password_hash($contra, PASSWORD_DEFAULT);
    $insertar = "INSERT usuarios (nombre, apellidos, rol,correo, contrasena) VALUES ('$nombre', '$apellidos', '$rol', '$correo', '$hash')";
    mysqli_query($conexion, $insertar);
    header("Location:index.php");
}else{
    //Si ya hay un correo asi, avisa de que esta
    echo "<div style=text-align:center;>";
    echo "Correo ya usado<br>";?>
    <a href='altaUsuario.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a></div>
    <?php
}


?>