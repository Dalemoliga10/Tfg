<?php include "conexion.php" ?>

<?php
mysqli_select_db($conexion, "bdfinal");

//var_dump($_POST);

//almacena lo que hay en el array asociativo
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];

//Mostrará nombre,tipo,ubicación, errores, tamaño; ddel archivo
//var_dump($_FILES['imagen'])

//Habrá que crearlo anteriormente
$directorioSubida = "imagenes/";
$max_file_size = "5120000";
$extensionesValidas = array("jpg", "png", "gif", "jpeg", "webp");

if (isset($_FILES['imagen'])) {
    $errores = 0;
    $nombreArchivo = $_FILES['imagen']['name'];
    $filesize = $_FILES['imagen']['size'];
    $directorioTemp = $_FILES['imagen']['tmp_name'];
    $arrayArchivo = pathinfo($nombreArchivo);
    //var_dump($arrayArchivo);
    $extension = $arrayArchivo['extension'];

    if (!in_array($extension, $extensionesValidas)) {
        echo "La extensión no es válida";
        $errores = 1;
    }

    if ($filesize > $max_file_size) {
        echo "La imagen debe tener un tamaño inferior.";
        $errores = 1;
    }

    if ($errores == 0) {
        $nombreCompleto = $directorioSubida . $nombreArchivo;
        move_uploaded_file($directorioTemp, $nombreCompleto);
    }
}

if (isset($_FILES['imagen2'])) {
    $errores = 0;
    $nombreArchivo2 = $_FILES['imagen2']['name'];
    $filesize2 = $_FILES['imagen2']['size'];
    $directorioTemp2 = $_FILES['imagen2']['tmp_name'];
    $arrayArchivo2 = pathinfo($nombreArchivo2);
    //var_dump($arrayArchivo);
    $extension2 = $arrayArchivo2['extension'];

    if (!in_array($extension2, $extensionesValidas)) {
        echo "La extensión no es válida";
        $errores = 1;
    }

    if ($filesize2 > $max_file_size) {
        echo "La imagen debe tener un tamaño inferior.";
        $errores = 1;
    }

    if ($errores == 0) {
        $nombreCompleto2 = $directorioSubida . $nombreArchivo2;
        move_uploaded_file($directorioTemp2, $nombreCompleto2);
    }
}

if (isset($_FILES['imagen3'])) {
    $errores = 0;
    $nombreArchivo3 = $_FILES['imagen3']['name'];
    $filesize3 = $_FILES['imagen3']['size'];
    $directorioTemp3 = $_FILES['imagen3']['tmp_name'];
    $arrayArchivo3 = pathinfo($nombreArchivo3);
    //var_dump($arrayArchivo);
    $extension3 = $arrayArchivo3['extension'];

    if (!in_array($extension3, $extensionesValidas)) {
        echo "La extensión no es válida";
        $errores = 1;
    }

    if ($filesize3 > $max_file_size) {
        echo "La imagen debe tener un tamaño inferior.";
        $errores = 1;
    }

    if ($errores == 0) {
        $nombreCompleto3 = $directorioSubida . $nombreArchivo3;
        move_uploaded_file($directorioTemp3, $nombreCompleto3);
    }
}

$insertar = "INSERT juegos (nombre,descripcion,foto1, foto2, foto3) VALUES ('$nombre','$descripcion', '$nombreArchivo', '$nombreArchivo2', '$nombreArchivo3')";
mysqli_query($conexion, $insertar);

header("Location:index.php");
?>