<?php include "../conexion.php" ?>

<?php
//Proceso añadir link, difeenciando entre pc, movil y consola

$juego = $_POST["juego"];
$plataforma = $_POST["plataforma"];
$link = $_POST["link"];

if ($plataforma == "pc"){
    $insertar = "INSERT INTO enlaces_pc (id_juego, enlace) VALUES ('$juego', '$link')";
    $registros = mysqli_query($conexion, $insertar);
    header("Location:../detalle.php?idJuego=" . $juego);
}else if ($plataforma == "movil"){
    $insertar = "INSERT INTO enlaces_movil (id_juego, enlace) VALUES ('$juego', '$link')";
    $registros = mysqli_query($conexion, $insertar);
    header("Location:../detalle.php?idJuego=" . $juego);
}else if($plataforma == "consola"){
    $insertar = "INSERT INTO enlaces_consola (id_juego, enlace) VALUES ('$juego', '$link')";
    $registros = mysqli_query($conexion, $insertar);
    header("Location:../detalle.php?idJuego=" . $juego);
}



?>