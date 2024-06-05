<?php
include "../headerDashboard.php";
//Eliminando usuario, con seguridad, haciendo que tengas que ser admin para que se ejecute esto

if (session_status()){
    session_start();
    if($_SESSION["rol"] == "admin"){
        //Codigo
        include_once("../conexion.php");
        $idElimina = $_GET["codigo"];
        $eliminar = "DELETE FROM usuarios WHERE id_usuario = $idElimina";

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