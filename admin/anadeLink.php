<?php include "../conexion.php" ?>

<?php
//RECORDAR QUE LA IMAGEN SI ES MAS PEQUEÑA QUE LO INDICADO SALE MAL EN EL DETALLE

//var_dump($_POST);

//almacena lo que hay en el array asociativo
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