<?php
include "../headerDashboard.php";


if (session_status()){
    session_start();
    if($_SESSION["rol"] == "admin"){
        //Codigo
        include_once("../conexion.php");
        mysqli_select_db($conexion, "bdfinal");
        $idElimina = $_GET["codigo"];

        //Elimina comentarios del juego
        $eliminar = "DELETE FROM sugerencias_juegos WHERE id_sugerencia = $idElimina";

        $eliminado = mysqli_query($conexion, $eliminar);

        if ($eliminado){
            header("Location:listaSugerencias.php");
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