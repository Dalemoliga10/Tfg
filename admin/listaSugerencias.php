<?php
include "../headerDashboard.php";
//Listado de las sugerencias
if (session_status()) {
    session_start();
    if ($_SESSION["rol"] == "admin") {
        //Codigo
        print "<style>
        table,tr,td,th{
            border:1px solid black;
            border-collapse:collapse;
            margin-top:20px;
        </style>";

        // Incluir el archivo de conexión
        require_once('../conexion.php');
        
        
        print "<h1 style=text-align:center;>Informacion de Sugerencias</h1>";

        $consultar = "SELECT * FROM sugerencias_juegos";

        $registros = mysqli_query($conexion, $consultar);
        $cambiado = "";

        print "<table style=text-align:center;>";
        print "<tr><th style='width: 10%;'>nombre</th>";
        print "<th style='width: 30%;'>descripcion</th>";
        print "<th>enlace_pc</th>";
        print "<th>enlace_movil</th>";
        print "<th>enlace_consola</th>";
        print "<th>Página oficial</th>";
        print "<th style='width:20%;'>acciones</th></tr>";
        //PAra poder mandar el id del usuario
        while ($registro = mysqli_fetch_row($registros)) {
            print "<tr><td>$registro[1]</td>";
            print "<td>$registro[2]</td>";
            if ($registro[3] != ''){
                print "<td><a href=$registro[3] target=_blank>ver pagina</td>";
            }else{
                print "<td>no enlace</td>";
            }
            if ($registro[4] != ''){
                print "<td><a href=$registro[4] target=_blank>ver pagina</td>";
            }else{
                print "<td>no enlace</td>";
            }
            if ($registro[5] != ''){
                print "<td><a href=$registro[5] target=_blank>ver pagina</td>";
            }else{
                print "<td>no enlace</td>";
            }
            if ($registro[6] != ''){
                print "<td><a href=$registro[6] target=_blank>ver pagina</td>";
            }else{
                print "<td>no enlace</td>";
            }
            print "<td><button class='btn btn-primary btn-animado' style='background-color:red;'><a style='color:black;text-decoration:none;' href='../admin/eliminarSugerencia.php?codigo=$registro[0]'>Eliminar</a></button>  ";
                print "<button class='btn btn-primary btn-animado' style='background-color:green;'><a style='color:black;text-decoration:none;' href='../CRUD/altaSugerencia.php?codigo=$registro[0]'>Añadir</a></button></td></tr>";
                //Al acceder al enlace podemos sacar el id del usuario facilmente
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
