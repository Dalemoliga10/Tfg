<?php include "../conexion.php" ?>

<?php
//RECORDAR QUE LA IMAGEN SI ES MAS PEQUEÑA QUE LO INDICADO SALE MAL EN EL DETALLE

//var_dump($_POST);

//almacena lo que hay en el array asociativo
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$descripcionCorta = $_POST["descripcionCorta"];
$etiqueta1 = $_POST["etiqueta1"];
$etiqueta2 = $_POST["etiqueta2"];
$etiqueta3 = $_POST["etiqueta3"];
$pagOficial = $_POST["pagOficial"];
//Mostrará nombre,tipo,ubicación, errores, tamaño; ddel archivo
//var_dump($_FILES['imagen'])

//Habrá que crearlo anteriormente
//Si falla algo probablemente sera esto
$directorioSubida = "../imagenes/";
$max_file_size = "5120000";
$extensionesValidas = array("jpg", "jpeg", "webp");

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

    // Ruta de la imagen original
    $imagen_original = $nombreCompleto;

    // Definir el nuevo tamaño
    $nuevo_ancho = 680; // Nuevo ancho en píxeles
    $nuevo_alto = 356; // Nuevo alto en píxeles

    // Dimensiones de la imagen original
    list($ancho_orig, $alto_orig) = getimagesize($imagen_original);

    // Crear una imagen en blanco con las nuevas dimensiones
    $nueva_imagen = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

    // Cargar la imagen 
    if ($extension == "jpg"){
        $imagen_orig = imagecreatefromjpeg($imagen_original);
    }elseif ($extension == "jpeg"){
        $imagen_orig = imagecreatefromjpeg($imagen_original);
    }elseif ($extension == "webp"){
        $imagen_orig = imagecreatefromwebp($imagen_original);
    }elseif ($extension == "png"){
        $imagen_orig = imagecreatefrompng($imagen_original);
    }


    // Redimensionar la imagen original a la nueva imagen con el nuevo tamaño
    imagecopyresampled($nueva_imagen, $imagen_orig, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho_orig, $alto_orig);

    // Guardar la nueva imagen redimensionada
    // $nueva_ruta = 'imagen_redimensionada.png';
    if ($extension == "jpg" | $extension == "jpeg"){
        imagejpeg($nueva_imagen, $nombreCompleto, 100);
    }elseif ($extension == "webp"){
        imagewebp($nueva_imagen, $nombreCompleto, 100);
    }elseif ($extension == "png"){
        imagejpeg($nueva_imagen, $nombreCompleto, 9);
    }

    // Liberar memoria
    imagedestroy($nueva_imagen);
    imagedestroy($imagen_orig);
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
    // Ruta de la imagen original
    $imagen_original = $nombreCompleto2;

    // Definir el nuevo tamaño
    $nuevo_ancho = 680; // Nuevo ancho en píxeles
    $nuevo_alto = 356; // Nuevo alto en píxeles

    // Obtener las dimensiones de la imagen original
    list($ancho_orig, $alto_orig) = getimagesize($imagen_original);

    // Crear una imagen en blanco con las nuevas dimensiones
    $nueva_imagen = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

    // Cargar la imagen original
    if ($extension2 == "jpg"){
        $imagen_orig = imagecreatefromjpeg($imagen_original);
    }elseif ($extension2 == "jpeg"){
        $imagen_orig = imagecreatefromjpeg($imagen_original);
    }elseif ($extension2 == "webp"){
        $imagen_orig = imagecreatefromwebp($imagen_original);
    }elseif ($extension2 == "png"){
        $imagen_orig = imagecreatefrompng($imagen_original);
    }

    // Redimensionar la imagen original a la nueva imagen con el nuevo tamaño
    imagecopyresampled($nueva_imagen, $imagen_orig, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho_orig, $alto_orig);

    // Guardar la nueva imagen redimensionada
    // $nueva_ruta = 'imagen_redimensionada.png';
    if ($extension2 == "jpg" | $extension2 == "jpeg"){
        imagejpeg($nueva_imagen, $nombreCompleto2, 100);
    }elseif ($extension2 == "webp"){
        imagewebp($nueva_imagen, $nombreCompleto2, 100);
    }elseif ($extension2 == "png"){
        imagejpeg($nueva_imagen, $nombreCompleto2, 100);
    }

    // Liberar memoria
    imagedestroy($nueva_imagen);
    imagedestroy($imagen_orig);
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
    // Ruta de la imagen original
    $imagen_original = $nombreCompleto3;

    // Definir el nuevo tamaño
    $nuevo_ancho = 680; // Nuevo ancho en píxeles
    $nuevo_alto = 356; // Nuevo alto en píxeles

    // Obtener las dimensiones de la imagen original
    list($ancho_orig, $alto_orig) = getimagesize($imagen_original);

    // Crear una imagen en blanco con las nuevas dimensiones
    $nueva_imagen = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

    // Cargar la imagen original
    if ($extension3 == "jpg" | $extension3 == "jpeg"){
        $imagen_orig = imagecreatefromjpeg($imagen_original);
    }elseif ($extension3 == "webp"){
        $imagen_orig = imagecreatefromwebp($imagen_original);
    }elseif ($extension3 == "png"){
        $imagen_orig = imagecreatefrompng($imagen_original);
    }

    // Redimensionar la imagen original a la nueva imagen con el nuevo tamaño
    imagecopyresampled($nueva_imagen, $imagen_orig, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $ancho_orig, $alto_orig);

    // Guardar la nueva imagen redimensionada
    // $nueva_ruta = 'imagen_redimensionada.png';
    if ($extension3 == "jpg" | $extension3 == "jpeg"){
        imagejpeg($nueva_imagen, $nombreCompleto3, 100);
    }elseif ($extension3 == "webp"){
        imagewebp($nueva_imagen, $nombreCompleto3, 100);
    }elseif ($extension3 == "png"){
        imagejpeg($nueva_imagen, $nombreCompleto3, 100);
    }
    
    // Liberar memoria
    imagedestroy($nueva_imagen);
    imagedestroy($imagen_orig);
}

$insertar = "INSERT juegos (nombre,descripcion,descripcion_corta, foto1, foto2, foto3,paginaOficial, etiqueta1,etiqueta2,etiqueta3) VALUES ('$nombre','$descripcion', '$descripcionCorta', '$nombreArchivo', '$nombreArchivo2', '$nombreArchivo3', '$pagOficial', '$etiqueta1', '$etiqueta2','$etiqueta3')";
mysqli_query($conexion, $insertar);

//Despues de insertar el juego, inserto los enlaces que tenga
$selectJuegoCreado = "SELECT * FROM juegos WHERE nombre = '$nombre'";
$registros = mysqli_query($conexion, $selectJuegoCreado);    
while($registro = mysqli_fetch_row($registros)){
    $idJuegoCreado = $registro[0];
}

if($_POST["enlacePC"] != ''){
    $insertarEnlace = "INSERT INTO enlaces_pc (enlace, id_juego) VALUES ('$_POST[enlacePC]', '$idJuegoCreado')";
    mysqli_query($conexion, $insertarEnlace);
}

if($_POST["enlaceConsola"] != ''){

    $insertarEnlace = "INSERT INTO enlaces_consola (enlace, id_juego) VALUES ('$_POST[enlaceConsola]', '$idJuegoCreado')";
    mysqli_query($conexion, $insertarEnlace);
}

if($_POST["enlaceMovil"] != ''){
    $insertarEnlace = "INSERT INTO enlaces_movil (enlace, id_juego) VALUES ('$_POST[enlaceMovil]', '$idJuegoCreado')";
    mysqli_query($conexion, $insertarEnlace);
}

header("Location:../dashboard.php");
?>