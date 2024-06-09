<?php
include "../headerDashboard.php";
//Confimacion para eliminar usuario

if (session_status()){
    session_start();
    if($_SESSION["rol"] == "admin"){
        include_once("../conexion.php");
        $idElimina = $_GET["codigo"];
        $consultar = "SELECT * FROM usuarios WHERE id_usuario = $idElimina";

        $registros = mysqli_query($conexion, $consultar);

        //Codigo
        while ($registro = mysqli_fetch_row($registros)) {?>
            <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="text-center">
                <h1>¿Seguro que quieres eliminar el usuario <?php echo $registro[1] ?>?</h1>
                <button class='btn btn-primary btn-animado' style='background-color:red;'>
                    <a style='color:black;text-decoration:none;' href='procesoEliminacion.php?codigo=<?php echo $idElimina ?>'>Eliminar</a>
                </button>            
                <button class='btn btn-primary btn-animado' style='background-color:yellow;margin-left:5px;'>
                    <a style='color:black;text-decoration:none;' href='../admin/listadoUsuarios.php'>Volver</a>
                </button>
            </div>
        </div>
        <?php
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