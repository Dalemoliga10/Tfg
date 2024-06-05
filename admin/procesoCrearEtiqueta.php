<?php include "../conexion.php" ?>

<?php
//var_dump($_POST);

//almacena lo que hay en el array asociativo
$nombreEtiqueta = $_POST["etiqueta"];



$seleccionar = "SELECT * from etiquetas";
$registros = mysqli_query($conexion, $seleccionar);
$etiquetaExistente = False;
while ($registro = mysqli_fetch_row($registros)){
    if (strtolower($nombreEtiqueta) == strtolower($registro[1])){
        $etiquetaExistente = True;
        break;
    }
}

if ($etiquetaExistente == False){
    $insertar = "INSERT etiquetas (nombre) VALUES ('$nombreEtiqueta')";
    mysqli_query($conexion, $insertar);
    header("Location:listadoJuegos.php");
}else{
    header("Location:listadoJuegos.php");
}


?>