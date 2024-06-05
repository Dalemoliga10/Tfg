<?php
//Proceso eliminar comentario
if (session_status()) {
    session_start();
    if ($_SESSION["id"] == $_GET["user"] or $_SESSION["rol"] == "admin") {
        include_once("../conexion.php");
                $eliminar = "DELETE FROM comentarios WHERE id_comentario = $_GET[idComent]";
        mysqli_query($conexion, $eliminar);

        header("Location:../detalle.php?idJuego=" . $_GET["juego"]);
    } else {
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
} else {
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}
?>