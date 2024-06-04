<?php
include "../headerDashboard.php";


if (session_status()){
    session_start();
    if($_SESSION["rol"] == "admin"){
        //Codigo
        include_once("../conexion.php");
                $idElimina = $_GET["codigo"];

        //Elimina comentarios del juego
        $eliminar = "DELETE FROM comentarios WHERE id_juego = $idElimina";

        mysqli_query($conexion, $eliminar);

        //Elimina enlaces del juego
        $eliminar = "DELETE FROM enlaces_consola WHERE id_juego = $idElimina";

        mysqli_query($conexion, $eliminar);

        $eliminar = "DELETE FROM enlaces_pc WHERE id_juego = $idElimina";

        mysqli_query($conexion, $eliminar);

        $eliminar = "DELETE FROM enlaces_movil WHERE id_juego = $idElimina";

        mysqli_query($conexion, $eliminar);

        //Elimina el juego
        $eliminar = "DELETE FROM juegos WHERE id = $idElimina";

        $eliminado = mysqli_query($conexion, $eliminar);

        if ($eliminado){
            header("Location:../dashboard.php");
        }else{
            echo "Error";
        }
    }else{
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
}else{
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}



include "../footer.php"
?>