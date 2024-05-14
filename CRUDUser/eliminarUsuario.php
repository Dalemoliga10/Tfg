<?php
include "../headerDashboard.php";


if (session_status()){
    session_start();
    if($_SESSION["rol"] == "admin"){
        include_once("../conexion.php");
        $idElimina = $_GET["codigo"];
        $consultar = "SELECT * FROM usuarios WHERE id_usuario = $idElimina";

        $registros = mysqli_query($conexion, $consultar);

        //Codigo
        while ($registro = mysqli_fetch_row($registros)) {
            print("¿Seguro que quieres eliminar el usuario . $registro[1] ?");
        
        }
        print "<a href='procesoEliminacion.php?codigo=$idElimina'>Eliminar</a>";
        print "<a href='../admin/listadoUsuarios?'>Volver</a>";



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