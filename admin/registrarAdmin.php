<?php include "../conexion.php" ?>

<?php
//Proceso registrar admin
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$rol = "admin";
$contra = $_POST["contrasena"];
$correo = $_POST["correo"];


$seleccionar = "SELECT * from usuarios";
$registros = mysqli_query($conexion, $seleccionar);
$correoUsado = False;
while ($registro = mysqli_fetch_row($registros)){
    if ($correo == $registro[4]){
        $correoUsado = True;
        break;
    }
}

if ($correoUsado == False){
    $hash = password_hash($contra, PASSWORD_DEFAULT);
    $insertar = "INSERT usuarios (nombre, apellidos, rol,correo, contrasena) VALUES ('$nombre', '$apellidos', '$rol', '$correo', '$hash')";
    mysqli_query($conexion, $insertar);
    header("Location:../dashboard.php");
}else{
    echo "Correo ya usado<br>";
    echo "<a href='../dashboard.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}

?>