<?php
include "../headerDashboard.php";


if (session_status()){
    session_start();
    if($_SESSION["rol"] == "admin"){
        //Codigo
        

    }else{
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../dashboard.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
}else{
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}



include "../footer.php"
?>