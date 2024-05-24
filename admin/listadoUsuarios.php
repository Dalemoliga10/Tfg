
<?php
include "../headerDashboard.php";?>
<style>
    .btn-animado {
        position: relative;
        overflow: hidden;
        transition: transform 0.1s;
    }

    .btn-animado::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300%;
        height: 300%;
        background: rgba(255, 255, 255, 0.5);
        transition: all 0.4s;
        transform: translate(-50%, -50%) scale(0);
        border-radius: 50%;
    }


    .btn-animado:active {
        transform: scale(0.95);
    }
</style>
<?php


if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") {
        //Codigo
        print "<style>
        table,tr,td,th{
            border:1px solid black;
            border-collapse:collapse;
    
    
    </style>";
        // Incluir el archivo de conexión
        require_once('../conexion.php');
        mysqli_select_db($conexion, "bdfinal");
        print "<h1>Informacion de usuarios</h1>";

        $consultar = "SELECT * FROM usuarios";

        $registros = mysqli_query($conexion, $consultar);
        $cambiado = "";

        print "<table>";
        print "<tr><th>nombre</th>";
        print "<th>Apellidos</th>";
        print "<th>rol</th>";
        print "<th>correo</th>";
        print "<th>contraseña</th>";
        print "<th style='width:20%;'>acciones</th></tr>";
        //PAra poder mandar el id del usuario
        while ($registro = mysqli_fetch_row($registros)) {
            $nombre = $registro[1];
            $email = $registro[2];
            $contraseña = $registro[3]; //Probablemente sea cifrado, convertir a texto
            $rol = $registro[4];

            print "<tr><td>$registro[1]</td>";
            print "<td>$registro[2]</td>";
            print "<td>$registro[3]</td>";
            print "<td>$registro[4]</td>";
            print "<td>$registro[5]</td>";
            if ($registro[4] != $_SESSION["correo"]){
                print "<td><button class='btn btn-primary btn-animado' style='background-color:red;'><a style='color:black;text-decoration:none;' href='../CRUDUser/eliminarUsuario.php?codigo=$registro[0]'>Eliminar</a></button>  ";
                print "<button class='btn btn-primary btn-animado' style='background-color:green;'><a style='color:black;text-decoration:none;' href='/CRUDUser/añadirUsuario.php?'>Añadir</a></button>";
                //Al acceder al enlace podemos sacar el id del usuario facilmente
                print "<button class='btn btn-primary btn-animado' style='background-color:yellow;margin-left:5px;'><a style='color:black;text-decoration:none;' href='../CRUDUser/modificarUsuario.php?codigo=$registro[0]'>Modificar</a></button></td></tr>";
            }else{
                print "<td style='text-align:center;'>Eres tu</td></tr>";
            }
            
        }
        
        print "</table>";
        print "<a href='../dashboard.php' style='text-align:center;'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;''></i></a>";

    } else {
        echo "No tienes permisos para acceder aqui";
        echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
    }
} else {
    echo "No has iniciado sesion";
    echo "<a href='../index.php'><i class='bi-arrow-return-left px-3' style='font-size:4rem; color:black;'></i></a>";
}



include "../footer.php";
