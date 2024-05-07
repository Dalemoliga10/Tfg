<?php include "conexion.php" ?>

<?php
mysqli_select_db($conexion, "bdfinal");

//var_dump($_POST);

//almacena lo que hay en el array asociativo
$contra = $_POST["contrasena"];
$correo = $_POST["correo"];

$hash = password_hash($contra, PASSWORD_DEFAULT);

$seleccionar = "SELECT * from usuarios where correo='$correo'";
$registros = mysqli_query($conexion, $seleccionar);

while ($registro = mysqli_fetch_row($registros)){
    //COn esto reviso que la contraseña aportada sea la misma que la hasheada,
    if (password_verify($contra, $registro[5])) {
        
        session_start();

        // Establece valores en la sesión
        $_SESSION['nombre'] = $registro[1];
        $_SESSION['apellidos'] = $registro[2];
        $_SESSION['rol'] = $registro[3];
        $_SESSION['correo'] = $registro[4];


        header('Location: dashboard.php');
    } else {
        echo "La contraseña no coincide.";
    }    
}
?>